<?php

namespace App;

use App\Base\SluggableModel;

/**
 * App\Category
 *
 * @property integer $id
 * @property integer $language_id
 * @property string $title
 * @property string $slug
 * @property string $description
 * @property string $color
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property-read \App\Language $language
 * @method static \Illuminate\Database\Query\Builder|\App\Category whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Category whereLanguageId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Category whereTitle($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Category whereSlug($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Category whereDescription($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Category whereColor($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Category whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Category whereUpdatedAt($value)
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Article[] $articles
 */
class Category extends SluggableModel
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['color', 'description','language_id', 'title'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function language()
    {
        return $this->belongsTo(Language::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function articles()
    {
        return $this->hasMany(Article::class);
    }
}
