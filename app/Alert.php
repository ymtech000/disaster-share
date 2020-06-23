<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Alert extends Model
{
   protected $fillable = ['content', 'user_id', 'area', 'location', 'time', 'image', 'title', 'lat', 'lng', 'edit'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    
    public function alertcomments()
    {
        return $this->hasMany(Alertcomment::class);
    }
}

