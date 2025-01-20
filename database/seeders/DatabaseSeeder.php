<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);

        // Create storage directory if it doesn't exist
        if (!File::exists(storage_path('app/public/uploads/cars'))) {
            File::makeDirectory(storage_path('app/public/uploads/cars'), 0755, true);
        }

        // Copy default images from resources to storage
        $defaultImages = ['car_1.jpg', 'car_2.jpg', 'car_3.jpeg', 'car_4.jpeg'];
        foreach ($defaultImages as $image) {
            if (File::exists(resource_path('images/cars/' . $image))) {
                File::copy(
                    resource_path('images/cars/' . $image),
                    storage_path('app/public/uploads/cars/' . $image)
                );
            }
        }

        $this->call([
            UsersTableSeeder::class,
            CarsTableSeeder::class,
            PublicCarsTableSeeder::class,
        ]);
    }
}
