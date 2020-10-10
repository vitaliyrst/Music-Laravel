<?php

namespace Database\Factories\Music;

use App\Models\Music\Song;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class SongFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Song::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $title = $this->faker->word . ' ' . $this->faker->word;
        return [
            'title' => $title,
            'duration' => $this->faker->time('i:s', 200),
            'song_number' => $this->faker->numberBetween(1, 12),
            'album_id' => $this->faker->numberBetween(1, 100),
            'created_user_id' => $this->faker->numberBetween(1, 10),
            'slug' => Str::slug($title),
        ];
    }
}
