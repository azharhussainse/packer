<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Auth\User;

class Message extends Model
{
    protected $fillable = [
        'message',
        'type',
        'image',
        'created_by',
        'chat_id',
    ];

    public function owner(){
        return $this->belongsTo(User::class, 'created_by');
    }
}
