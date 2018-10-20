<?php

namespace App\Models;

use App\Base\SluggableModel;

class Category extends SluggableModel
{
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function articles(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(Article::class)->published();
    }

    /**
     * @return string
     */
    public function getLinkAttribute(): string
    {
        return route('category', ['cSlug' => $this->slug]);
    }
}
