<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Car;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function dashboard()
    {
        // Get all users except the current admin
        $users = User::where('role', 'user')->get();
        
        // Get all cars
        $cars = Car::with('user')->get();
        
        // Get counts for statistics
        $totalUsers = $users->count();
        $totalCars = $cars->count();
        
        return view('admin.dashboard', compact('users', 'cars', 'totalUsers', 'totalCars'));
    }
    public function editUser(User $user)
{
    return view('admin.users.edit', compact('user'));
}

public function updateUser(Request $request, User $user)
{
    try {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $user->id,
            'role' => 'required|in:admin,user',
        ]);

        $user->update($validated);
        return redirect()->route('dashboard')
            ->with('success', 'Gebruiker is succesvol bijgewerkt.');
    } catch (\Exception $e) {
        return redirect()->back()
            ->with('error', 'Er is een fout opgetreden bij het bijwerken van de gebruiker.')
            ->withInput();
    }
}

public function destroyUser(User $user)
{
    try {
        if ($user->id === auth()->id()) {
            return redirect()->back()
                ->with('error', 'Je kunt je eigen account niet verwijderen.');
        }

        $user->delete();
        return redirect()->route('dashboard')
            ->with('success', 'Gebruiker is succesvol verwijderd.');
    } catch (\Exception $e) {
        return redirect()->back()
            ->with('error', 'Er is een fout opgetreden bij het verwijderen van de gebruiker.');
    }
}
}