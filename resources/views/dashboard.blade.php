@extends('layouts.app')

@section('content')
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <!-- Regular User Dashboard Content -->
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h1>Welkom in De auto dashboard</h1>
                    <div class="mt-4">
                        <a href="{{ route('cars.index') }}" class="text-blue-600 hover:text-blue-800">Bekijk Auto's</a>
                        <a href="{{ route('cars.create') }}" class="ml-4 text-green-600 hover:text-green-800">Auto Toevoegen</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection