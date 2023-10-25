<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    // Here we telling laravel to no guard everything in the application that we are going to post
    protected $guarded = [];

    use HasFactory;
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
