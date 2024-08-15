@extends('layouts.app')
@section('content')
   <div class="row">
    <div class="col-md-10 mx-auto">
        <div class="card">
            <div class="card-header">
                <div class="card-body">
                    <form action="{{ url('/contacts/' . $contact->id) }}" method="POST">
                        @csrf
                        @method('PUT')
    
    
                        <div class="mb-3">
                            <label class="form-label">Name</label>
                            <input type="text" class="form-control" name="name" value="{{ old('name', $contact->name) }}" placeholder="Name" required>
                        </div>
                        
                        <div class="mb-3">
                            <label class="form-label">Email</label>
                            <input type="email" class="form-control" name="email" value="{{ old('email', $contact->email) }}" placeholder="Email" required>
                        </div>
                        
                        <div class="mb-3">
                            <label class="form-label">Phone</label>
                            <input type="text"  class="form-control" name="phone" value="{{ old('phone', $contact->phone) }}" placeholder="Phone">
                        </div>
                       
                        <div class="mb-3">
                            <label for="Textarea1" class="form-label">Address</label>
                            <textarea class="form-control" name="address" id="Textarea1" rows="3">{{ old('address', $contact->address) }}</textarea>
                        </div>
                        
                        <button class="btn btn-success px-5" type="submit">Update</button>
        
                    </form>
                </div>
            </div>
        </div>
    </div>
   </div>
@endsection
