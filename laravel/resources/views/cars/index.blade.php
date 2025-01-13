{{-- resources/views/cars/index.blade.php --}}

@extends('layouts.app')

{{-- resources/views/cars/index.blade.php --}}

@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4 py-8">
    <div class="grid md:grid-cols-3 gap-4">
        @foreach ($cars as $car)
            <div class="bg-white rounded-lg shadow overflow-hidden">
            <img src="{{ route('car.image', ['id' => $car->id]) }}" alt="Car Image">
                <div class="p-4">
                    <h3 class="font-bold text-lg">{{ $car->make }} {{ $car->model }}</h3>
                    <p class="text-gray-700">Year: {{ $car->year }}</p>
                    <p class="text-gray-700">Price: ${{ number_format($car->price, 2) }}</p>
                    <div class="flex justify-between items-center mt-4">
                        <a href="{{ route('cars.edit', $car->id) }}" class="text-sm bg-blue-500 hover:bg-blue-700 text-white py-2 px-4 rounded focus:outline-none focus:shadow-outline">Edit</a>
                        <form action="{{ route('cars.destroy', $car->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-sm bg-red-500 hover:bg-red-700 text-white py-2 px-4 rounded focus:outline-none focus:shadow-outline">Delete</button>
                        </form>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
@endsection

