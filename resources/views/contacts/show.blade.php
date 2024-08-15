@extends('layouts.app')
@section('content')
<div class="row">
    <div class="col-md-10 mx-auto">
        <div class="card">
            <div class="card-header bg-dark">
                <h6 class="text-white">View contact details</h6>
            </div>
            <div class="card-body view-details">
                <p>Name: {{ $contact->name }}</p>
                <p>Email: {{ $contact->email }}</p>
                <p>Phone: {{ $contact->phone }}</p>
                <p>Address: {{ $contact->address }}</p>
                <p>Created At: {{ $contact->created_at }}</p>
            </div>
        </div>
    </div>
</div>

@endsection