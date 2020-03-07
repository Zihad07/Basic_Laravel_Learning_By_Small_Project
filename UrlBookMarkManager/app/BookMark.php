<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BookMark extends Model
{
    protected $guarded = [];
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
