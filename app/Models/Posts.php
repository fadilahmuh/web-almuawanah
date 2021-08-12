<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Posts extends Model
{
    
    protected $fillable = [
        'judul',
        'slug',
        'content',
        'tag',
        'thumbnail',
        'is_published',
        'users_id'
    ];

    public function users(){
    	return $this->belongsTo(User::class);
    }

    public function gettagAttribute($value)
    {
        return explode(',', $value);
    }
}
