<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hotel extends Model
{
    use HasFactory;

    public function users()
    {
        return $this->hasManyThrough(User::class, UserInfo::class, "hotel_id", "id", "id", "user_id")->distinct();
    }

    public function roms()
    {
        return $this->belongsToMany(RomeType::class, 'hotel_romes')->withPivot('quantity');
    }

    public function getCapacityAttribute()
    {
        $capacity = -1 * $this->users->count();
        foreach($this->roms as $rom){
            $capacity += $rom->capacity * $rom->pivot->quantity;
        }
        return $capacity;
    }
}
