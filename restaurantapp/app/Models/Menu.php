<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    // Define the relationship to the Category model
    public function category()
    {
        // Assuming your Menu model has a 'category_id' that relates to the 'id' on a Category model
        return $this->belongsTo(Category::class);
    }
}
