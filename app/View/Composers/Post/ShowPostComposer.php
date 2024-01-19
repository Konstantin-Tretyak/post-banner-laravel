<?php

declare(strict_types=1);

namespace App\View\Composers\Post;

use App\Models\Post;
use App\Services\Post\Post\GetPostBannerHtmlTextService;
use App\Services\Post\Post\PostProcessor;
use Illuminate\View\View;

class ShowPostComposer
{
    public function __construct(
        private PostProcessor $postProcessor,
    )
    {}

    public function compose(View $view): void
    {
        $post = $view->getData()['post'] ?? null;
        if ($post instanceof Post) {
            $view->with([
                'postName' => $post->name,
                'postText' => $this->postProcessor->execute($post),
            ]);
        }
    }
}
