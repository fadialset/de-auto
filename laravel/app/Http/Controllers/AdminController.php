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
}