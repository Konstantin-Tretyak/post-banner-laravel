<?php

namespace App\View\Components\Banner;

use App\Contracts\Components\BannerComponentInterface;
use App\Contracts\Models\BannerDataInterface;
use App\Models\Banner;

class DefaultBannerComponent implements BannerComponentInterface
{
    private function __construct(private BannerDataInterface $bannerData)
    {}

    public static function make(BannerDataInterface $bannerData): self
    {
        return new self($bannerData);
    }

    public function getTemplate(): string
    {
        return '<div><a href=\'%s\'><p>%s</p></a><p>%s</p></div>';
    }

    public function getHtml(): string
    {
        return sprintf(
            $this->getTemplate(),
            $this->bannerData->getUrl(),
            $this->bannerData->getName(),
            $this->bannerData->getText(),
        );
    }
}
