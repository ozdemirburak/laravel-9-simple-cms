<?php

namespace App;

use App\Base\SluggableModel;
use Carbon\Carbon;

/**
 * App\Article
 *
 * @property integer $id
 * @property integer $category_id
 * @property string $title
 * @property string $slug
 * @property string $content
 * @property string $published_at
 * @property string $description
 * @property integer $read
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property-read \App\Category $category
 * @method static \Illuminate\Database\Query\Builder|\App\Article whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Article whereCategoryId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Article whereTitle($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Article whereSlug($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Article whereContent($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Article wherePublishedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Article whereDescription($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Article whereRead($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Article whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Article whereUpdatedAt($value)
 * @method static \App\Article published()
 * @property integer $read_count
 */
class Article extends SluggableModel
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['category_id', 'content', 'description', 'published_at', 'title'];

    /**
     * Carbon instance fields
     *
     * @var array
     */
    protected $dates = ['published_at'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    /**
     * Get the published_at attribute.
     *
     * @param  $date
     * @return string
     */
    public function getPublishedAtAttribute($date)
    {
        return Carbon::parse($date)->format('Y-m-d');
    }

    /**
     * Scope queries to articles that are published
     *
     * @param $query
     */
    public function scopePublished($query)
    {
        return $query->where('published_at', '<=', Carbon::now());
    }
}
