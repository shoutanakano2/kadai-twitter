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
    protected $hidden=[
        'password','remember_token',];
    
    public function twitter(){
        return $this->hasMany(Twitter::class);
    }
}
