@extends('admin.layouts.index')
@section('title', 'Sửa thông tin rạp phim')
@section('content')
    <div class="container mt-4">
        <h1>Edit Cinema</h1>
        <form action="{{ route('cinemas.update', $cinema->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label for="name" class="form-label">Name</label>
                <input type="text" class="form-control" id="name" name="name" value="{{ $cinema->name }}" required>
            </div>

            <div class="mb-3">
                <label for="address" class="form-label">Address</label>
                <input type="text" class="form-control" id="address" name="address" value="{{ $cinema->address }}">
            </div>

            <div class="mb-3">
                <label for="city" class="form-label">City</label>
                <select id="city" name="city" class="form-select" required>
                    <option value="">Select a city</option>
                    <option value="Hà Nội" {{ $cinema->city == 'Hà Nội' ? 'selected' : '' }}>Hà Nội</option>
                    <option value="Đà Nẵng" {{ $cinema->city == 'Đà Nẵng' ? 'selected' : '' }}>Đà Nẵng</option>
                    <option value="Hồ Chí Minh" {{ $cinema->city == 'Hồ Chí Minh' ? 'selected' : '' }}>Hồ Chí Minh</option>
                </select>
            </div>

            <div class="mb-3">
                <label for="state" class="form-label">State</label>
                <input type="text" class="form-control" id="state" name="state" value="{{ $cinema->state }}">
            </div>

            <div class="mb-3">
                <label for="zip_code" class="form-label">Zip Code</label>
                <input type="text" class="form-control" id="zip_code" name="zip_code" value="{{ $cinema->zip_code }}">
            </div>

            <div class="mb-3">
                <label for="phone" class="form-label">Phone</label>
                <input type="text" class="form-control" id="phone" name="phone" value="{{ $cinema->phone }}">
            </div>

            <button type="submit" class="btn btn-primary">Update</button>
            <a href="{{ route('cinemas.index') }}" class="btn btn-secondary">Back</a>
        </form>
    </div>
@endsection
