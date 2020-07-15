<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class File extends Model
{
    use SoftDeletes;

    protected $guarded = [];

    /**
     * Файл принадлежит пользователю
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function getHumanSize()
    {
        return $this->size_format($this->size);
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    //тут не место
    private function size_format(int $size, int $decimals = 0, string $decimal_separator = '.', string $thousands_separator = ','): string {
        $units = ['B', 'KB', 'MB', 'GB', 'TB', 'PB', 'EB', 'ZB', 'YB'];
        for($index = 0; $index < count($units) - 1, $size > 1000; $index++, $size /= 1000);
        $number = number_format($size, $decimals, $decimal_separator, $thousands_separator);
        return $number . ' ' . $units[$index];
    }
}
