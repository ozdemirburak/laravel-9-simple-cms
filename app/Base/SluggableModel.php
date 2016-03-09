<?php

namespace App\Base;

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
    protected $sluggable = array(
        'build_from' => 'title',
        'save_to'    => 'slug',
        'on_update'  => true
    );

    /**
     * Set the slug according to Turkish language (Ö => o and Ü => u) instead of German (Ö => oe and Ü => ue)
     *
     * @param $slug
     */
    public function setSlugAttribute($slug)
    {
        $this->attributes['slug'] = str_replace(["oe", "ue"], ["o", "u"], $slug);
    }
}
