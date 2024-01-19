<?php

namespace App\Contracts\Components;

use App\Contracts\Models\BannerDataInterface;

interface BannerComponentInterface
{
    public function getTemplate(): string;
    public function getHtml(): string;
    public static function make(BannerDataInterface $bannerData): self;
}
