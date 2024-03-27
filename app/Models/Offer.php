<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Post;
use App\Models\Image;
use App\Models\Auth\User;

class Offer extends Model
{
    //
    protected $fillable = [
        'request_to',
        'offer_by',
        'request_id',
        'price',
        'fee',
        'details',
        'isSelfPurchased',
    ];


    /**
     * belongsTo with Request.
     */
    public function post()
    {
        return $this->belongsTo(Post::class, 'request_id');
    }

    /**
     * belongsTo with User.
     */
    public function offerBy()
    {
        return $this->belongsTo(User::class, 'offer_by');
    }

    /**
     * belongsTo with User.
     */
    public function requestTo()
    {
        return $this->belongsTo(User::class, 'request_to');
    }

    /**
     * Post HasOne to relationship with offer.
     */
    public function images()
    {
        return $this->hasMany(Image::class, 'offer_id');
    }
}

