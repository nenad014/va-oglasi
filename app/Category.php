<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    public function oglasi() {
        return $this->hasMany('App\Oglas');
    }
}
