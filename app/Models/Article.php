<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    protected $fillable = ['title', 'author', 'main_image', 'content', 'category', 'target_website'];

    public function images()
    {
        return $this->hasMany(ArticleImage::class);
    }
}
