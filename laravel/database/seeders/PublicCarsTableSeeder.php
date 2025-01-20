<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\PublicCar;
use Illuminate\Support\Facades\Schema;

class PublicCarsTableSeeder extends Seeder
{
    public function run()
    {
        Schema::disableForeignKeyConstraints();
        PublicCar::truncate();
        Schema::enableForeignKeyConstraints();

        $carImages = [
            'uploads/cars/car_1.jpg',
            'uploads/cars/car_2.jpg',
            'uploads/cars/car_3.jpeg',
            'uploads/cars/car_4.jpeg'
        ];

        $makes = ['BMW', 'Mercedes', 'Audi', 'Volkswagen', 'Toyota', 'Honda', 'Ford', 'Opel'];
        $models = [
            'BMW' => ['3 Serie', '5 Serie', 'X3', 'X5'],
            'Mercedes' => ['C-Klasse', 'E-Klasse', 'GLC', 'A-Klasse'],
            'Audi' => ['A3', 'A4', 'Q3', 'Q5'],
            'Volkswagen' => ['Golf', 'Polo', 'Passat', 'Tiguan'],
            'Toyota' => ['Corolla', 'RAV4', 'Yaris', 'Camry'],
            'Honda' => ['Civic', 'CR-V', 'Jazz', 'HR-V'],
            'Ford' => ['Focus', 'Fiesta', 'Kuga', 'Puma'],
            'Opel' => ['Astra', 'Corsa', 'Mokka', 'Crossland']
        ];

        $colors = ['Zwart', 'Wit', 'Grijs', 'Blauw', 'Rood', 'Zilver'];
        $transmissions = ['automatic', 'manual'];
        $fuelTypes = ['benzine', 'diesel', 'elektrisch', 'hybride'];
        $bodyTypes = ['hatchback', 'sedan', 'stationwagon', 'suv', 'coupe'];

        // Create 75 public cars
        for ($i = 0; $i < 75; $i++) {
            $make = $makes[array_rand($makes)];
            $model = $models[$make][array_rand($models[$make])];
            
            PublicCar::create([
                'make' => $make,
                'model' => $model,
                'year' => rand(2015, 2024),
                'color' => $colors[array_rand($colors)],
                'transmission' => $transmissions[array_rand($transmissions)],
                'mileage' => rand(0, 150000),
                'fuel_type' => $fuelTypes[array_rand($fuelTypes)],
                'body_type' => $bodyTypes[array_rand($bodyTypes)],
                'price' => rand(15000, 50000),
                'image' => $carImages[array_rand($carImages)]
            ]);
        }
    }
}