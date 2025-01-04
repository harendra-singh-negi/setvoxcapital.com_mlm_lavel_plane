<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Log;

class ReferralLink extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['user_id', 'referral_program_id'];

    /**
     * Get or create a referral link
     *
     * @param User $user
     * @param ReferralProgram $program
     * @return ReferralLink
     */
    public static function getReferral($user, $program)
    {
        return static::firstOrCreate([
            'user_id' => $user->id,
            'referral_program_id' => $program->id,
        ]);
    }

    /**
     * Boot the model.
     *
     * @return void
     */
    protected static function boot()
    {
        parent::boot();

        static::creating(function (ReferralLink $model) {
            try {
                if ($model->user) {
                    $model->code = $model->user->username;
                    
                    Log::info('Generated referral code for user:', [
                        'user_id' => $model->user->id,
                        'username' => $model->user->username,
                        'code' => $model->code
                    ]);
                } else {
                    Log::error('Failed to generate referral code: User not found', [
                        'user_id' => $model->user_id
                    ]);
                }
            } catch (\Exception $e) {
                Log::error('Error generating referral code:', [
                    'error' => $e->getMessage(),
                    'user_id' => $model->user_id ?? 'unknown'
                ]);
            }
        });
    }

    /**
     * Get the full referral link
     *
     * @return string
     */
    public function getLinkAttribute()
    {
        return url($this->program->uri) . '?invite=' . $this->code;
    }

    /**
     * Get the user that owns the referral link
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Get the program associated with the referral link
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function program()
    {
        return $this->belongsTo(ReferralProgram::class, 'referral_program_id');
    }

    /**
     * Get the relationships associated with the referral link
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function relationships()
    {
        return $this->hasMany(ReferralRelationship::class);
    }
}
