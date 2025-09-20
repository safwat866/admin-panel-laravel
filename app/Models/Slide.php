<?php

namespace App\Models;

use Spatie\Translatable\HasTranslations;
use Illuminate\Database\Eloquent\Model;
class Slide extends Model {

    const files = ['image'];
    const path  = 'Slides';

    protected $fillable = [
        'slide_type',
        'type',
        'image',
        'title',
        'description',
    ];
    const searchAttributes = ['title','description', 'type'];

    protected $translatable = [
        'title',
        'description',
    ];


}
