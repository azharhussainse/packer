<?php

namespace App\Models\Traits\Relationships;

use App\Models\Auth\User;
use App\Models\Offer;
use App\Models\Image;

trait PostRelationships
{
    /**
     * Post belongs to relationship with user.
     */
    public function owner()
    {
        return $this->belongsTo(User::class, 'created_by');
    }
    /**
     * Post belongs to relationship with user.
     */
    public function requester()
    {
        return $this->belongsTo(User::class, 'requester_id');
    }

    /**
     * Post belongs to relationship with user.
     */
    public function receiver()
    {
        return $this->belongsTo(User::class, 'receiver_id');
    }

    /**
     * Post belongs to relationship with user.
     */
    public function updater()
    {
        return $this->belongsTo(User::class, 'updated_by');
    }

    /**
     * Post HasOne to relationship with offer.
     */
    public function offers()
    {
        return $this->hasMany(Offer::class, 'request_id');
    }

    /**
     * Post HasOne to relationship with offer.
     */
    public function images()
    {
        return $this->hasMany(Image::class, 'request_id');
    }
}
