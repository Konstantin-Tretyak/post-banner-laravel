<?php

namespace Database\Factories;

use App\Models\Banner;
use Illuminate\Database\Eloquent\Factories\Factory;

class BannerFactory extends Factory
{
    protected $model = Banner::class;

    public function definition(): array
    {
        return [
            'name' => $this->faker->word,
            'text' => $this->faker->sentence,
            'url' => $this->faker->url,
            'status' => $this->faker->word,
        ];
    }
}
