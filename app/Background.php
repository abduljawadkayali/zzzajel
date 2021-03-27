<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Background extends Model
{
    protected $fillable = [
        'image','link','link_title','title','body'
    ];
}
