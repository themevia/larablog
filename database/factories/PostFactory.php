<?php

namespace Database\Factories;

use App\Models\Post;
use Illuminate\Database\Eloquent\Factories\Factory;

class PostFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Post::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'slug' => 'first-version-of-larablog',
            'title' => 'First version of Larablog',
            'author_id' => 1,
            'category_id' => 1,
            'content' => '<p class="text-gray-600">The first blog written in the green world with this larablog</p>',
            'cover_photo' => 'larablog.svg',
            'tags' => '',
            'comments' => false,
            'status' => 'published'
        ];
    }
}
