<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Notification extends Model
{
    use HasFactory;

    protected $fillable = [
        'guid',
        'link',
        'title',
        'creator',
        'category',
        'pubDateAgo',
        'pubDate'
    ];

    public static function notViewed()
    {
        return Notification::where('is_viewed', '=', 0)->get();
    }
}
