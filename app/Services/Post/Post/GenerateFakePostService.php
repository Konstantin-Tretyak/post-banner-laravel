<?php

namespace App\Services\Post\Post;

use App\Models\Banner;
use App\Models\Post;

class GenerateFakePostService
{
    public function execute(): Post
    {
        /** @var Post $post */
        $post = Post::factory()->create();
        $post->banners()->saveMany(Banner::factory(2)->create());

        return $post;
    }
}
