<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Message;

class Room extends Model
{
    public function messages(){
        return $this->hasMany(Message::class);
    }
}
