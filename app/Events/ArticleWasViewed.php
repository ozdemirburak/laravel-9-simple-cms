<?php

namespace App\Events;

use App\Article;
use App\Events\Event;
use Illuminate\Queue\SerializesModels;

class ArticleWasViewed extends Event
{
    use SerializesModels;

    public $article;

    /**
     * Create a new event instance.
     *
     * @param  Article $article
     */
    public function __construct(Article $article)
    {
        $this->article = $article;
    }

}