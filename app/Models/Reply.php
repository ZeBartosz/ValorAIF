<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Reply extends Model
{
    use HasFactory;

    protected $fillable = [
        'body',
        'comment_user_id',
    ];

    public function comments() : BelongsTo {
        return $this->belongsTo(Comments::class);
    }

}
