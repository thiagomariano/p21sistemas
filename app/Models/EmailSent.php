<?php

namespace AllBlacks\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class EmailSent extends Model
{

    protected $table = 'emails_sent';
    protected $dates = ['date'];

    protected $fillable = [
        'subject',
        'description',
        'submissions',
        'date'
    ];
}
