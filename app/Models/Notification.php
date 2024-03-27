<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Auth\User;

class Notification extends Model
{
    public function owner(){
        return $this->belongsTo(User::class,'created_by');
    }

    public function to(){
        return $this->belongsTo(User::class,'to');
    }
}
