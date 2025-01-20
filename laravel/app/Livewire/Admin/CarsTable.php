<?php

namespace App\Livewire\Admin;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Car;

class CarsTable extends Component
{
    use WithPagination;

    public $search = '';

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function render()
    {
        return view('livewire.admin.cars-table', [
            'cars' => Car::with('user')
                        ->where(function($query) {
                            $query->where('make', 'like', '%' . $this->search . '%')
                                 ->orWhere('model', 'like', '%' . $this->search . '%')
                                 ->orWhere('year', 'like', '%' . $this->search . '%')
                                 ->orWhereHas('user', function($q) {
                                     $q->where('name', 'like', '%' . $this->search . '%');
                                 });
                        })
                        ->paginate(10)
        ]);
    }
}
