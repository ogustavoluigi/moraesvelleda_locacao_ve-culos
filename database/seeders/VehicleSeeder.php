<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Vehicle;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\File;

class VehicleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $fakeFileName = fake()->unique()->word . '.png';
        Storage::putFileAs('public', new File(base_path('tests/images/hatche.png')), "uploads/" . $fakeFileName);

        Vehicle::create(
            [
                "model" => "Polo",
                "description" => "Volkswagen Polo",
                "plate" => "MCN1240",
                "brand" => "Volkswagen",
                "photo"  => "uploads/" . $fakeFileName,
                'rental_cost' => 100,
                'category_id' => 1,
                "year" => 2020
            ]
        );
    }
}
