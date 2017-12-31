<?php

namespace App\Base;

use Cocur\Slugify\Slugify;
use Cviebrock\EloquentSluggable\Sluggable;
use Cviebrock\EloquentSluggable\SluggableScopeHelpers;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Base\SluggableModel
 *
 * @method static \Illuminate\Database\Query\Builder|\App\Base\SluggableModel whereSlug($slug)
 * @mixin \Eloquent
 * @method static \Illuminate\Database\Query\Builder|\App\Base\SluggableModel findSimilarSlugs(\Illuminate\Database\Eloquent\Model $model, $attribute, $config, $slug)
 */
class SluggableModel extends Model
{
    use Sluggable, SluggableScopeHelpers;

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

    /**
     * @param \Cocur\Slugify\Slugify $engine
     *
     * @return \Cocur\Slugify\Slugify
     */
    public function customizeSlugEngine(Slugify $engine)
    {
        return $engine->activateRuleSet('turkish');
    }
}
