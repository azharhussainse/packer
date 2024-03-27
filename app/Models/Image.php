<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    protected $fillable = [
        'request_id',
        'offer_id',
        'path',
        'created_at',
        'updated_at',
    ];

}
