<?php

namespace App\Http\Controllers;

use App\Models\Car;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class CarController extends Controller
{
    public function index()
    {
        $cars = Car::all();
        return view('cars.index', compact('cars'));
    }

    public function create()
    {
        return view('cars.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'make' => 'required',
            'model' => 'required',
            'year' => 'required',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
        ]);

        $car = new Car($request->except('image'));
        $car->user_id = auth()->id();

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $path = $file->storeAs('uploads/cars', $filename, 'public');
            $car->image = $path;
        }

        $car->save();
        return redirect()->route('cars.index')->with('success', 'Car added successfully.');
    }

    public function show($id)
    {
        $car = Car::findOrFail($id);
        return view('cars.show', compact('car'));
    }

    public function edit($id)
    {
        $car = Car::findOrFail($id);
        return view('cars.edit', compact('car'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'make' => 'required',
            'model' => 'required',
            'year' => 'required',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
        ]);

        $car = Car::findOrFail($id);
        $data = $request->except('image');

        if ($request->hasFile('image')) {
            // Delete the old image if exists
            if ($car->image && File::exists(storage_path('app/public/' . $car->image))) {
                File::delete(storage_path('app/public/' . $car->image));
            }
            $file = $request->file('image');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $path = $file->storeAs('uploads/cars', $filename, 'public');
            $data['image'] = $path;
        }

        $car->update($data);
        return redirect()->route('cars.index')->with('success', 'Car updated successfully.');
    }

    public function destroy($id)
    {
        $car = Car::findOrFail($id);
        if ($car->image && File::exists(storage_path('app/public/' . $car->image))) {
            File::delete(storage_path('app/public/' . $car->image));
        }
        $car->delete();
        return redirect()->route('cars.index')->with('success', 'Car deleted successfully.');
    }
}
