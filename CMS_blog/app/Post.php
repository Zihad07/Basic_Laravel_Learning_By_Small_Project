<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Storage;

class Post extends Model
{
    use SoftDeletes;

    protected $fillable = ['title','description','content','image','published_at','category_id','user_id'];

    public function deleteImage()
    {
        // it delete post image
        Storage::delete($this->image);
    }

    // Many to one
    public function category(){
        return $this->belongsTo(Category::class);
    }

    // Many to many
    public function tags(){
        return $this->belongsToMany(Tag::class);
    }

    /**
     * if post has tags
     *
     * @param [type] $tagId
     * @return boolean
     */
    public function hasTag($tagId){
        return in_array($tagId,$this->tags->pluck('id')->toarray());
    }

    /**
     * many to one
     *
     * @return usertable
     */
    public function user(){
        return $this->belongsTo(User::class);
    }
}
