<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\VehicleCategory;

class VehicleCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        VehicleCategory::insert([
            ['name' => "Hatche", "description" => "Um hatchback é um carro com uma porta traseira que se abre para cima, oferecendo acesso ao compartimento de carga. Geralmente, esses carros têm dois ou quatro portas laterais e uma porta traseira."],
            ['name' => "Sedan", "description" => "Sedans são carros com uma configuração de três volumes: motor, cabine de passageiros e porta-malas. Normalmente, eles têm quatro portas."],
            ['name' => "SUV", "description" => "SUVs são veículos utilitários esportivos que combinam elementos de carros de passeio com características de off-road, como maior altura do solo e capacidade de tração nas quatro rodas."],
            ['name' => "Pickup", "description" => "Pickups são veículos com uma cabine fechada e uma caçamba traseira aberta para carga. Elas podem ter cabines de diferentes tamanhos (simples, estendida, dupla)."]
        ]);
    }
}
