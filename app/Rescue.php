<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Rescue extends Model
{
   protected $fillable = ['content', 'user_id', 'area', 'place', 'time', 'image', 'lat', 'lng'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    
    public function rescuecomments()
    {
        return $this->hasMany(Rescuecomment::class);
    }
}

