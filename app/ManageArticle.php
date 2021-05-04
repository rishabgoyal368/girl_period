<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ManageArticle extends Model
{
    protected $fillable = [
        'title',
        'description',
    ];


    public static function addEdit($data)
    {
        return ManageArticle::updateOrCreate(
            ['id' => @$data['id']],
            [
                'title' => @$data['title'],
                'description' => @$data['description']
            ]
        );
    }
}
