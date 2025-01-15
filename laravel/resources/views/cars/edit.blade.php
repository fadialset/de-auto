{{-- resources/views/cars/edit.blade.php --}}

@extends('layouts.app')

@section('content')
<div class="container mx-auto p-6">
    <h1 class="text-lg font-semibold">Edit Car</h1>
    <form action="{{ route('cars.update', $car->id) }}" method="POST" class="mt-6">
        @csrf
        @method('PUT')

        <div class="mb-4">
            <label for="make" class="block text-gray-700 text-sm font-bold mb-2">Make:</label>
            <input type="text" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="make" name="make" value="{{ old('make', $car->make) }}" required>
        </div>

        <div class="mb-4">
            <label for="model" class="block text-gray-700 text-sm font-bold mb-2">Model:</label>
            <input type="text" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="model" name="model" value="{{ old('model', $car->model) }}" required>
        </div>

        <div class="mb-4">
            <label for="year" class="block text-gray-700 text-sm font-bold mb-2">Year:</label>
            <input type="text" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="year" name="year" value="{{ old('year', $car->year) }}" required>
        </div>

        <div class="mb-4">
            <label for="color" class="block text-gray-700 text-sm font-bold mb-2">Color:</label>
            <input type="text" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="color" name="color" value="{{ old('color', $car->color) }}">
        </div>

        <div class="mb-4">
            <label for="transmission" class="block text-gray-700 text-sm font-bold mb-2">Transmission:</label>
            <select class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="transmission" name="transmission">
                <option value="automatic" {{ old('transmission', $car->transmission) == 'automatic' ? 'selected' : '' }}>Automatic</option>
                <option value="manual" {{ old('transmission', $car->transmission) == 'manual' ? 'selected' : '' }}>Manual</option>
            </select>
        </div>

        <div class="mb-4">
            <label for="mileage" class="block text-gray-700 text-sm font-bold mb-2">Mileage:</label>
            <input type="number" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="mileage" name="mileage" value="{{ old('mileage', $car->mileage) }}">
        </div>

        <div class="mb-4">
            <label for="fuel_type" class="block text-gray-700 text-sm font-bold mb-2">Fuel Type:</label>
            <select class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="fuel_type" name="fuel_type">
                <option value="">Select Fuel Type</option>
                <option value="petrol" {{ old('fuel_type', $car->fuel_type) == 'petrol' ? 'selected' : '' }}>Petrol</option>
                <option value="diesel" {{ old('fuel_type', $car->fuel_type) == 'diesel' ? 'selected' : '' }}>Diesel</option>
                <option value="electric" {{ old('fuel_type', $car->fuel_type) == 'electric' ? 'selected' : '' }}>Electric</option>
            </select>
        </div>

        <div class="mb-4">
            <label for="body_type" class="block text-gray-700 text-sm font-bold mb-2">Body Type:</label>
            <select class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="body_type" name="body_type">
                <option value="">Select Body Type</option>
                <option value="sedan" {{ old('body_type', $car->body_type) == 'sedan' ? 'selected' : '' }}>Sedan</option>
                <option value="suv" {{ old('body_type', $car->body_type) == 'suv' ? 'selected' : '' }}>SUV</option>
                <option value="hatchback" {{ old('body_type', $car->body_type) == 'hatchback' ? 'selected' : '' }}>Hatchback</option>
            </select>
        </div>

        <div class="mb-4">
            <label for="price" class="block text-gray-700 text-sm font-bold mb-2">Price:</label>
            <input type="text" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="price" name="price" value="{{ old('price', $car->price) }}">
        </div>

        <button type="submit" class="bg-blue-500 hover:bg-red-700 text-black font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">Update Car</button>
    </form>
</div>
@endsection
