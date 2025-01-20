{{-- resources/views/cars/edit.blade.php --}}

@extends('layouts.app')

@section('content')
<div class="container mx-auto mt-5">
    <div class="flex flex-col">
        <div class="w-full">
            @if ($errors->any())
                <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-4">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            @if (session('success'))
                <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4" role="alert">
                    <span class="block sm:inline">{{ session('success') }}</span>
                </div>
            @endif

            @if (session('error'))
                <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-4" role="alert">
                    <span class="block sm:inline">{{ session('error') }}</span>
                </div>
            @endif

            <div class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
                <div class="mb-4">
                    <h4 class="font-bold">Edit Car
                        <a href="{{ url('cars') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded float-right">
                            Back
                        </a>
                    </h4>
                </div>

                <form action="{{ route('cars.update', $car->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <div class="mb-4">
                        <label class="block text-gray-700 text-sm font-bold mb-2" for="make">Merk:</label>
                        <input type="text" name="make" id="make" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" value="{{ old('make', $car->make) }}" required>
                    </div>

                    <div class="mb-4">
                        <label class="block text-gray-700 text-sm font-bold mb-2" for="model">Model:</label>
                        <input type="text" name="model" id="model" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" value="{{ old('model', $car->model) }}" required>
                    </div>

                    <div class="mb-4">
                        <label class="block text-gray-700 text-sm font-bold mb-2" for="price">Prijs:</label>
                        <input type="text" name="price" id="price" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" value="{{ old('price', $car->price) }}">
                    </div>

                    <div class="mb-4">
                        <label class="block text-gray-700 text-sm font-bold mb-2" for="year">Bouwjaar:</label>
                        <select name="year" id="year" class="block appearance-none w-full bg-white border border-gray-400 hover:border-gray-500 px-4 py-2 pr-8 rounded shadow leading-tight focus:outline-none focus:shadow-outline">
                            <option value="">Select Year</option>
                            @for ($year = date('Y'); $year >= 1950; $year--)
                                <option value="{{ $year }}" {{ old('year', $car->year) == $year ? 'selected' : '' }}>{{ $year }}</option>
                            @endfor
                        </select>
                    </div>

                    <div class="mb-4">
                        <label class="block text-gray-700 text-sm font-bold mb-2" for="mileage">Kilometerstand:</label>
                        <input type="number" name="mileage" id="mileage" value="{{ old('mileage', $car->mileage) }}" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
                    </div>

                    <div class="mb-4">
                        <label class="block text-gray-700 text-sm font-bold mb-2" for="fuel">Brandstof:</label>
                        <select id="fuel" name="fuel_type" class="block appearance-none w-full bg-white border border-gray-400 hover:border-gray-500 px-4 py-2 pr-8 rounded shadow leading-tight focus:outline-none focus:shadow-outline">
                            <option value="">Select Fuel Type</option>
                            <option value="benzine" {{ old('fuel_type', $car->fuel_type) == 'benzine' ? 'selected' : '' }}>Benzine</option>
                            <option value="diesel" {{ old('fuel_type', $car->fuel_type) == 'diesel' ? 'selected' : '' }}>Diesel</option>
                            <option value="elektrisch" {{ old('fuel_type', $car->fuel_type) == 'elektrisch' ? 'selected' : '' }}>Elektrisch</option>
                            <option value="hybride" {{ old('fuel_type', $car->fuel_type) == 'hybride' ? 'selected' : '' }}>Hybride</option>
                            <option value="lpg" {{ old('fuel_type', $car->fuel_type) == 'lpg' ? 'selected' : '' }}>LPG</option>
                        </select>
                    </div>

                    <div class="mb-4">
                        <label class="block text-gray-700 text-sm font-bold mb-2" for="carrosserie">Carrosserie:</label>
                        <select id="carrosserie" name="body_type" class="block appearance-none w-full bg-white border border-gray-400 hover:border-gray-500 px-4 py-2 pr-8 rounded shadow leading-tight focus:outline-none focus:shadow-outline">
                            <option value="">Select Body Type</option>
                            <option value="hatchback" {{ old('body_type', $car->body_type) == 'hatchback' ? 'selected' : '' }}>Hatchback</option>
                            <option value="sedan" {{ old('body_type', $car->body_type) == 'sedan' ? 'selected' : '' }}>Sedan</option>
                            <option value="stationwagon" {{ old('body_type', $car->body_type) == 'stationwagon' ? 'selected' : '' }}>Stationwagon</option>
                            <option value="suv" {{ old('body_type', $car->body_type) == 'suv' ? 'selected' : '' }}>SUV</option>
                            <option value="coupe" {{ old('body_type', $car->body_type) == 'coupe' ? 'selected' : '' }}>Coupé</option>
                            <option value="cabriolet" {{ old('body_type', $car->body_type) == 'cabriolet' ? 'selected' : '' }}>Cabriolet</option>
                            <option value="mpv" {{ old('body_type', $car->body_type) == 'mpv' ? 'selected' : '' }}>MPV</option>
                        </select>
                    </div>

                    <div class="mb-4">
                        <label class="block text-gray-700 text-sm font-bold mb-2" for="transmission">Transmissie:</label>
                        <select id="transmission" name="transmission" class="block appearance-none w-full bg-white border border-gray-400 hover:border-gray-500 px-4 py-2 pr-8 rounded shadow leading-tight focus:outline-none focus:shadow-outline">
                            <option value="automatic" {{ old('transmission', $car->transmission) == 'automatic' ? 'selected' : '' }}>Automatic</option>
                            <option value="manual" {{ old('transmission', $car->transmission) == 'manual' ? 'selected' : '' }}>Manual</option>
                        </select>
                    </div>

                    <div class="mb-4">
                        <label class="block text-gray-700 text-sm font-bold mb-2" for="color">Kleur:</label>
                        <input type="text" name="color" id="color" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" value="{{ old('color', $car->color) }}">
                    </div>

                    <div class="mb-4">
                        <label class="block text-gray-700 text-sm font-bold mb-2" for="image">Car Image:</label>
                        <input type="file" name="image" class="form-control-file border rounded py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                        @if($car->image)
                            <div class="mt-2">
                                <img src="{{ asset('storage/'.$car->image) }}" alt="Current car image" class="max-w-xs">
                            </div>
                        @endif
                    </div>

                    <div class="flex items-center justify-between">
                        <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                            Update Car
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
