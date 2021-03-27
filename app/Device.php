<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Device extends Model
{
    use SoftDeletes;
    protected $fillable = [
        'SalerName', 'DeviceNumber', 'Adres', 'SalerPhone', 'password' ,
        'status', 'MemoryAdres', 'WifiName', 'WifiPass'
    ];
}
