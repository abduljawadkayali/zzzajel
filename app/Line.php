<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Line extends Model
{
    use SoftDeletes;
    protected $fillable = [
        'name', 'price', 'duration', 'startingTime', 'image' ,
        'status', 'jorney_id'
    ];
    public function jorney()
    {
        return $this->belongsTo('App\Jorney', 'jorney_id','id');
    }
}
