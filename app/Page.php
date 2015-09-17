<?php

namespace App;

use App\Language;
use Baum\Node;
use Cviebrock\EloquentSluggable\SluggableInterface;
use Cviebrock\EloquentSluggable\SluggableTrait;

/**
 * App\Page
 *
 * @property integer $id
 * @property integer $language_id
 * @property integer $parent_id
 * @property integer $lft
 * @property integer $rgt
 * @property integer $depth
 * @property string $title
 * @property string $slug
 * @property string $content
 * @property string $description
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property-read \App\Language $language
 * @property-read App\Page $parent
 * @property-read \Illuminate\Database\Eloquent\Collection|App\Page[] $children
 * @method static \Illuminate\Database\Query\Builder|\App\Page whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Page whereLanguageId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Page whereParentId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Page whereLft($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Page whereRgt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Page whereDepth($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Page whereTitle($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Page whereSlug($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Page whereContent($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Page whereDescription($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Page whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Page whereUpdatedAt($value)
 * @method static \Baum\Node withoutNode($node)
 * @method static \Baum\Node withoutSelf()
 * @method static \Baum\Node withoutRoot()
 * @method static \Baum\Node limitDepth($limit)
 */
class Page extends Node implements SluggableInterface
{
    use SluggableTrait;

    protected $fillable = ['content', 'description', 'language_id', 'title'];

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
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function language()
    {
        return $this->belongsTo('App\Language');
    }

    /**
     * Purify the content
     *
     * @param $content
     */
    public function setContentAttribute($content)
    {
        $this->attributes['content'] = clean($content,'youtube');
    }

}