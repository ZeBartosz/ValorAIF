<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\posts;
use App\Models\Comments;
use App\Models\Like;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Create roles
        $userRole = Role::create(['name' => 'user']);
        $adminRole = Role::create(['name' => 'admin']);

        // Create an admin user
        $admin = User::factory()->create([
            'username' => 'admin',
            'email' => 'admin@example.com',
            'password' => '123',
            'isAdmin' => true,
        ]);
        $admin->assignRole($adminRole);

        // Create regular users
        $users = User::factory(10)->create();
        foreach ($users as $user) {
            $user->assignRole($userRole);
        }

        // Create posts for each user
        $users->each(function ($user) {
            $posts = posts::factory(5)->create(['user_id' => $user->id]);

            // Create comments and likes for each post
            $posts->each(function ($post) use ($user) {
                // Create comments
                $comments = Comments::factory(3)->create(['posts_id' => $post->id, 'user_id' => $user->id]);

                // Create likes
                Like::factory(5)->create(['posts_id' => $post->id, 'user_id' => $user->id]);

                // Create likes for comments
                $comments->each(function ($comment) use ($user) {
                    \App\Models\CommentLikes::factory(3)->create([
                        'comments_id' => $comment->id,
                        'user_id' => $user->id,
                    ]);
                });
            });
        });
    }
}
