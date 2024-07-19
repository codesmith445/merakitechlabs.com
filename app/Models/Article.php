<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'category',
        'title',
        'header',
        'paragraph',
        'image',
    ];

    public function steps() {
        return $this->hasMany(ArticleStep::class);
    }
}
