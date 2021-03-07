<?php

namespace App\Base;

use Cviebrock\EloquentSluggable\Sluggable;
use Cviebrock\EloquentSluggable\SluggableScopeHelpers;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Base\SluggableModel
 *
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Base\SluggableModel findSimilarSlugs($attribute, $config, $slug)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Base\SluggableModel whereSlug($slug)
 * @mixin \Eloquent
 */
class SluggableModel extends Model
{
    use Sluggable, SluggableScopeHelpers;

    /**
     * @var array
     */
    protected $guarded = ['created_at', 'id'];

    /**
     * @return array
     */
    public function sluggable()
    {
        return [
            'slug' => [
                'source'   => 'title',
                'onUpdate' => true
            ]
        ];
    }
}
