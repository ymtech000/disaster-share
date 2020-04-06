<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Alert extends Model
{
   protected $fillable = ['content', 'user_id', 'area', 'place', 'time', 'image', 'title', 'lat', 'lng'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    
    public function alertcomments()
    {
        return $this->hasMany(Alertcomment::class);
    }
}

