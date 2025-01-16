<?php

namespace App\Http\Controllers;

use App\Models\PublicCar;
use App\Models\Car;
use Illuminate\Http\Request;

class PublicCarController extends Controller
{
    // Show the list of public cars and the user's current cars
    public function index()
    {
        $publicCars = PublicCar::all();
        $userCars = Car::where('user_id', auth()->id())->get(); // Get user's cars

        return view('public_cars.index', compact('publicCars', 'userCars'));
    }

    // Add a public car to the authenticated user's collection
    public function addToMyCars($id)
    {
        // Check if the user is authenticated
        $userId = auth()->id();
        if (is_null($userId)) {
            return redirect()->route('login')->withErrors(['error' => 'You need to log in to add cars.']);
        }

        $publicCar = PublicCar::findOrFail($id);

        // Check if the car already exists for the user
        $carExists = Car::where('user_id', $userId)
            ->where('make', $publicCar->make)
            ->where('model', $publicCar->model)
            ->where('year', $publicCar->year)
            ->exists();

        if ($carExists) {
            return redirect()->back()->with('error', 'You have already added this car to your collection.');
        }

        // Create the car for the authenticated user
        Car::create([
            'user_id' => $userId,
            'make' => $publicCar->make,
            'model' => $publicCar->model,
            'year' => $publicCar->year,
            'color' => $publicCar->color,
            'transmission' => $publicCar->transmission,
            'mileage' => $publicCar->mileage,
            'fuel_type' => $publicCar->fuel_type,
            'body_type' => $publicCar->body_type,
            'price' => $publicCar->price,
            'image' => $publicCar->image,
        ]);

        return redirect()->route('public-cars.index')->with('success', 'Car added to your collection!');
    }
}
