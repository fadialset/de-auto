<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Car;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AdminController extends Controller
{
    public function dashboard()
    {
        $totalUsers = User::where('role', 'user')->count();
        $totalCars = Car::count();
        
        return view('admin.dashboard', compact( 'totalUsers', 'totalCars'));
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

public function destroyCar($id)
{
    try {
        $car = Car::findOrFail($id);
        
        // Delete the car's image if it exists
        if ($car->image && Storage::disk('public')->exists($car->image)) {
            Storage::disk('public')->delete($car->image);
        }
        
        $car->delete();
        
        return redirect()->back()
            ->with('success', 'Auto is succesvol verwijderd.');
    } catch (\Exception $e) {
        return redirect()->back()
            ->with('error', 'Er is een fout opgetreden bij het verwijderen van de auto.');
    }
}
}