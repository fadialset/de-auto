{{-- resources/views/cars/create.blade.php --}}

@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Add a New Car</h1>
    <form action="{{ route('cars.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="make">Make:</label>
            <input type="text" class="form-control" id="make" name="make" value="{{ old('make') }}" required>
            @error('make')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="model">Model:</label>
            <input type="text" class="form-control" id="model" name="model" value="{{ old('model') }}" required>
            @error('model')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="year">Year:</label>
            <input type="number" class="form-control" id="year" name="year" value="{{ old('year') }}" required>
            @error('year')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="color">Color:</label>
            <input type="text" class="form-control" id="color" name="color" value="{{ old('color') }}">
            @error('color')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="transmission">Transmission:</label>
            <select class="form-control" id="transmission" name="transmission">
                <option value="automatic" {{ old('transmission') == 'automatic' ? 'selected' : '' }}>Automatic</option>
                <option value="manual" {{ old('transmission') == 'manual' ? 'selected' : '' }}>Manual</option>
            </select>
            @error('transmission')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="price">Price:</label>
            <input type="text" class="form-control" id="price" name="price" value="{{ old('price') }}">
            @error('price')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="image">Car Image:</label>
            <input type="file" class="form-control-file" id="image" name="image">
            @error('image')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>
@endsection
