<?php

declare(strict_types=1);

namespace App\Http\Controllers\Banners;

use App\Http\Controllers\Controller;
use App\Models\Banner;

class FetchBannersController extends Controller
{
    public function __construct() {}

    public function __invoke()
    {
        $banners = Banner::with('posts', 'cards')
            ->orderBy('id')
            ->get()
        ;

        return response()->json(['banners' => $banners]);
    }
}
