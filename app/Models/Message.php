<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Message extends Model
{
    protected $guarded = ['id'];

    public function getCreatedAtAttribute($value)
    {
        $date = Carbon::parse($value);

        if ($date->isToday()) {
            return "Today, " . $date->format('g:i A');
        }

        if ($date->isYesterday()) {
            return "Yesterday, " . $date->format('g:i A');
        }

        return $date->diffForHumans(null, true) . " ago, " . $date->format('g:i A');
    }

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function room(){
        return $this->belongsTo(Room::class);
    }
}
