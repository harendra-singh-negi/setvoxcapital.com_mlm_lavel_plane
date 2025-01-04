<?php

namespace App\Services;

use App\Models\User;
use App\Enums\TxnStatus;
use App\Enums\TxnType;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Txn;

class BonusService
{
    /**
     * Handle the signup bonus for new users
     *
     * @param User $user
     * @return void
     */
    public function handleSignupBonus(User $user)
    {
        if (!setting('referral_signup_bonus', 'permission')) {
            Log::info('Signup bonus disabled by settings');
            return;
        }

        $signupBonus = (float)setting('signup_bonus', 'fee');
        if ($signupBonus <= 0) {
            Log::info('Signup bonus amount is zero or negative');
            return;
        }

        try {
            DB::transaction(function() use ($user, $signupBonus) {
                // Update user balance
                $user->increment('profit_balance', $signupBonus);
                
                // Create transaction record
                Txn::new(
                    $signupBonus, 
                    0, 
                    $signupBonus, 
                    'system', 
                    'Signup Bonus', 
                    TxnType::SignupBonus, 
                    TxnStatus::Success, 
                    null, 
                    null, 
                    $user->id
                );
            });

            // Store in flash session
            session()->flash('signup_bonus', $signupBonus);
            
            Log::info('Signup bonus processed successfully', [
                'user_id' => $user->id,
                'amount' => $signupBonus
            ]);

        } catch (\Exception $e) {
            Log::error('Failed to process signup bonus', [
                'user_id' => $user->id,
                'error' => $e->getMessage(),
                'trace' => $e->getTraceAsString()
            ]);
            
            throw $e; // Re-throw to handle in controller if needed
        }
    }

    /**
     * Handle the referral bonus for the referrer
     *
     * @param User $referrer
     * @param User $newUser
     * @return void
     */
    public function handleReferralBonus(User $referrer, User $newUser)
    {
        if (!setting('sign_up_referral', 'permission')) {
            Log::info('Referral bonus disabled by settings');
            return;
        }

        $referralBonus = (float)setting('referral_bonus', 'fee');
        if ($referralBonus <= 0) {
            Log::info('Referral bonus amount is zero or negative');
            return;
        }

        try {
            DB::transaction(function() use ($referrer, $newUser, $referralBonus) {
                // Update referrer's balance
                $referrer->increment('profit_balance', $referralBonus);
                
                // Create transaction record
                Txn::new(
                    $referralBonus, 
                    0, 
                    $referralBonus, 
                    'system', 
                    'Referral Bonus via ' . $newUser->full_name, 
                    TxnType::Referral, 
                    TxnStatus::Success, 
                    null, 
                    null, 
                    $referrer->id
                );
            });

            Log::info('Referral bonus processed successfully', [
                'referrer_id' => $referrer->id,
                'new_user_id' => $newUser->id,
                'amount' => $referralBonus
            ]);

        } catch (\Exception $e) {
            Log::error('Failed to process referral bonus', [
                'referrer_id' => $referrer->id,
                'new_user_id' => $newUser->id,
                'error' => $e->getMessage(),
                'trace' => $e->getTraceAsString()
            ]);
            
            throw $e; // Re-throw to handle in controller if needed
        }
    }

    /**
     * Check if a user is eligible for signup bonus
     *
     * @param User $user
     * @return bool
     */
    public function isEligibleForSignupBonus(User $user): bool
    {
        return setting('referral_signup_bonus', 'permission') 
            && (float)setting('signup_bonus', 'fee') > 0;
    }

    /**
     * Check if a referral bonus can be awarded
     *
     * @param User $referrer
     * @return bool
     */
    public function isEligibleForReferralBonus(User $referrer): bool
    {
        return setting('sign_up_referral', 'permission') 
            && (float)setting('referral_bonus', 'fee') > 0;
    }
}
