<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Poster extends Model
{
    protected $fillable = ['title', 'image_path', 'target_website'];

    public function articles()
    {
        return $this->hasMany(Article::class, 'target_website', 'target_website');
    }
}
