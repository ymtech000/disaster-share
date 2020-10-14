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
    
    
    public function favorited()
    {
        return $this->belongsToMany(User::class, 'favorites', 'alert_id', 'user_id')->withTimestamps();
    }
    
    public function favorite($alertId)
    {
        // 既にいいねしているかの確認
        $exist = $this->is_favorite($alertId);
    
        if ($exist) {
            // 既にいいねしていれば何もしない
            return false;
        } else {
            // 未いいねであればいいねする
            $this->favorited()->attach($alertId);
            return true;
        }
    }
    
    public function unfavorite($alertId)
    {
        // 既にいいねしているかの確認
        $exist = $this->is_favorite($alertId);
      
        if ($exist) {
            // 既にいいねしていればいいねを外す
            $this->favorited()->detach($alertId);
            return true;
        } else {
            // 未いいねであれば何もしない
            return false;
        }
    }
    
    public function is_favorite($alertId)
    {
        return $this->favorited()->where('alert_id', $alertId)->exists();
    }
}

