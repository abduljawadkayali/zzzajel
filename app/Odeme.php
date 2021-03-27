<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Odeme extends Model
{
    use SoftDeletes;
    protected $fillable = [
        'amount', 'Description', 'bus_id'
    ];
    public function bus()
    {
        return $this->belongsTo('App\Bus');
    }
}
