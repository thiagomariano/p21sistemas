<?php

namespace AllBlacks\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Client extends Model
{

    use SoftDeletes;

    protected $fillable = [
        'name',
        'document',
        'postcode',
        'address',
        'district',
        'city',
        'state',
        'telephone',
        'email',
        'active'
    ];
}
