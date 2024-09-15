<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Comments extends Model
{
    use HasFactory;

    protected $fillable = [
        'body',
        'comment_user_id'
    ];

    public function posts() : BelongsTo {
        return $this->belongsTo(Posts::class);
    }

    public function user() : BelongsTo {
        return $this->belongsTo(User::class);
    }
}
