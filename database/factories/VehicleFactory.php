<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\VehicleCategory;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\File;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Vehicle>
 */
class VehicleFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $vehicleCategory = VehicleCategory::inRandomOrder()->first();

        $fakeFileName = $this->faker->unique()->word . '.png';

        Storage::putFileAs('public', new File(base_path('tests/images/' . strtolower($vehicleCategory->name) . '.png')), "uploads/" . $fakeFileName);

        return [
            'plate' => fake()->randomLetter() . fake()->randomLetter() . fake()->randomLetter()  . fake()->randomNumber(4),
            'model' => "Modelo",
            'brand' => fake()->randomElement(["Toyota", "Honda", "Mercedes-Benz", "Volkswagen", "Fiat", "Renault"]),
            'description' => fake()->sentence(),
            'photo' => "uploads/" . $fakeFileName,
            'rental_cost' => fake()->randomFloat(2, 0, 10000),
            'category_id' => $vehicleCategory->id,
            'year' => fake()->year(),
        ];
    }
}
