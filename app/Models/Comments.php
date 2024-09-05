<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Post;

class Comments extends Model
{
    use HasFactory;

    protected $fillable = [
        'body'
    ];

    public function posts() : BelongsTo {
        return $this->belongsTo(Post::class);
    }
}
