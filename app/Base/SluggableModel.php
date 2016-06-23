<?php

namespace App\Base;

use Cocur\Slugify\Slugify;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\SluggableInterface;
use Cviebrock\EloquentSluggable\SluggableTrait;

/**
 * App\Base\SluggableModel
 *
 * @property-write mixed $slug
 * @method static \Illuminate\Database\Query\Builder|\App\Base\SluggableModel whereSlug($slug)
 */
class SluggableModel extends Model implements SluggableInterface
{
    use SluggableTrait;

    /**
     * Create slug from title using 3rd party trait
     *
     * @var array
     */
    protected $sluggable = [
        'build_from' => 'title',
        'save_to'    => 'slug',
        'on_update'  => true
    ];

    /**
     * @param \Cocur\Slugify\Slugify $engine
     * @param string $attribute
     * @return \Cocur\Slugify\Slugify
     */
    public function customizeSlugEngine(Slugify $engine, $attribute)
    {
        $engine->activateRuleset('turkish');
        return $engine;
    }
}
