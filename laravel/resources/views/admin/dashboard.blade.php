<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Admin Dashboard') }}
        </h2>
    </x-slot>


@section('content')
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <!-- Statistics Overview -->
            <div class="grid grid-cols-2 gap-4 mb-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 bg-blue-100">
                        <h3 class="text-lg font-semibold">Totaal Gebruikers</h3>
                        <p class="text-3xl">{{ $totalUsers }}</p>
                    </div>
                </div>
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 bg-green-100">
                        <h3 class="text-lg font-semibold">Totaal Auto's</h3>
                        <p class="text-3xl">{{ $totalCars }}</p>
                    </div>
                </div>
            </div>

            <!-- Users Table -->
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg mb-8">
                <div class="p-6">
                    <h3 class="text-lg font-semibold mb-4">Gebruikers</h3>
                    <div class="overflow-x-auto">
                        <table class="min-w-full table-auto">
                            <thead class="bg-gray-50">
                                <tr>
                                    <th class="px-6 py-3 text-left">Naam</th>
                                    <th class="px-6 py-3 text-left">Email</th>
                                    <th class="px-6 py-3 text-left">Aantal Auto's</th>
                                    <th class="px-6 py-3 text-left">Acties</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($users as $user)
                                <tr class="border-b">
                                    <td class="px-6 py-4">{{ $user->name }}</td>
                                    <td class="px-6 py-4">{{ $user->email }}</td>
                                    <td class="px-6 py-4">{{ $user->cars->count() }}</td>
                                    <td class="px-6 py-4">
    <a href="{{ route('admin.users.edit', $user->id) }}" class="text-blue-600 hover:text-blue-900">Bewerken</a>
  </td>
  <td class="px-6 py-4 text-right"> <!-- Aligned right -->
                            <form action="{{ route('admin.users.destroy', $user->id) }}" method="POST" class="inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" 
                                        class="bg-red hover:bg-red-700 text-white font-bold py-2 px-4 rounded"
                                        onclick="return confirm('Weet je zeker dat je deze gebruiker wilt verwijderen?')">
                                    Verwijderen
                                </button>
                            </form>
                        </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <!-- Cars Table -->
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6">
                    <h3 class="text-lg font-semibold mb-4">Auto's</h3>
                    <div class="overflow-x-auto">
                        <table class="min-w-full table-auto">
                            <thead class="bg-gray-50">
                                <tr>
                                    <th class="px-6 py-3 text-left">Merk</th>
                                    <th class="px-6 py-3 text-left">Model</th>
                                    <th class="px-6 py-3 text-left">Jaar</th>
                                    <th class="px-6 py-3 text-left">Eigenaar</th>
                                    <th class="px-6 py-3 text-left">Acties</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($cars as $car)
                                <tr class="border-b">
                                    <td class="px-6 py-4">{{ $car->make }}</td>
                                    <td class="px-6 py-4">{{ $car->model }}</td>
                                    <td class="px-6 py-4">{{ $car->year }}</td>
                                    <td class="px-6 py-4">{{ $car->user->name ?? 'Geen Eigenaar' }}</td>
                                    <td class="px-6 py-4">
                                        <a href="{{ route('cars.edit', $car->id) }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Bewerken</a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
</x-app-layout>