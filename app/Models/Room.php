<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Message;
use Carbon\Carbon;

class Room extends Model
{
    protected $guarded = ['id'];
    protected $fillable = ['name', 'slug'];

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

    public function messages(){
        return $this->hasMany(Message::class);
    }
}
