<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WebRecord extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $fillable = [
        'url',
        'title',
        'word_count',
        'status',
        'user_id'
    ];
}
