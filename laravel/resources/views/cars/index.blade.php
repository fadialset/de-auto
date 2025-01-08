{{-- resources/views/cars/index.blade.php --}}

@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Cars List</h1>
    <a href="{{ route('cars.create') }}" class="btn btn-primary">Add New Car</a>
    <table class="table table-striped mt-4">
        <thead>
            <tr>
                <th>ID</th>
                <th>Make</th>
                <th>Model</th>
                <th>Year</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($cars as $car)
                <tr>
                    <td>{{ $car->id }}</td>
                    <td>{{ $car->make }}</td>
                    <td>{{ $car->model }}</td>
                    <td>{{ $car->year }}</td>
                    <td>
                        <a href="{{ route('cars.show', $car->id) }}" class="btn btn-info">View</a>
                        <a href="{{ route('cars.edit', $car->id) }}" class="btn btn-warning">Edit</a>
                        <form action="{{ route('cars.destroy', $car->id) }}" method="POST" style="display:inline-block;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
