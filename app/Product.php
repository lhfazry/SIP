<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    // adding relationship
    public function category() {
        return $this->belongsTo('App\Category');
    }
}
