<?php

namespace App\Livewire\PublicCars;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\PublicCar;
use App\Models\Car;

class PublicCarsList extends Component
{
    use WithPagination;

    public function render()
    {
        $userCars = auth()->check() ? Car::where('user_id', auth()->id())->get() : collect([]);
        
        return view('livewire.public-cars.public-cars-list', [
            'publicCars' => PublicCar::paginate(12),
            'userCars' => $userCars
        ]);
    }
}