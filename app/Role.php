<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    protected $fillable = ['name', 'label'];
    public $timestamps = false;

    public function users()
    {
        return $this->hasMany(User::class);
    }
}
