<?php

namespace App;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;

/**
 * App\User
 *
 * @property integer $id
 * @property string $name
 * @property string $email
 * @property string $password
 * @property string $remember_token
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @method static \Illuminate\Database\Query\Builder|\App\User whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\User whereName($value)
 * @method static \Illuminate\Database\Query\Builder|\App\User whereEmail($value)
 * @method static \Illuminate\Database\Query\Builder|\App\User wherePassword($value)
 * @method static \Illuminate\Database\Query\Builder|\App\User whereRememberToken($value)
 * @method static \Illuminate\Database\Query\Builder|\App\User whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\User whereUpdatedAt($value)
 * @property string $logged_in_at
 * @property string $logged_out_at
 * @property mixed $ip_address
 * @property string $picture
 * @method static \Illuminate\Database\Query\Builder|\App\User whereLoggedInAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\User whereLoggedOutAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\User whereIpAddress($value)
 * @method static \Illuminate\Database\Query\Builder|\App\User wherePicture($value)
 */
class User extends Model implements AuthenticatableContract, CanResetPasswordContract
{
	use Authenticatable, CanResetPassword;

	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = ['email', 'name', 'password', 'picture'];

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $hidden = ['password', 'remember_token'];

    /**
     * Set password encrypted
     *
     * @param $password
     */
    public function setPasswordAttribute($password)
    {
        $this->attributes['password'] =  Hash::make($password);
    }

    /**
     * Get the logged_in_at attribute.
     *
     * @param  $date
     * @return string
     */
    public function getLoggedInAtAttribute($date)
    {
        return Carbon::parse($date);
    }

    /**
     * Get the logged_out_at attribute.
     *
     * @param  $date
     * @return string
     */
    public function getLoggedOutAtAttribute($date)
    {
        return Carbon::parse($date);
    }

    /**
     * Set the ip address attribute.
     *
     * @param $ip
     * @return string
     */
    public function setIpAddressAttribute($ip)
    {
        $this->attributes['ip_address'] = inet_pton($ip);
    }


    /**
     * Get the ip address attribute.
     *
     * @param $ip
     * @return string
     */
    public function getIpAddressAttribute($ip)
    {
        return $ip ? inet_ntop($ip) : "";
    }

}