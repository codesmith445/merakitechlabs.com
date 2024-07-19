<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PostStep extends Model
{
    use HasFactory;
    protected $fillable = [
        'post_id', 'step_number', 'image', 'instructions', 'source_code', 'step_header'
    ];

    public function post() {
        return $this->belongsTo(Post::class);
    }
}
