<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Balance extends Model
{

    use SoftDeletes;
    protected $fillable = [
        'amount', 'secretNum', 'bus_id'
    ];
    public function bus()
    {
        return $this->belongsTo('App\Bus');
    }
}
