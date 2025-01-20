<div class='py-12 bg-white'>
    <h1 class="text-5xl mb-6 text-center">Mijn auto's</h1>
    <div class="grid md:grid-cols-3 gap-4 p-4">
        @foreach ($cars as $car)
            <div class="bg-blue-100 rounded-lg shadow-md overflow-hidden">
                <img src="{{ asset('storage/' . $car->image) }}" alt="Car Image" class="object-cover w-full h-48">
                <div class="p-4">
                    <p class="text-2xl text-red-700">{{ $car->make }} {{ $car->model }}</p>
                    <p class="text-gray-700"><b>Jaar:</b> {{ $car->year }}</p>
                    <p class="text-gray-700"><b>Kleur:</b> {{ $car->color }}</p>
                    <p class="text-gray-700"><b>Transmissie:</b> {{ $car->transmission }}</p>
                    <p class="text-gray-700"><b>Kilometerstand:</b> {{ $car->mileage }} km</p>
                    <p class="text-gray-700"><b>Brandstof:</b> {{ $car->fuel_type }}</p>
                    <p class="text-gray-700"><b>Carrosserie:</b> {{ $car->body_type }}</p>
                    <p class="text-gray-700"><b>Prijs:</b> €{{ number_format($car->price, 2) }}</p>
                    
                    <div class="flex justify-between items-center mt-4">
                        <a href="{{ route('cars.edit', $car->id) }}" 
                           class="bg-blue-500 hover:bg-blue-700 text-white py-2 px-4 rounded">
                            Bewerken
                        </a>
                        <form action="{{ route('cars.destroy', $car->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" 
                                    class="bg-red hover:bg-red-100 text-white py-2 px-4 rounded">
                                Verwijderen
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
    <div class="mt-6">
        {{ $cars->links() }}
    </div>
</div>
