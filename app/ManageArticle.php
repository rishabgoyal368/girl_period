<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ManageArticle extends Model
{
    protected $fillable = [
        'title',
        'image',
        'description',
    ];
}
