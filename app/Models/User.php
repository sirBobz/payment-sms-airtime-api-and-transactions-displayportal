<?php

/**
 * Created by Reliese Model.
 * Date: Thu, 21 Nov 2019 17:32:41 +0000.
 */
namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Carbon\Carbon;
use Spatie\Permission\Traits\HasRoles;
use Hash;
use DateTimeInterface;

/**
 * Class User
 *
 * @property int $id
 * @property int $org_id
 * @property string $name
 * @property string $email
 * @property string $phone_number
 * @property string $password
 * @property \Carbon\Carbon $email_verified_at
 * @property string $remember_token
 * @property string $deleted_at
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 *
 * @property \App\Models\Organization $organization
 *
 * @package App
 */
class User extends Authenticatable
{
	use Notifiable, HasRoles;

	protected $connection = 'mysql';
	protected $table = 'users';

	protected $casts = [
		'org_id' => 'int'
	];

	protected $dates = [
		'email_verified_at', 'two_factor_expires_at'
	];

	protected $hidden = [
		'password',
		'remember_token'
	];

	protected $fillable = [
		'org_id',
		'name',
		'email',
		'ip_address',
		'phone_number',
		'password',
		'email_verified_at',
		'remember_token',
		'two_factor_expires_at',
		'two_factor_code'
	];

    /**
     * Prepare a date for array / JSON serialization.
     *
     * @param  \DateTimeInterface  $date
     * @return string
     */
    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }

	public function generateTwoFactorCode()
	{
	    $this->timestamps = false;
	    $this->two_factor_code = rand(100000, 999999);
	    $this->two_factor_expires_at = now()->addMinutes(10);
	    $this->save();
	}
	public function resetTwoFactorCode()
	{
	    $this->timestamps = false;
	    $this->two_factor_code = null;
	    $this->two_factor_expires_at = null;
	    $this->save();
	}
	public function organization()
	{
		return $this->belongsTo(\App\Models\Organization::class, 'org_id');
	}

    public function getEmailVerifiedAtAttribute($value)
    {
        return $value ? Carbon::createFromFormat('Y-m-d H:i:s', $value)->format(config('panel.date_format') . ' ' . config('panel.time_format')) : null;
    }
    // public function setEmailVerifiedAtAttribute($value)
    // {
    //     $this->attributes['email_verified_at'] = $value ? Carbon::createFromFormat(config('panel.date_format') . ' ' . config('panel.time_format'), $value)->format('Y-m-d H:i:s') : null;
    // }
    public function setPasswordAttribute($input)
    {
        if ($input) {
            $this->attributes['password'] = app('hash')->needsRehash($input) ? Hash::make($input) : $input;
        }
    }
    public function sendPasswordResetNotification($token)
    {
        $this->notify(new \App\Notifications\ResetPassword($token));
    }
    // public function roles()
    // {
    //     return $this->belongsToMany(\App\Models\Role::class);
    // }

    public function sendEmailVerificationNotification()
	{
	    $this->notify(new \App\Notifications\VerifyEmailQueued);
	}

    // public function role()
    // {
    //     return $this->belongsToMany(Role::class, 'role_user');
    // }
}
