<?php

namespace App;

use App\Base\Auth\ResetPassword;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\Hash;

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

class User extends Authenticatable
{
    use Notifiable;

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
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = ['logged_in_at', 'logged_out_at'];

    /**
     * Set password encrypted
     *
     * @param $password
     */
    public function setPasswordAttribute($password)
    {
        $this->attributes['password'] = Hash::make($password);
    }

    /**
     * @param $picture
     *
     * @return string
     */
    public function getPictureAttribute($picture)
    {
        return !empty($picture) ? asset($picture) : 'https://ssl.gstatic.com/accounts/ui/avatar_2x.png';
    }

    /**
     * Send the password reset notification.
     *
     * @param  string  $token
     * @return void
     */
    public function sendPasswordResetNotification($token)
    {
        $this->notify(new ResetPassword($token));
    }
}
