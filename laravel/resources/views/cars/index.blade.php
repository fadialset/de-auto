{{-- resources/views/cars/index.blade.php --}}

@extends('layouts.app')

@section('content')
<div class="container m-1 px-4 py-8 ">
<h1 class="text-5xl text-red-700">De auto dashboard</h1>
    <div class="flex flex-wrap gap-4">
        @foreach ($cars as $car)
            <div class="bg-white rounded-lg shadow overflow-hidden">
                <img src="{{ asset('storage/' . $car->image) }}" alt="Car Image" class="h-48 w-48 object-cover md:h-24 md:w-24">
                <div class="p-4">
                    <p class='text-2xl	text-red-700'>{{ $car->make }} {{ $car->model }}</p>
                    <p class="text-gray-700"><b>Jaar:</b> {{ $car->year }}</p>
                    <p class="text-gray-700"><b>Kleur:</b> {{ $car->color }}</p>
                    <p class="text-gray-700"><b>Transmissie:</b> {{ $car->transmission }}</p>
                    <p class="text-gray-700"><b>Kilometerstand:</b> {{ $car->mileage }} km</p>
                    <p class="text-gray-700"><b>Brandstof:</b> {{ $car->fuel_type }}</p>
                    <p class="text-gray-700"><b>Carrosserie:</b> {{ $car->body_type }}</p>
                    <p class="text-gray-700"><b>Prijs:</b> €{{ number_format($car->price, 2) }}</p>
                    <div class="flex justify-between items-center mt-4">
                        <a href="{{ route('cars.edit', $car->id) }}" class="text-sm bg-blue-500 hover:bg-blue-700 text-black py-2 px-4 rounded focus:outline-none focus:shadow-outline">Bewerken</a>
                        <form action="{{ route('cars.destroy', $car->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-sm bg-red-500 hover:bg-red-700 text-black py-2 px-4 rounded focus:outline-none focus:shadow-outline">Verwijderen</button>
                        </form>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
@endsection
