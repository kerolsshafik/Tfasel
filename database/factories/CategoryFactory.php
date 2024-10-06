<?php

namespace Database\Factories;

use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Category>
 */
class CategoryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = Category::class; // Define the associated model

    public function definition()
    {
        $name_en = $this->faker->word();
        return [
            'name_ar' => $this->faker->word(),    // Arabic name
            'name_en' => $name_en,       // English name
            'slug' => \Illuminate\Support\Str::slug($name_en), // Slug
        ];
    }
}
