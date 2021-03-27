<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Jorney extends Model
{
    use SoftDeletes;
    protected $fillable = [
        'name','adres', 'lan','lat'
    ];
    public function line()
    {
        return $this->HasMany('App\Line');
    }
}
