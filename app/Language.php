<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Language
 *
 * @property integer $id
 * @property string $title
 * @property string $flag
 * @property string $code
 * @property string $site_title
 * @property string $site_description
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Category[] $categories
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Page[] $pages
 * @method static \Illuminate\Database\Query\Builder|\App\Language whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Language whereTitle($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Language whereFlag($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Language whereCode($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Language whereSiteTitle($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Language whereSiteDescription($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Language whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Language whereUpdatedAt($value)
 */
class Language extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['code', 'flag', 'site_description', 'site_title', 'title'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function categories()
    {
        return $this->hasMany('App\Category');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function pages()
    {
        return $this->hasMany('App\Page');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasManyThrough
     */
    public function articles()
    {
        return $this->hasManyThrough('App\Article', 'App\Category');
    }

}