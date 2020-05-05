<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Alertcomment extends Model
{
    protected $fillable = [ 'parent_id', 'user_id', 'comment', 'alert_id', 'time'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    
    public function alert()
    {
        return $this->belongsTo(Alert::class);
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