@extends('layouts.app')
@section('content')
<form action="{{ url('/contacts') }}" method="GET" class="d-flex justify-content-end">
   <div class="btn-group">
        <input type="text" class="control px-4" name="search" placeholder="Search by name or email" aria-label="Search" aria-describedby="search-addon">
        <button class="btn btn-success" type="submit" data-mdb-ripple-init><i class="fa-solid fa-magnifying-glass"></i></button>
   </div>
</form>

@if (session('success'))
    <div class="toast-container position-fixed top-50 start-50 translate-middle p-3" style="z-index: 1050;">
        <div id="successToast" class="toast align-items-center text-white bg-success border-0" role="alert" aria-live="assertive" aria-atomic="true" style="min-width: 200px;">
            <div class="d-flex">
                <div class="toast-body text-center">
                    {{ session('success') }}
                </div>
                <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast" aria-label="Close"></button>
            </div>
        </div>
    </div>
@endif
<script>
    document.addEventListener('DOMContentLoaded', function () {
        var toastEl = document.getElementById('successToast');
        var toast = new bootstrap.Toast(toastEl, { delay: 2000 });
        toast.show();
    });
</script>

<table class="table table-hover mt-1">
    <thead>
        <tr class="bg-dark text-warning">
            <th><a href="{{ url('/contacts?sort=name&direction=' . ($request->query('direction') === 'asc' ? 'desc' : 'asc')) }}">Name</a></th>
            <th>Email</th>
            <th>Phone</th>
            <th>Address</th>
            <th><a href="{{ url('/contacts?sort=created_at&direction=' . ($request->query('direction') === 'asc' ? 'desc' : 'asc')) }}">Created At</a></th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($contacts as $contact)
        <tr>
            <td>{{ $contact->name }}</td>
            <td>{{ $contact->email }}</td>
            <td>{{ $contact->phone }}</td>
            <td>{{ $contact->address }}</td>
            <td>{{ $contact->created_at }}</td>
            <td>
                <a class="btn btn-info btn-sm" href="{{ url('/contacts/' . $contact->id) }}">View</a>
                <a class="btn btn-warning btn-sm" href="{{ url('/contacts/' . $contact->id . '/edit') }}">Edit</a>
                <form action="{{ url('/contacts/' . $contact->id) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-danger btn-sm" type="submit" onclick="return confirm('Are you sure?')">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection