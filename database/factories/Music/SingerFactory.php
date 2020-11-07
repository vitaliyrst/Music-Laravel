<?php

namespace Database\Factories\Music;

use App\Models\Music\Singer;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class SingerFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Singer::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $name = $this->faker->name . ' ' . $this->faker->lastName;
        $cover1 = $this->faker->image('public/storage/singer', 100, 100);
        return [
            'name' => $name,
            'position' =>  $this->faker->randomElement(),
            'description' => $this->faker->sentence(100),
            'cover' => Str::substr($cover1, 6),
            'group_id' => $this->faker->numberBetween(1, 10),
            'created_user_id' => $this->faker->numberBetween(1, 10),
            'slug' => Str::slug($name),
        ];
    }
}
