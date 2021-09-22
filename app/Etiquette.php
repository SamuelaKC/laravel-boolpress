<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Etiquette extends Model
{
        public function post() {
        return $this->hasMany(Post::class);
        }
}