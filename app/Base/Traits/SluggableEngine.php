<?php

namespace App\Base\Traits;

use Cocur\Slugify\Slugify;

trait SluggableEngine
{
    /**
     * Currently, eloquent-sluggable does not provide activeRuleset function, so to do it on your own for any language
     * with following the key value rule pairs can be found within the link below.
     *
     * @link https://github.com/cocur/slugify/blob/3b29d43b0c0d6af590f998ddf096e6d8aaeb6634/src/RuleProvider/DefaultRuleProvider.php#L784
     *
     * @param \Cocur\Slugify\Slugify $engine
     * @param string $attribute
     * @return \Cocur\Slugify\Slugify
     */
    public function customizeSlugEngine(Slugify $engine, $attribute)
    {
        return $this->getTurkishEngine($engine);
    }

    /**
     * @param \Cocur\Slugify\Slugify $engine
     *
     * @return \Cocur\Slugify\Slugify
     */
    protected function getTurkishEngine(Slugify $engine)
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
