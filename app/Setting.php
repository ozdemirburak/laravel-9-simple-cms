<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Setting
 *
 * @property integer $id
 * @property string $logo
 * @property string $email
 * @property string $facebook
 * @property string $twitter
 * @property string $disqus_shortname
 * @property string $analytics_id
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property-read \App\Language $language
 * @method static \Illuminate\Database\Query\Builder|\App\Setting whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Setting whereLogo($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Setting whereEmail($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Setting whereFacebook($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Setting whereTwitter($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Setting whereDisqusShortname($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Setting whereAnalyticsId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Setting whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Setting whereUpdatedAt($value)
 */
class Setting extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['analytics_id', 'disqus_shortname', 'email', 'facebook', 'logo', 'twitter'];

}