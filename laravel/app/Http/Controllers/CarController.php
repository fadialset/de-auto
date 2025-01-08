<?php

namespace App\Http\Controllers;
use App\Models\Car;

use Illuminate\Http\Request;

class CarController extends Controller

    {
        public function index()
        {
            $cars = Car::all(); // Fetch all cars
            return view('cars.index', compact('cars'));  // Make sure you have an index view
        }
    
        public function create()
        {
            return view('cars.create');  // Make sure you have a create view
        }
    
        public function store(Request $request)
        {
            $validatedData = $request->validate([
                'make' => 'required',
                'model' => 'required',
                'year' => 'required'
            ]);
    
            $car = new Car($validatedData);
            $car->user_id = auth()->id();
            $car->save();
    
            return redirect()->route('cars.index')->with('success', 'Car added successfully');
        }
    
        public function show($id)
        {
            $car = Car::findOrFail($id);
            return view('cars.show', compact('car'));  // Make sure you have a show view
        }
    
        public function edit($id)
        {
            $car = Car::findOrFail($id);
            return view('cars.edit', compact('car'));  // Make sure you have an edit view
        }
    
        public function update(Request $request, $id)
        {
            $validatedData = $request->validate([
                'make' => 'required',
                'model' => 'required',
                'year' => 'required'

            ]);
    
            $car = Car::findOrFail($id);
            $car->update($validatedData);
    
            return redirect()->route('cars.index')->with('success', 'Car updated successfully');
        }
    
        public function destroy($id)
        {
            $car = Car::findOrFail($id);
            $car->delete();
    
            return redirect()->route('cars.index')->with('success', 'Car deleted successfully');
        }

}   
