<?php

namespace App\Models\models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'body',
        'slug',
    ];

    protected $hidden = [
        'enabled',
    ];

    protected $casts = [
        'create_at' => 'datetime',
        'update_at' => 'datetime',
    ];

    protected $table = 'posts';
}
