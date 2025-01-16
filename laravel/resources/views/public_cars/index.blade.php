@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4 py-8">
    <h1 class="text-5xl mb-6">Public Cars</h1>
    <div class="grid md:grid-cols-3 gap-4">
    @foreach ($publicCars as $car)
            <div class="bg-white rounded-lg shadow overflow-hidden">
                <img src="{{ asset('storage/' . $car->image) }}" alt="Car Image" class="object-cover w-full h-48">
                <div class="p-4">
                <p class='text-2xl	text-red-700'>{{ $car->make }} {{ $car->model }}</p>
                    <p class="text-gray-700"><b>Jaar:</b> {{ $car->year }}</p>
                    <p class="text-gray-700"><b>Kleur:</b> {{ $car->color }}</p>
                    <p class="text-gray-700"><b>Transmissie:</b> {{ $car->transmission }}</p>
                    <p class="text-gray-700"><b>Kilometerstand:</b> {{ $car->mileage }} km</p>
                    <p class="text-gray-700"><b>Brandstof:</b> {{ $car->fuel_type }}</p>
                    <p class="text-gray-700"><b>Carrosserie:</b> {{ $car->body_type }}</p>
                    <p class="text-gray-700"><b>Prijs:</b> €{{ number_format($car->price, 2) }}</p>
                    @php
                        $carExists = $userCars->contains('make', $car->make) &&
                                     $userCars->contains('model', $car->model) &&
                                     $userCars->contains('year', $car->year);
                    @endphp

                    <div class="mt-4">
                        @if ($carExists)
                            <button class="bg-gray-400 text-white py-2 px-4 rounded cursor-not-allowed" disabled>
                                Toegevoegd
                            </button>
                        @else
                            <form action="{{ route('public-cars.add-to-my-cars', $car->id) }}" method="POST">
                                @csrf
                                <button 
                                    type="submit" 
                                    class="bg-green-500 hover:bg-green-700 text-white py-2 px-4 rounded">
                                    Voeg toe
                                </button>
                            </form>
                        @endif
                    
                </div>
            </div>
        @endforeach
    </div>
</div>
@endsection
