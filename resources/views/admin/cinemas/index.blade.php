@extends('admin.layouts.index')
@section('title', 'Thể loại')

@section('content')
    <div class="container mt-4">
        <div class="row">
            <div class="col-lg-12 margin-tb">
                <div class="pull-left">
                    <h2>List of Cinemas</h2>
                </div>
                <div class="pull-right mb-2">
                    <a class="btn btn-success" href="{{ route('cinemas.create') }}"> Create New Cinema</a>
                </div>
            </div>
        </div>

        @if ($message = Session::get('success'))
            <div class="alert alert-success">
                <p>{{ $message }}</p>
            </div>
        @endif

        <table class="table table-bordered table-striped">
            <thead class="thead-dark">
            <tr>
                <th>No</th>
                <th>Name</th>
                <th>Location</th>
                <th>City</th>
                <th>State</th>
                <th>Zip Code</th>
                <th>Phone</th>
                <th width="280px">Action</th>
            </tr>
            </thead>
            <tbody>
            @foreach ($cinemas as $cinema)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $cinema->name }}</td>
                    <td>{{ $cinema->location ?? 'N/A' }}</td>
                    <td>{{ $cinema->city }}</td>
                    <td>{{ $cinema->state ?? 'N/A' }}</td>
                    <td>{{ $cinema->zip_code ?? 'N/A' }}</td>
                    <td>{{ $cinema->phone ?? 'N/A' }}</td>
                    <td>
                        <a class="btn btn-info btn-sm" href="{{ route('cinemas.show', $cinema->id) }}">Show</a>
                        <a class="btn btn-primary btn-sm" href="{{ route('cinemas.edit', $cinema->id) }}">Edit</a>
                        <form action="{{ route('cinemas.destroy', $cinema->id) }}" method="POST"
                              style="display:inline-block;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection
