<?php

namespace App\Models;

use App\Models\Traits\Attributes\TestmonialAttributes;
use App\Models\Traits\ModelAttributes;

use Illuminate\Database\Eloquent\Model;

class Testimonial extends Model
{
    use ModelAttributes, TestmonialAttributes;

    //
    protected $fillable = [
        'testmonial',
        'author',
        'image',
        'show_on_home'
    ];
}
