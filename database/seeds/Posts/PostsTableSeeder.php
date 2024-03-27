<?php

use App\Models\Auth\User;
use App\Models\Post;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Seeder;

class PostsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        if (! \App::environment(['production'])) {
            Model::unguard();

            factory(Post::class, 10)->create([
                'created_by' => factory(User::class)->state('active')->create()->id,
            ]);

            Model::reguard();
        }
    }
}
