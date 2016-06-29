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
 * @mixin \Eloquent
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
        'save_to' => 'slug',
        'on_update' => true
    ];

    /**
     * Return a class that has a 'slugify()` method, used to convert
     * strings into slugs.
     *
     * @return Slugify
     */
    protected function getSlugEngine()
    {
        $engine = new Slugify();
        return $this->addTurkishRules($engine);
    }

    /**
     * Currently, eloquent-sluggable does not provide activeRuleset function, so to do it on your own for any language
     * with following the key value rule pairs can be found within the link below.
     *
     * @link https://github.com/cocur/slugify/blob/3b29d43b0c0d6af590f998ddf096e6d8aaeb6634/src/RuleProvider/DefaultRuleProvider.php#L784
     *
     * @param \Cocur\Slugify\Slugify $engine
     *
     * @return \Cocur\Slugify\Slugify
     */
    protected function addTurkishRules(Slugify $engine)
    {
        $engine->addRule('Ç', 'C');
        $engine->addRule('Ğ', 'G');
        $engine->addRule('İ', 'I');
        $engine->addRule('Ş', 'S');
        $engine->addRule('Ö', 'O');
        $engine->addRule('Ü', 'U');
        $engine->addRule('ğ', 'g');
        $engine->addRule('ı', 'i');
        $engine->addRule('ş', 's');
        $engine->addRule('ö', 'o');
        $engine->addRule('ü', 'u');
        return $engine;
    }
}

