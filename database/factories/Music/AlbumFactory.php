<?php

namespace Database\Factories\Music;

use App\Models\Music\Album;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class AlbumFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Album::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $title = $this->faker->word . ' ' . $this->faker->word;
        $cover2 = $this->faker->image('public/storage/album', 300,300);
        return [
            'title' => $title,
            'description' => $this->faker->sentence(100),
            'cover' => Str::substr($cover2, 6),
            'release_date' => $this->faker->date('Y-m-d'),
            'label' => $this->faker->word,
            'group_id' => $this->faker->numberBetween(1, 10),
            'created_user_id' => $this->faker->numberBetween(1, 10),
            'slug' => Str::slug($title),
        ];
    }
}
