<?php

namespace App\Factories;

use App\Contracts\Components\BannerComponentInterface;
use App\Contracts\Models\BannerDataInterface;
use App\View\Components\Banner\DefaultBannerComponent;
use InvalidArgumentException;

class BannerComponentFactory
{
    public static function create(BannerDataInterface $bannerData, string $type = 'default'): BannerComponentInterface
    {
        return match ($type) {
            'default' => DefaultBannerComponent::make($bannerData),
            default => throw new InvalidArgumentException("Invalid BannerComponent type: $type"),
        };
    }
}
