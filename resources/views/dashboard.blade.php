@extends('layouts.app')

@section('content')
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <!-- Regular User Dashboard Content -->
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h1 class="text-2xl font-bold mb-4">Welkom in De auto dashboard</h1>
                    <p class="text-gray-600 mb-6">
                        Dit dashboard geeft je toegang tot onze uitgebreide auto collectie. Je kunt publieke auto's bekijken en toevoegen aan je persoonlijke verzameling, of je eigen auto's aanmaken en beheren in je bibliotheek. Gebruik de knoppen hieronder om te beginnen met het verkennen en beheren van je auto collectie.
                    </p>
                    <div class="mt-4">
                        <a href="{{ route('cars.index') }}" class="inline-block bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Bekijk Auto's</a>
                        <a href="{{ route('cars.create') }}" class="ml-4 inline-block bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Auto Toevoegen</a>
                    </div>
                </div>
            </div>

            <!-- Public Cars Section -->
            <div class="mt-6">
                @livewire('public-cars.public-cars-list')
            </div>
        </div>
    </div>
@endsection