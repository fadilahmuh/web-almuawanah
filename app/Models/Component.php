<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Component extends Model
{
        
    protected $fillable = [
        'divisi',
        'bagian',
        'judul',
        'content',
        'attachment',
        'desc1',
        'desc2',
    ];
}
