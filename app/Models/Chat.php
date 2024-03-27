<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Auth\User;
use App\Models\Message;

class Chat extends Model
{




    public function owner(){
        return $this->belongsTo(User::class, 'created_by');
    }

    public function receiver(){
        return $this->belongsTo(User::class, 'user2');
    }

}
