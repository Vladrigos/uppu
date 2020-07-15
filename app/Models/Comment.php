<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $guarded = [];

    public function files()
    {
        return $this->belongsTo(File::Class);//???
    }

    public function user()
    {
        return $this->belongsTo(User::Class, 'user_id');
    }
}
