<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{

public function etiquette() {
        return $this->belongsTo(Etiquette::class);
    }



    /*
protected $fillable = [  // che possono essere riempiti a partire da un array associativo
        'titlePost',
        'textPost',
        'etiquette',
        'comment',
        'image',
        'read'
    ]; */
}