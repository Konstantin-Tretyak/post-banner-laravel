<?php

namespace Database\Factories;

use App\Models\Post;
use Illuminate\Database\Eloquent\Factories\Factory;

class PostFactory extends Factory
{
    protected $model = Post::class;

    public function definition(): array
    {
        $htmlText = $this->generateFakeHtmlText();

        return [
            'name' => $this->faker->sentence,
            'text' => $htmlText,
            'status' => $this->faker->word,
        ];
    }

    private function generateFakeHtmlText(): string
    {
        $paragraphs = [];
        $otherElements = [];
        for ($i = 0; $i < $this->faker->numberBetween(2, 5); $i++) {
            $paragraphs[] = '<p>' . $this->faker->paragraph . '</p>';
        }
        for ($i = 0; $i < $this->faker->numberBetween(10, 30); $i++) {
            $otherElements[] = $this->faker->randomHtml();
        }
        $htmlElements = array_merge($paragraphs, $otherElements);
        shuffle($htmlElements);

        return implode('', $htmlElements);
    }
}
