<?php

namespace App\Http\Controllers;

use App\Models\PublicCar;
use App\Models\Car;
use Illuminate\Http\Request;

class PublicCarController extends Controller
{
    public function index()
    {
        $publicCars = PublicCar::all();
    $userCars = Car::where('user_id', auth()->id())->get(); // Get user's cars
    return view('public_cars.index', compact('publicCars', 'userCars'));
    }

    public function addToUserCollection($id)
    {
        $publicCar = PublicCar::findOrFail($id);

        Car::create([
            'user_id' => auth()->id(),
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

        return redirect()->route('public_cars.index')->with('success', 'Car added to your collection!');
    }
    public function addToMyCars($id)
    {
        $publicCar = PublicCar::findOrFail($id);

        // Create a new car record for the logged-in user
        Car::create([
            'user_id' => auth()->id(),
            'id' => $publicCar->id,
            'make' => $publicCar->make,
            'model' => $publicCar->model,
            'year' => $publicCar->year,
            'color' => $publicCar->color,
            'transmission' => $publicCar->transmission,
            'mileage' => $publicCar->mileage,
            'fuel_type' => $publicCar->fuel_type,
            'body_type' => $publicCar->body_type,
            'price' => $publicCar->price,
            'image' => $publicCar->image, // Assuming the image path is reused
        ]);

        return redirect()->back()->with('success', 'Car added to your collection!');
    }
}
