@extends('layouts.app')
@section('content')
<div class="row">
    <div class="col-md-10 mx-auto">
        <div class="card">
            <div class="card-header">
                <div class="card-body">
                    <form action="{{ url('/contacts') }}" method="POST">
                        @csrf
        
                        <div class="mb-3">
                            <label class="form-label">Name</label>
                            <input type="text" class="form-control" name="name" placeholder="Name" required>
                        </div>
                        
                        <div class="mb-3">
                            <label class="form-label">Email</label>
                            <input type="email" class="form-control" name="email" placeholder="Email" required>
                        </div>
                        
                        <div class="mb-3">
                            <label class="form-label">Phone</label>
                            <input type="text"  class="form-control" name="phone" placeholder="Phone">
                        </div>
                       
                        <div class="mb-3">
                            <label for="Textarea1" class="form-label">Address</label>
                            <textarea class="form-control" name="address" id="Textarea1" rows="3"></textarea>
                        </div>
                        
                        <button class="btn btn-success px-5" type="submit">Create</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection