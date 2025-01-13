{{-- resources/views/cars/create.blade.php --}}

@extends('layouts.app')

@section('content')



<div class="create-car-container ">
                <h2 class="header">Add New Car</h2>

                <form action="{{ route('cars.store') }}" method="POST" enctype="multipart/form-data" class="py-8">
                    @csrf
                    <div class="flex flex-col mb-4">
                        <label for="make" class="mb-1 text-xs sm:text-sm tracking-wide text-gray-600">Merk:</label>
                        <div class="relative">
                            <input
                                type="text"
                                id="make"
                                name="make"
                                value="{{ old('make') }}"
                                class="text-sm sm:text-base placeholder-gray-500 px-4 py-2 border border-gray-400 rounded-lg focus:outline-none focus:border-blue-400"
                                required>
                            @error('make')
                                <span class="text-red-500 text-xs">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <div class="flex flex-col mb-4">
                        <label for="model" class="mb-1 text-xs sm:text-sm tracking-wide text-gray-600">Model:</label>
                        <div class="relative">
                            <input
                                type="text"
                                id="model"
                                name="model"
                                value="{{ old('model') }}"
                                class="text-sm sm:text-base placeholder-gray-500 px-4 py-2 border border-gray-400 rounded-lg focus:outline-none focus:border-blue-400"
                                required>
                            @error('model')
                                <span class="text-red-500 text-xs">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="flex flex-col mb-4">
                        <label for="price" class="mb-1 text-xs sm:text-sm tracking-wide text-gray-600">Prijs:</label>
                        <div class="relative">
                            <input
                                type="text"
                                id="price"
                                name="price"
                                value="{{ old('price') }}"
                                class="text-sm sm:text-base placeholder-gray-500 px-4 py-2 border border-gray-400 rounded-lg focus:outline-none focus:border-blue-400">
                            @error('price')
                                <span class="text-red-500 text-xs">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="flex flex-col mb-4">
                        <label for="year" class="mb-1 text-xs sm:text-sm tracking-wide text-gray-600">Bouwjaar:</label>
                        <div class="relative">
                            <select
                                id="year"
                                name="year"
                                class="text-sm sm:text-base px-4 py-2 border border-gray-400 rounded-lg focus:outline-none focus:border-blue-400"
                                required>
                                <option value="">Jaar</option>
                                @for ($year = date('Y'); $year >= 1950; $year--)
                                    <option value="{{ $year }}" {{ old('year') == $year ? 'selected' : '' }}>{{ $year }}</option>
                                @endfor
                            </select>
                            @error('year')
                                <span class="text-red-500 text-xs">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="flex flex-col mb-4">
                        <label for="mileage" class="mb-1 text-xs sm:text-sm tracking-wide text-gray-600">Kilometerstand:</label>
                        <div class="relative">
                            <input
                                type="number"
                                id="mileage" 
                                name="mileage"
                                value="{{ old('mileage') }}"
                                class="text-sm sm:text-base placeholder-gray-500 px-4 py-2 border border-gray-400 rounded-lg focus:outline-none focus:border-blue-400"
                                required>
                            @error('mileage')
                                <span class="text-red-500 text-xs">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="flex flex-col mb-4">
                        <label for="fuel" class="mb-1 text-xs sm:text-sm tracking-wide text-gray-600">Brandstof:</label>
                        <select id="fuel" name="fuel" class="text-sm sm:text-base px-4 py-2 border border-gray-400 rounded-lg focus:outline-none focus:border-blue-400">
                            <option value="">Brandstof</option>
                            <option value="benzine" {{ old('fuel') == 'benzine' ? 'selected' : '' }}>Benzine</option>
                            <option value="diesel" {{ old('fuel') == 'diesel' ? 'selected' : '' }}>Diesel</option>
                            <option value="elektrisch" {{ old('fuel') == 'elektrisch' ? 'selected' : '' }}>Elektrisch</option>
                            <option value="hybride" {{ old('fuel') == 'hybride' ? 'selected' : '' }}>Hybride</option>
                            <option value="lpg" {{ old('fuel') == 'lpg' ? 'selected' : '' }}>LPG</option>
                        </select>
                        @error('fuel')
                            <span class="text-red-500 text-xs">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="flex flex-col mb-4">
                        <label for="carrosserie" class="mb-1 text-xs sm:text-sm tracking-wide text-gray-600">Carrosserie:</label>
                        <select id="carrosserie" name="carrosserie" class="text-sm sm:text-base px-4 py-2 border border-gray-400 rounded-lg focus:outline-none focus:border-blue-400">
                            <option value="">Carrosserie</option>
                            <option value="hatchback" {{ old('carrosserie') == 'hatchback' ? 'selected' : '' }}>Hatchback</option>
                            <option value="sedan" {{ old('carrosserie') == 'sedan' ? 'selected' : '' }}>Sedan</option>
                            <option value="stationwagon" {{ old('carrosserie') == 'stationwagon' ? 'selected' : '' }}>Stationwagon</option>
                            <option value="suv" {{ old('carrosserie') == 'suv' ? 'selected' : '' }}>SUV</option>
                            <option value="coupe" {{ old('carrosserie') == 'coupe' ? 'selected' : '' }}>Coupé</option>
                            <option value="cabriolet" {{ old('carrosserie') == 'cabriolet' ? 'selected' : '' }}>Cabriolet</option>
                            <option value="mpv" {{ old('carrosserie') == 'mpv' ? 'selected' : '' }}>MPV</option>
                        </select>
                        @error('carrosserie')
                            <span class="text-red-500 text-xs">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="flex flex-col mb-4">
                        <label for="transmission" class="mb-1 text-xs sm:text-sm tracking-wide text-gray-600">Transmissie:</label>
                        <select id="transmission" name="transmission" class="text-sm sm:text-base px-4 py-2 border border-gray-400 rounded-lg focus:outline-none focus:border-blue-400">
                            <option value="automatic" {{ old('transmission') == 'automatic' ? 'selected' : '' }}>Automatic</option>
                            <option value="manual" {{ old('transmission') == 'manual' ? 'selected' : '' }}>Manual</option>
                        </select>
                        @error('transmission')
                            <span class="text-red-500 text-xs">{{ $message }}</span>
                        @enderror
                    </div>


                    <div class="flex flex-col mb-4">
                        <label for="color" class="mb-1 text-xs sm:text-sm tracking-wide text-gray-600">Kleur:</label>
                        <div class="relative">
                            <input
                                type="text"
                                id="color"
                                name="color"
                                value="{{ old('color') }}"
                                class="text-sm sm:text-base placeholder-gray-500 px-4 py-2 border border-gray-400 rounded-lg focus:outline-none focus:border-blue-400">
                            @error('color')
                                <span class="text-red-500 text-xs">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                   
                    

                    <div class="flex flex-col mb-4">
                        <label for="image" class="mb-1 text-xs sm:text-sm tracking-wide text-gray-600">Car Image:</label>
                        <input
                            type="file"
                            class="form-control-file"
                            id="image"
                            name="image">
                        @error('image')
                            <span class="text-red-500 text-xs">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="flex w-full">
                        <button type="submit" >
                            <span class="mr-2 uppercase">Submit</span>
                            <span>
                                <svg class="h-6 w-6 fill-current" viewBox="0 0 24 24">
                                    <path d="M2 21h18l-9-15-9 15zm9-12l6.172 10.5h-12.344l6.172-10.5zm0-2.938l-7.938 13.438h15.876l-7.938-13.438z"/>
                                </svg>
                            </span>
                        </button>
                    </div>
                </form>
            </div>
        
@endsection