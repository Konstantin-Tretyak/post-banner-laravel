<?php

namespace App\Contracts\Models;

interface BannerDataInterface
{
    public function getStatus(): string;
    public function getText(): string;
    public function getName(): string;
    public function getUrl(): string;
}
