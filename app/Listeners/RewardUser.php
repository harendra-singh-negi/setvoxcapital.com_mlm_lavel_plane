<?php

namespace App\Listeners;

use App\Events\UserReferred;
use App\Models\ReferralLink;
use App\Models\ReferralRelationship;
use App\Models\User;
use App\Services\BonusService;
use Illuminate\Support\Facades\Log;

class RewardUser
{
    /**
     * @var BonusService
     */
    protected $bonusService;

    /**
     * Create the event listener.
     *
     * @param BonusService $bonusService
     * @return void
     */
    public function __construct(BonusService $bonusService)
    {
        $this->bonusService = $bonusService;
    }

    /**
     * Handle the event.
     *
     * @param UserReferred $event
     * @return void
     */
    public function handle(UserReferred $event)
    {
        Log::info('RewardUser listener triggered:', [
            'referral_code' => $event->referralId,
            'new_user_id' => $event->user->id
        ]);

        try {
            if (empty($event->referralId)) {
                Log::warning('No referral code provided for user:', [
                    'user_id' => $event->user->id
                ]);
                return;
            }

            // Find referral by code
            $referral = ReferralLink::where('code', $event->referralId)->first();
            
            if (!$referral) {
                Log::warning('Invalid referral code:', [
                    'code' => $event->referralId,
                    'user_id' => $event->user->id
                ]);
                return;
            }

            // Prevent self-referral
            if ($referral->user->id === $event->user->id) {
                Log::warning('Self referral attempted:', [
                    'user_id' => $event->user->id
                ]);
                return;
            }

            // Check if relationship already exists
            $existingRelationship = ReferralRelationship::where('user_id', $event->user->id)->exists();
            if ($existingRelationship) {
                Log::warning('Referral relationship already exists:', [
                    'user_id' => $event->user->id
                ]);
                return;
            }

            Log::info('Creating referral relationship:', [
                'referral_id' => $referral->id,
                'referrer_id' => $referral->user->id,
                'new_user_id' => $event->user->id
            ]);

            // Create relationship
            ReferralRelationship::create([
                'referral_link_id' => $referral->id, 
                'user_id' => $event->user->id
            ]);

            // Update user's ref_id
            $event->user->update([
                'ref_id' => $referral->user->id,
            ]);

            // Process referral bonus
            if ($this->bonusService->isEligibleForReferralBonus($referral->user)) {
                $this->bonusService->handleReferralBonus($referral->user, $event->user);
            }

        } catch (\Exception $e) {
            Log::error('Error in RewardUser listener:', [
                'error' => $e->getMessage(),
                'trace' => $e->getTraceAsString(),
                'referral_code' => $event->referralId,
                'user_id' => $event->user->id
            ]);
        }
    }
}
