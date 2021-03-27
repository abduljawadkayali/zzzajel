<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Payment extends Model
{
    use SoftDeletes;
    protected $fillable = [
        'amount', 'device_id'
    ];
    public function device()
    {
        return $this->belongsTo('App\Device');
    }
}
