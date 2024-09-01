<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class posts extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'body',
        'postsBanner'
    ];

    public function user() : BelongsTo {
        return $this->belongsTo(User::class);
    }

}
