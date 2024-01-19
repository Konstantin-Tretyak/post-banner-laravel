<?php

namespace App\Services\Post\Post;

use App\Factories\BannerComponentFactory;
use App\Models\Post;

class PostProcessor
{
    public function __construct(
        private PostTextManipulator $postTextManipulator,
    )
    {}

    public function execute(Post $post, string $bannerType = 'default'): string
    {
        $text = $post->text;
        $banners = $post->banners;

        $firstBanner = $banners->offsetGet(0);
        if ($firstBanner) {
            $text = $this->postTextManipulator->insertBannerAfterFirstParagraph(
                $text,
                BannerComponentFactory::create($firstBanner, $bannerType)
            );
        }

        $secondBanner = $banners->offsetGet(1);
        if ($secondBanner) {
            $text = $this->postTextManipulator->insertBannerBeforeLastParagraph(
                $text,
                BannerComponentFactory::create($secondBanner, $bannerType)
            );
        }

        return $text;
    }
}
