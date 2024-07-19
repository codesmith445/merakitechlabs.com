<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ArticleStep extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'article_id', 'step_number', 'image', 'step_header', 'paragraph',
    ];

    public function article() {
        return $this->belongsTo(Article::class);
    }
}
