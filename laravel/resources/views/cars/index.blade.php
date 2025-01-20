{{-- resources/views/cars/index.blade.php --}}

@extends('layouts.app')

@section('content')
<div class="container m-1 px-4 py-8">
    @livewire('cars.user-cars-list')
</div>
@endsection
