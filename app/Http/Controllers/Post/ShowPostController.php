<?php

declare(strict_types=1);

namespace App\Http\Controllers\Post;

use App\Http\Controllers\Controller;
use App\Services\Post\Post\GenerateFakePostService;

class ShowPostController extends Controller
{
    public function __construct(
        private GenerateFakePostService $generateFakePostService
    ) {}

    public function __invoke()
    {
        $post = $this->generateFakePostService->execute();

        return view('posts.show', compact('post'));
    }
}
