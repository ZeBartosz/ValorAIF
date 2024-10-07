<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Facades\Auth;

class Comments extends Model
{
    use HasFactory;

    protected $fillable = [
        'body',
        'user_id',
        'posts_id',
        'parent_id'

    ];

    public function posts() : BelongsTo {
        return $this->belongsTo(Posts::class);
    }

    public function user() : BelongsTo {
        return $this->belongsTo(User::class);
    }

    public function replies()
    {
        return $this->hasMany(Comments::class, 'parent_id');
    }

    public function findUser (int $id) {
        return User::find($id);
    }

    public function sameUser (int $id) {
        $user = Auth::User()->id;

        if ($id === $user){
            return True;
        } else {
            return False;
        }

    }

}
