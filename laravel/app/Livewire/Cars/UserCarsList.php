<?php

namespace App\Livewire\Cars;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Car;

class UserCarsList extends Component
{
    use WithPagination;

    public function render()
    {
        return view('livewire.cars.user-cars-list', [
            'cars' => Car::where('user_id', auth()->id())
                        ->orderBy('created_at', 'desc')
                        ->paginate(12)
        ]);
    }
}
