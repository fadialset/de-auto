<div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
    <div class="p-6">
        <div class="flex justify-between items-center mb-4">
            <h3 class="text-lg font-semibold">Auto's</h3>
            <div class="w-1/3">
                <input 
                    wire:model.live="search" 
                    type="text" 
                    placeholder="Zoek op merk, model, jaar of eigenaar..." 
                    class="w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                >
            </div>
        </div>
        <div class="overflow-x-auto">
            <table class="min-w-full table-auto">
                <thead class="bg-gray-50">
                    <tr>
                        <th class="px-6 py-3 text-left">Merk</th>
                        <th class="px-6 py-3 text-left">Model</th>
                        <th class="px-6 py-3 text-left">Jaar</th>
                        <th class="px-6 py-3 text-left">Eigenaar</th>
                        <th class="px-6 py-3 text-center">Acties</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($cars as $car)
                    <tr class="border-b">
                        <td class="px-6 py-4">{{ $car->make }}</td>
                        <td class="px-6 py-4">{{ $car->model }}</td>
                        <td class="px-6 py-4">{{ $car->year }}</td>
                        <td class="px-6 py-4">{{ $car->user->name ?? 'Geen Eigenaar' }}</td>
                        <td class="px-6 py-4 text-right">
                            <a href="{{ route('cars.edit', $car->id) }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Bewerken</a>
                            <form action="{{ route('admin.cars.destroy', $car->id) }}" method="POST" class="inline ml-2">
                                @csrf
                                @method('DELETE')
                                <button type="submit" 
                                        class="bg-red hover:bg-red text-white font-bold py-2 px-4 rounded"
                                        onclick="return confirm('Weet je zeker dat je deze auto wilt verwijderen?')">
                                    Verwijderen
                                </button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="mt-4">
                {{ $cars->links() }}
            </div>
        </div>
    </div>
</div>
