<?php

namespace LaraDex;

use Illuminate\Database\Eloquent\Model;

class Trainer extends Model
{
    protected $fillable = ['name','avatar','description'];
    //para customizar el implicit binding
    public function getRouteKeyName()
    {
        return 'slug';
    }
}
