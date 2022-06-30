<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Dog extends Model
{
    public $keyType = 'string';

    public $incrementing = false;

    public $timestamps = false;

    protected $guarded = false;
}
