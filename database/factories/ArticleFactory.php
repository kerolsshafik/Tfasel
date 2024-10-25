<?php

namespace Database\Factories;

use App\Models\User;
use App\Models\Article;
use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Article>
 */
class ArticleFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = Article::class;

    public function definition()
    {
        $title_en = $this->faker->sentence(); // Generates a random sentence for English title
        $title_ar = $this->faker->sentence(); // Generates a random sentence for Arabic title

        return [
            'title_en' => $title_en,              // English title
            'title_ar' => $title_ar,
            'description_en' => $this->faker->paragraph(),
            'description_ar' => $this->faker->paragraph(),          // Arabic title
            'content_en' => $this->faker->paragraph(), // English content
            'content_ar' => $this->faker->paragraph(),
            'count' => $this->faker->numberBetween(20, 500), // Arabic content
            'slug' => Str::slug($title_en),       // Generates a slug from the English title
            'user_id' => User::whereIn('status', ['admin', 'writer'])->inRandomOrder()->first()?->id, // Gets the ID of a random matched user
            'category_id' => Category::inRandomOrder()->first()?->id,
        ];
    }
}
