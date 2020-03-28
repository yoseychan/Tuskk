<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    protected $fillable = ['title'];
    public $timestamps = false;


    //Relations

    public function articles()
    {
        return $this->belongsToMany(Article::class);
    }
}
