<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    public function categoryRelation() {
        return $this->belongsTo(Category::class, 'category', 'id');
    }
}
