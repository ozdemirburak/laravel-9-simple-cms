<?php

namespace App\Models;

use App\Base\SluggableModel;

class Product extends SluggableModel
{
    /**
     * @return string
     */
    public function getLinkAttribute(): string
    {
        return route('product', ['productSlug' => $this->slug]);
    }
}
