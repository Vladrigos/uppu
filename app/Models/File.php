<?php

namespace App\Models;
use App\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class File extends Model
{
    use SoftDeletes;

    protected $fillable
        = [
            'user_id',
            'name',
            'hash_name',
            'size',
            'comment',
            'extension',
        ];

    /**
     * Файл принадлежит пользователю
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
