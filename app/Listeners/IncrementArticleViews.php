<?php

namespace App\Listeners;

use App\Events\ArticleWasViewed;

class IncrementArticleViews
{
    /**
     * Create the event handler.
     *
     */
    public function __construct()
    {
        //
    }

    /**
     * Update the article read count
     *
     * @param ArticleWasViewed $event
     * @return void
     */
    public function handle(ArticleWasViewed $event)
    {
        $event->article->read++;
        $event->article->save();
    }

}
