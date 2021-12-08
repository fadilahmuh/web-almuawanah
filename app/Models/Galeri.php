<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Galeri extends Model
{
    protected $fillable = [
        'divisi',
        'judul',
        'caption',
        'attachment',
    ];

    public $table = "galeri";
}

