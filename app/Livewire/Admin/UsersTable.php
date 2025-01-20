<?php

namespace App\Livewire\Admin;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\User;

class UsersTable extends Component
{
    use WithPagination;
    
    public $search = ''; // Property to store search term
    
    // Reset pagination when search changes
    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function render()
    {
        return view('livewire.admin.users-table', [
            'users' => User::where('role', 'user')
                          ->where(function($query) {
                              $query->where('name', 'like', '%' . $this->search . '%')
                                   ->orWhere('email', 'like', '%' . $this->search . '%');
                          })
                          ->paginate(10)
        ]);
    }
}

