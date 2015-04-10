<?php namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Setting
 *
 * @property integer $id 
 * @property string $logo 
 * @property string $email 
 * @property string $facebook 
 * @property string $twitter 
 * @property boolean $status 
 * @property \Carbon\Carbon $created_at 
 * @property \Carbon\Carbon $updated_at 
 * @property-read \App\Language $language 
 * @method static \Illuminate\Database\Query\Builder|\App\Setting whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Setting whereLogo($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Setting whereEmail($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Setting whereFacebook($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Setting whereTwitter($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Setting whereStatus($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Setting whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Setting whereUpdatedAt($value)
 */
class Setting extends Model {

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['logo', 'email', 'facebook', 'twitter', 'status'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function language()
    {
        return $this->belongsTo('App\Language');
    }

}