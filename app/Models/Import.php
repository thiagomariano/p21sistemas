<?php

namespace AllBlacks\Models;

use Illuminate\Database\Eloquent\Model;

class Import extends Model
{

    protected $fillable = [
        'file',
        'total',
        'created',
        'updated',
    ];
}
