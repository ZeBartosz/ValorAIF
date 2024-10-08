<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class CommentLikes extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'liked',
        'disliked'

    ];

    public function comments() : BelongsTo {
        return $this->belongsTo(Comments::class);
    }
}
