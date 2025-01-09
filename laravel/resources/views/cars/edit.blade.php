{{-- resources/views/cars/edit.blade.php --}}

@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Edit Car</h1>
    <form action="{{ route('cars.update', $car->id) }}" method="POST">
        @csrf
        @method('PUT')  <!-- Important: Laravel requires PUT method for updates -->

        <div class="form-group">
            <label for="make">Make:</label>
            <input type="text" class="form-control" id="make" name="make" value="{{ old('make', $car->make) }}" required>
        </div>

        <div class="form-group">
            <label for="model">Model:</label>
            <input type="text" class="form-control" id="model" name="model" value="{{ old('model', $car->model) }}" required>
        </div>

        <div class="form-group">
            <label for="year">Year:</label>
            <input type="text" class="form-control" id="year" name="year" value="{{ old('year', $car->year) }}" required>
        </div>

        <button type="submit" class="btn btn-primary">Update Car</button>
    </form>
</div>
@endsection
