<?php

namespace AllBlacks\Models;

use Illuminate\Database\Eloquent\Model;

class EmailSent extends Model
{

    protected $table = 'emails_sent';

    protected $fillable = [
        'subject',
        'description',
        'submissions',
        'date'
    ];
}
