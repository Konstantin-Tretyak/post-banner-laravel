<?php

namespace Database\Seeders;

use App\Models\Banner;
use App\Models\Card;
use App\Models\Post;
use Illuminate\Database\Seeder;

class BannerSeeder extends Seeder
{
    public function run(): void
    {
        $banners = Banner::factory(5)->create();
        Post::inRandomOrder()->take(5)->get()->each(function ($post) use ($banners) {
            $post->banners()->attach($banners->random());
        });
        Card::inRandomOrder()->take(5)->get()->each(function ($card) use ($banners) {
            $card->banners()->attach($banners->random());
        });
    }
}
