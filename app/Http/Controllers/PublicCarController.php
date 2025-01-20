<?php

namespace App\Http\Controllers;

use App\Models\PublicCar;
use App\Models\Car;
use Illuminate\Http\Request;

class PublicCarController extends Controller
{

    // Add a public car to the authenticated user's collection
    public function addToMyCars($id)
    {
        // Check if the user is authenticated
        if (!auth()->check()) {
            return redirect()->route('login')
                ->withErrors(['error' => 'Je moet ingelogd zijn om auto\'s toe te voegen.']);
        }

        $publicCar = PublicCar::findOrFail($id);

        // Check if the car already exists for the user
        $carExists = auth()->user()->cars()
            ->where('make', $publicCar->make)
            ->where('model', $publicCar->model)
            ->where('year', $publicCar->year)
            ->exists();

        if ($carExists) {
            return redirect()->route('dashboard')
                ->with('error', 'Je hebt deze auto al in je collectie.');
        }

        // Create new car for user
        $car = new Car([
            'make' => $publicCar->make,
            'model' => $publicCar->model,
            'year' => $publicCar->year,
            'color' => $publicCar->color,
            'transmission' => $publicCar->transmission,
            'mileage' => $publicCar->mileage,
            'fuel_type' => $publicCar->fuel_type,
            'body_type' => $publicCar->body_type,
            'price' => $publicCar->price,
            'image' => $publicCar->image
        ]);

        auth()->user()->cars()->save($car);

        return redirect()->route('dashboard')
            ->with('success', 'Auto is toegevoegd aan je collectie!');
    }
}
