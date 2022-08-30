<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Story extends Model
{
    protected $fillable = [
        // 'user_id',
        'title',
        'body',
        'genre',
        'status'
    ];
    
    public function user () {
        return $this->belongsTo(\App\User::class);
    }
}
