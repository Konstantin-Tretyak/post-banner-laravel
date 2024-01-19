<?php

namespace App\Services\Post\Post;

use App\Contracts\Components\BannerComponentInterface;

class PostTextManipulator
{
    public function insertBannerAfterFirstParagraph(string $text, BannerComponentInterface $bannerComponent): string
    {
        return preg_replace('/<\/p>/', '</p>' . $bannerComponent->getHtml(), $text, 1);
    }

    public function insertBannerBeforeLastParagraph(string $text, BannerComponentInterface $bannerComponent): string
    {
        preg_match_all('/<p\b[^>]*>/', $text, $matches, PREG_OFFSET_CAPTURE);
        if (empty($matches[0])) {
            return $text;
        }
        $lastMatch = end($matches[0]);
        $lastMatchOffset = $lastMatch[1];
        $lastMatchValue = $lastMatch[0];

        return substr_replace(
            $text,
            $bannerComponent->getHtml() . $lastMatchValue,
            $lastMatchOffset,
            strlen($lastMatchValue)
        );
    }
}
