<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Car;
use App\Models\User;

class CarsTableSeeder extends Seeder
{
    public function run()
    {
        // Clear existing cars
        Car::truncate();

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
        $transmissions = ['Automatisch', 'Handgeschakeld'];
        $fuelTypes = ['Benzine', 'Diesel', 'Elektrisch', 'Hybride'];
        $bodyTypes = ['Hatchback', 'Sedan', 'Stationwagon', 'SUV', 'Coupe'];
        
        $carImages = [
            'uploads/cars/car_1.jpg',
            'uploads/cars/car_2.jpg',
            'uploads/cars/car_3.jpeg',
            'uploads/cars/car_4.jpeg'
        ];

        // Get all users except admin
        $users = User::where('role', 'user')->get();

        foreach ($users as $user) {
            // Create 20 cars for each user
            for ($i = 0; $i < 20; $i++) {
                $make = $makes[array_rand($makes)];
                $model = $models[$make][array_rand($models[$make])];
                
                Car::create([
                    'user_id' => $user->id,
                    'make' => $make,
                    'model' => $model,
                    'year' => rand(2015, 2024),
                    'color' => $colors[array_rand($colors)],
                    'transmission' => $transmissions[array_rand($transmissions)],
                    'mileage' => rand(0, 150000),
                    'fuel_type' => $fuelTypes[array_rand($fuelTypes)],
                    'body_type' => $bodyTypes[array_rand($bodyTypes)],
                    'price' => rand(5000, 50000),
                    'image' => $carImages[array_rand($carImages)]
                ]);
            }
        }
    }
}