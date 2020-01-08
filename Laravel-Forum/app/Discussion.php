<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use PhpParser\Node\Expr\FuncCall;

class Discussion extends Model
{
    protected $fillable = ['title','content','channel_id','user_id','slug','reply_id'];

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function getRouteKeyName()
    {
        return 'slug';  
    }

    public function replies(){
        return $this->hasMany(Reply::class);
    }

    public function markAsBest(Reply $reply){
        $this->update([
            'reply_id'=>$reply->id
        ]);
    }

    public function bestReply(){
        return $this->belongsTo(Reply::class,'reply_id');
    }
}
