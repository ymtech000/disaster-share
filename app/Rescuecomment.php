<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Rescuecomment extends Model
{
    protected $fillable = [ 'parent_id', 'user_id', 'comment', 'rescue_id', 'image', 'time'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    
    public function rescue()
    {
        return $this->belongsTo(Rescue::class);
    }
    
    public function parent()
    {
        return $this->belongsTo(self::class, 'parent_id');
    }

    public function children()
    {
        return $this->hasMany(self::class, 'parent_id');
    }
}