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
        $validated = $request->validate([
            'make' => 'required|string|max:255',
            'model' => 'required|string|max:255', 
            'year' => 'required|integer|min:1900|max:' . (date('Y') + 1),
            'color' => 'required|string|max:255',
            'transmission' => 'required|in:automatic,manual',
            'fuel_type' => 'required|string|max:255',
            'mileage' => 'required|integer|min:0',
            'price' => 'required|numeric|min:0',
            'body_type' => 'required|string|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048'
        ], [
            'make.required' => 'Het merk is verplicht.',
            'make.string' => 'Het merk moet een tekst zijn.',
            'make.max' => 'Het merk mag niet langer zijn dan 255 tekens.',
            'model.required' => 'Het model is verplicht.',
            'model.string' => 'Het model moet een tekst zijn.',
            'model.max' => 'Het model mag niet langer zijn dan 255 tekens.',
            'year.required' => 'Het jaar is verplicht.',
            'year.integer' => 'Het jaar moet een geldig getal zijn.',
            'year.min' => 'Het jaar moet na 1900 zijn.',
            'year.max' => 'Het jaar kan niet in de toekomst liggen.',
            'color.required' => 'De kleur is verplicht.',
            'color.string' => 'De kleur moet een tekst zijn.',
            'color.max' => 'De kleur mag niet langer zijn dan 255 tekens.',
            'transmission.required' => 'Het type transmissie is verplicht.',
            'transmission.in' => 'De transmissie moet automatisch of handmatig zijn.',
            'fuel_type.required' => 'Het type brandstof is verplicht.',
            'fuel_type.string' => 'Het type brandstof moet een tekst zijn.',
            'fuel_type.max' => 'Het type brandstof mag niet langer zijn dan 255 tekens.',
            'mileage.required' => 'De kilometerstand is verplicht.',
            'mileage.integer' => 'De kilometerstand moet een geldig getal zijn.',
            'mileage.min' => 'De kilometerstand kan niet negatief zijn.',
            'price.required' => 'De prijs is verplicht.',
            'price.numeric' => 'De prijs moet een geldig bedrag zijn.',
            'price.min' => 'De prijs kan niet negatief zijn.',
            'body_type.required' => 'Het type carrosserie is verplicht.',
            'body_type.string' => 'Het type carrosserie moet een tekst zijn.',
            'body_type.max' => 'Het type carrosserie mag niet langer zijn dan 255 tekens.',
            'image.image' => 'Het bestand moet een afbeelding zijn.',
            'image.mimes' => 'De afbeelding moet van het type jpeg, png, jpg of webp zijn.',
            'image.max' => 'De afbeelding mag niet groter zijn dan 2MB.'
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
        return redirect()->route('cars.index')->with('success', 'Auto succesvol toegevoegd.');
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
        $validated = $request->validate([
            'make' => 'required|string|max:255',
            'model' => 'required|string|max:255',
            'year' => 'required|integer|min:1900|max:' . (date('Y') + 1),
            'color' => 'required|string|max:255',
            'transmission' => 'required|in:automatic,manual',
            'fuel_type' => 'required|string|max:255',
            'mileage' => 'required|integer|min:0',
            'price' => 'required|numeric|min:0',
            'body_type' => 'required|string|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048'
        ], [
            'make.required' => 'Het merk is verplicht.',
            'make.string' => 'Het merk moet een tekst zijn.',
            'make.max' => 'Het merk mag niet langer zijn dan 255 tekens.',
            'model.required' => 'Het model is verplicht.',
            'model.string' => 'Het model moet een tekst zijn.',
            'model.max' => 'Het model mag niet langer zijn dan 255 tekens.',
            'year.required' => 'Het jaar is verplicht.',
            'year.integer' => 'Het jaar moet een geldig getal zijn.',
            'year.min' => 'Het jaar moet na 1900 zijn.',
            'year.max' => 'Het jaar kan niet in de toekomst liggen.',
            'color.required' => 'De kleur is verplicht.',
            'color.string' => 'De kleur moet een tekst zijn.',
            'color.max' => 'De kleur mag niet langer zijn dan 255 tekens.',
            'transmission.required' => 'Het type transmissie is verplicht.',
            'transmission.in' => 'De transmissie moet automatisch of handmatig zijn.',
            'fuel_type.required' => 'Het type brandstof is verplicht.',
            'fuel_type.string' => 'Het type brandstof moet een tekst zijn.',
            'fuel_type.max' => 'Het type brandstof mag niet langer zijn dan 255 tekens.',
            'mileage.required' => 'De kilometerstand is verplicht.',
            'mileage.integer' => 'De kilometerstand moet een geldig getal zijn.',
            'mileage.min' => 'De kilometerstand kan niet negatief zijn.',
            'price.required' => 'De prijs is verplicht.',
            'price.numeric' => 'De prijs moet een geldig bedrag zijn.',
            'price.min' => 'De prijs kan niet negatief zijn.',
            'body_type.required' => 'Het type carrosserie is verplicht.',
            'body_type.string' => 'Het type carrosserie moet een tekst zijn.',
            'body_type.max' => 'Het type carrosserie mag niet langer zijn dan 255 tekens.',
            'image.image' => 'Het bestand moet een afbeelding zijn.',
            'image.mimes' => 'De afbeelding moet van het type jpeg, png, jpg of webp zijn.',
            'image.max' => 'De afbeelding mag niet groter zijn dan 2MB.'
        ]);

        $car = Car::findOrFail($id);
        $data = $request->except('image');

        if ($request->hasFile('image')) {
            if ($car->image && File::exists(storage_path('app/public/' . $car->image))) {
                File::delete(storage_path('app/public/' . $car->image));
            }
            $file = $request->file('image');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $path = $file->storeAs('uploads/cars', $filename, 'public');
            $data['image'] = $path;
        }

        $car->update($data);
        return redirect()->route('cars.index')->with('success', 'Auto succesvol bijgewerkt.');
    }

    public function destroy($id)
    {
        $car = Car::findOrFail($id);
        if ($car->image && File::exists(storage_path('app/public/' . $car->image))) {
            File::delete(storage_path('app/public/' . $car->image));
        }
        $car->delete();
        return redirect()->route('cars.index')->with('success', 'Auto succesvol verwijderd.');
    }
}
