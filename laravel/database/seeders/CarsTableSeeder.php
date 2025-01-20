<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Car;
use App\Models\User;

class CarsTableSeeder extends Seeder
{
    public function run()
    {
        $users = User::where('role', 'user')->get();
        
        // Available car images
        $carImages = [
            'uploads/cars/car_1.jpg',
            'uploads/cars/car_2.jpg',
            'uploads/cars/car_3.jpeg',
            'uploads/cars/car_4.jpeg',
            'uploads/cars/1736957326.jpg',
            'uploads/cars/1736959762.webp'
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
            'Opel' => ['Astra', 'Corsa', 'Mokka', 'Crossland'],
        ];
        $colors = ['Zwart', 'Wit', 'Grijs', 'Blauw', 'Rood', 'Zilver'];
        $transmissions = ['automatic', 'manual'];
        $fuelTypes = ['benzine', 'diesel', 'elektrisch', 'hybride', 'lpg'];
        $bodyTypes = ['hatchback', 'sedan', 'stationwagon', 'suv', 'coupe', 'cabriolet', 'mpv'];

        // Create 50 cars
        for ($i = 0; $i < 50; $i++) {
            $make = $makes[array_rand($makes)];
            $model = $models[$make][array_rand($models[$make])];
            
            Car::create([
                'user_id' => $users->random()->id, // Randomly assign to users
                'make' => $make,
                'model' => $model,
                'year' => rand(2010, 2023),
                'color' => $colors[array_rand($colors)],
                'transmission' => $transmissions[array_rand($transmissions)],
                'fuel_type' => $fuelTypes[array_rand($fuelTypes)],
                'mileage' => rand(10000, 200000),
                'price' => rand(5000, 50000),
                'body_type' => $bodyTypes[array_rand($bodyTypes)],
                'image' => $carImages[array_rand($carImages)], // Randomly select from existing images
            ]);
        }
    }
}