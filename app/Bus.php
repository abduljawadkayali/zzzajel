<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Bus extends Model
{
    use SoftDeletes;
    protected $fillable = [
        'busDriver', 'busNumber', 'DeviceNumber', 'DriverPhone', 'password' ,
        'status', 'MemoryAdres', 'DriverId', 'WifiName', 'WifiPass','company_id'
    ];

    public function balance()
    {
        return $this->HasMany('App\Balance');
    }
    public function company()
    {
        return $this->belongsTo('App\Company', 'company_id','id');
    }
}
