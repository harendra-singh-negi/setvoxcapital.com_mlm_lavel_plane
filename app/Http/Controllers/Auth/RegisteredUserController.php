<?php

namespace App\Http\Controllers\Auth;

use App\Enums\TxnStatus;
use App\Enums\TxnType;
use App\Events\UserReferred;
use App\Http\Controllers\Controller;
use App\Models\LoginActivities;
use App\Models\Page;
use App\Models\Ranking;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use App\Rules\Recaptcha;
use App\Services\BonusService;
use App\Traits\NotifyTrait;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules;
use Illuminate\Validation\ValidationException;
use Illuminate\View\View;
use Txn;

class RegisteredUserController extends Controller
{
    use NotifyTrait;

    /**
     * @var BonusService
     */
    protected $bonusService;

    /**
     * Constructor
     *
     * @param BonusService $bonusService
     */
    public function __construct(BonusService $bonusService)
    {
        $this->bonusService = $bonusService;
    }

    /**
     * Handle an incoming registration request.
     *
     * @param Request $request
     * @return RedirectResponse
     * @throws ValidationException
     */
    public function store(Request $request)
    {
        $isUsername = (bool)getPageSetting('username_show');
        $isCountry = (bool)getPageSetting('country_show');
        $isPhone = (bool)getPageSetting('phone_show');

        Log::info('Registration attempt with referral:', [
            'invite_code' => $request->input('invite'),
            'request_data' => $request->all()
        ]);

        $request->validate([
            'first_name' => ['required', 'string', 'max:255'],
            'last_name' => ['required', 'string', 'max:255'],
            'username' => [Rule::requiredIf($isUsername), 'string', 'max:255', 'unique:users'],
            'country' => [Rule::requiredIf($isCountry), 'string', 'max:255'],
            'phone' => [Rule::requiredIf($isPhone), 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
            'g-recaptcha-response' => Rule::requiredIf(plugin_active('Google reCaptcha')), new Recaptcha(),
            'i_agree' => ['required'],
            'invite' => ['nullable', 'string'],
        ]);

        $input = $request->all();

        $location = getLocation();
        $phone = $isPhone ? ($isCountry ? explode(':', $input['country'])[1] : $location->dial_code) . ' ' . $input['phone'] : $location->dial_code . ' ';
        $country = $isCountry ? explode(':', $input['country'])[0] : $location->name;

        $rank = Ranking::find(1);

        $user = User::create([
            'ranking_id' => $rank->id,
            'rankings' => json_encode([$rank->id]),
            'first_name' => $input['first_name'],
            'last_name' => $input['last_name'],
            'username' => $isUsername ? $input['username'] : 'SC' . str_pad(User::max('id') + 1 . random_int(0, 999999), 6, '0', STR_PAD_LEFT),
            'country' => $country,
            'phone' => $phone,
            'email' => $input['email'],
            'password' => Hash::make($input['password']),
        ]);

        if ($rank->bonus > 0) {
            Txn::new($rank->bonus, 0, $rank->bonus, 'system', 'Ranking Bonus From ' . $rank->ranking, TxnType::Bonus, TxnStatus::Success, null, null, $user->id);
            $user->increment('profit_balance', $rank->bonus);
        }

        // Process referral
        $referralCode = $request->input('invite');
        if ($referralCode) {
            Log::info('Processing referral for new registration:', [
                'referral_code' => $referralCode,
                'new_user_id' => $user->id
            ]);

            try {
                event(new UserReferred($referralCode, $user));
            } catch (\Exception $e) {
                Log::error('Failed to process referral:', [
                    'error' => $e->getMessage(),
                    'trace' => $e->getTraceAsString(),
                    'user_id' => $user->id,
                    'referral_code' => $referralCode
                ]);
            }
        }

        // Handle signup bonus
        $this->bonusService->handleSignupBonus($user);

        $shortcodes = [
            '[[full_name]]' => $input['first_name'] . ' ' . $input['last_name'],
            '[[message]]' => '.New User added our system.',
        ];

        // Notify method call
        $this->pushNotify('new_user', $shortcodes, route('admin.user.edit', $user->id), $user->id);
        $this->smsNotify('new_user', $shortcodes, $user->phone);

        Auth::login($user);
        LoginActivities::add();

        return redirect(RouteServiceProvider::HOME);
    }

    /**
     * Display the registration view.
     *
     * @return View
     */
    public function create()
    {
        if (!setting('account_creation', 'permission')) {
            abort('403', 'User registration is closed now');
        }

        $page = Page::where('code', 'registration')
            ->where('locale', app()->getLocale())
            ->first();
            
        $data = json_decode($page->data, true);
        $googleReCaptcha = plugin_active('Google reCaptcha');
        $location = getLocation();

        return view('frontend::auth.register', compact('location', 'googleReCaptcha', 'data'));
    }
}
