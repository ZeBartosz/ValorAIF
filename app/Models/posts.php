<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class posts extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'body',
        'catagory',
        'postsBanner'
    ];

    public function user() : BelongsTo {
        return $this->belongsTo(User::class);
    }

    public function comments() : HasMany {
        return $this->hasMany(Comments::class);
    }

    public function likes() : HasMany {
        return $this->hasMany(Like::class);
    }

    public function likesCount(){

        return $this->likes()->where('liked', 1)->count();
        
    }

    public function dislikesCount(){

        return $this->likes()->where('disliked', 1)->count();
        
    }

    public function replyCount() {
        return $this->comments()->count();
    }

}
