<?php

namespace App;
use App\Notifications\ReplyMarkedAsBestReply;
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
        
        if($reply->owner->id === $this->user->id){
            // self owner
            // he is not notify
            return;
        }
        $reply->owner->notify(new ReplyMarkedAsBestReply($reply->discussion));
    }

    public function bestReply(){
        return $this->belongsTo(Reply::class,'reply_id');
    }


   public function scopefileterByChannels($current_query)
   {
       if(request()->query('channel')){
        //    fileter channels
        $channel = Channel::where('slug',request()->query('channel'))->first();

        if($channel){
            return $current_query->where('channel_id',$channel->id);
        }

        return $current_query;
       }

       return $current_query;
   }
}
