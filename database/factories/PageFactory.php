<?php

namespace Database\Factories;

use App\Models\Page;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class PageFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Page::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'content' => implode('<br/><br/>', $this->faker->paragraphs(8)),
            'description' => $this->faker->sentence(6),
            'title' => Str::title($this->faker->words(2, true))
        ];
    }
}
