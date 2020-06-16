<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Twitter extends Model
{
    //
    protected $fillable=['content','user_id'];
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    
    public function favorite_users(){
        return $this->belongsToMany(User::class,'users','user_id','twitter_id')->withTimestamps();
    }

    

}
