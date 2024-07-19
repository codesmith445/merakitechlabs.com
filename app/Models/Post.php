<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;
    protected $fillable = [
        'category',
        'title',
        'goals',
        'project_url',
        'project_detail',
        'image',
        'source_code',
        'instructions',
    ];

    public function steps() {
        return $this->hasMany(PostStep::class);
    }
}
