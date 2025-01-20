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
            @livewire('admin.users-table')

            <!-- Cars Table -->
            @livewire('admin.cars-table')
        </div>
    </div>
    @endsection
</x-app-layout>