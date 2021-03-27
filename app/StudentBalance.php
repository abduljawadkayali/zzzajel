<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class StudentBalance extends Model
{
    use SoftDeletes;
    protected $fillable = [
        'monthNumber', 'balance'
    ];
}
