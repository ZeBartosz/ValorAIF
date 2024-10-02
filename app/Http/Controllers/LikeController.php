<?php

namespace App\Http\Controllers;

use App\Models\Like;
use App\Http\Controllers\Controller;
use App\Models\posts;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class LikeController extends Controller
{
    

    public function like(Request $request, posts $post) {

        $user = Auth::user();
        $post = Posts::find($request->posts);
        $data = $post->likes()->where('posts_id', $post->id)->where('user_id', $user->id)->first();

        if($data == null) {
            $post->likes()->create([
                'user_id' => $user->id,
                'liked' => True
            ]);
        } else {
            if ($data->liked === 1){
                if ($data->disliked === 0){
                    $this->destroy($data->id);
                }
            } else {
                $post->likes()->where('id', $data->id)->update([
                    'liked' => True,
                    'disliked' => False 
                ]);
            }
            
        }

        return back();
    }


    public function dislike(Request $request, posts $post) {

        $user = Auth::user();
        $post = Posts::find($request->posts);
        $data = $post->likes()->where('posts_id', $post->id)->where('user_id', $user->id)->first();
    
        if($data == null) {
            $post->likes()->create([
                'user_id' => $user->id,
                'disliked' => True
            ]);
        } else {
            if ($data->disliked === 1){
                if ($data->liked === 0){
                    $this->destroy($data->id);
                }
            } else {
                $post->likes()->where('id', $data->id)->update([
                        'liked' => False,
                        'disliked' => True 
                    ]);
            }
            
        }

        return back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Int $like)
    {
        return Like::destroy($like);
    }
}
