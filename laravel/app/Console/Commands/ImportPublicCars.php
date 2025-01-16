<?php

namespace App\Console\Commands;

use App\Models\PublicCar;
use Illuminate\Console\Command;

class ImportPublicCars extends Command
{
    protected $signature = 'import:public-cars';
    protected $description = 'Import public cars from JSON file';

    public function handle()
    {
        $filePath = public_path('cars.json');
        $cars = json_decode(file_get_contents($filePath), true);

        foreach ($cars as $car) {
            PublicCar::create($car);
        }

        $this->info('Public cars imported successfully!');
    }
}
