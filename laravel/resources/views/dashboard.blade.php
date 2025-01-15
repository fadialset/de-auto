<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            <h1>Welkom in De auto dashboard</h1>
            <a href="{{ route('cars.index') }}">Bekijk Auto's</a>
            <a href="{{ route('cars.create') }}">Auto Toevoegen</a>
        </h2>
    </x-slot>

    
</x-app-layout>
