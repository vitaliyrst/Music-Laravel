<?php

namespace Database\Factories\Music;

use App\Models\Music\Group;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class GroupFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Group::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $title = $this->faker->word . ' ' . $this->faker->name;
        $cover3 = $this->faker->image('public/storage/group', 100, 100);
        return [
            'title' => $title,
            'description' => $this->faker->sentence(200),
            'cover' => Str::substr($cover3, 6),
            'slug' => Str::slug($title),
            'created_user_id' => $this->faker->numberBetween(1, 10),
        ];
    }
}
