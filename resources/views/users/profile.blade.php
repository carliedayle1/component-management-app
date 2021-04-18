@extends('layouts.app')

@section('content')
<div class="d-flex justify-content-between">
    <h1>Profile</h1>
</div>

<div class="d-flex justify-content-center py-3">
    <div style="width: 50%">
        <form action="/profile/update/{{Auth::user()->id}}" method="POST">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="school_id">School ID</label>
                <input type="text" name="school_id" class="form-control @error('school_id') is-invalid @enderror"
                    id="school_id" aria-describedby="school_id" placeholder="Enter school_id"
                    value="{{old('school_id') ? old('school_id'):Auth::user()->school_id}}">
                @error('school_id')
                <small id="school_id" class="form-text text-danger">{{$message}}</small>
                @enderror
            </div>

            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" id="name"
                    aria-describedby="name" placeholder="Enter name"
                    value="{{old('name') ? old('name'):Auth::user()->name}}">
                @error('name')
                <small id="name" class="form-text text-danger">{{$message}}</small>
                @enderror
            </div>

            <div class="form-group">
                <label for="email">Email Address</label>
                <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" id="email"
                    aria-describedby="email" placeholder="Enter email"
                    value="{{old('email') ? old('email'):Auth::user()->email}}">
                @error('email')
                <small id="email" class="form-text text-danger">{{$message}}</small>
                @enderror
            </div>

            <div class="form-group">
                <label for="contact_number">Contact Number</label>
                <input type="text" name="contact_number"
                    class="form-control @error('contact_number') is-invalid @enderror" id="contact_number"
                    aria-describedby="contact_number" placeholder="Enter contact_number"
                    value="{{old('contact_number') ? old('contact_number'):Auth::user()->contact_number}}">
                @error('contact_number')
                <small id="contact_number" class="form-text text-danger">{{$message}}</small>
                @enderror
            </div>

            <div class="form-group">
                <label for="birthdate">Birthdate</label>
                <input type="date" name="birthdate" class="form-control @error('birthdate') is-invalid @enderror"
                    id="birthdate" aria-describedby="birthdate" placeholder="Enter birthdate"
                    value="{{old('birthdate') ? old('birthdate'):Auth::user()->birthdate}}">
                @error('birthdate')
                <small id="birthdate" class="form-text text-danger">{{$message}}</small>
                @enderror
            </div>

            <div class="form-group">
                <label for="course">Course</label>
                <input type="text" name="course" class="form-control @error('course') is-invalid @enderror" id="course"
                    aria-describedby="course" placeholder="Enter course"
                    value="{{old('course') ? old('course'):Auth::user()->course}}">
                @error('course')
                <small id="course" class="form-text text-danger">{{$message}}</small>
                @enderror
            </div>
            <hr>
            <h6>Change Password</h6>
            <div class="form-group mt-3">
                <label for="password">New Password</label>
                <input type="password" name="password" class="form-control @error('password') is-invalid @enderror"
                    id="password" aria-describedby="password" placeholder="Enter password">
                @error('password')
                <small id="password" class="form-text text-danger">{{$message}}</small>
                @enderror
            </div>

            <div class="form-group mt-3">
                <label for="password_confirmation">Confirm Password</label>
                <input type="password" name="password_confirmation"
                    class="form-control @error('password_confirmation') is-invalid @enderror" id="password_confirmation"
                    aria-describedby="password_confirmation" placeholder="Repeat password">
               
            </div>





            <div class="d-flex justify-content-center">
                <button type="submit" class="btn btn-info mx-1">Submit</button>
                <a href="/home" class="btn btn-outline-danger mx-1"> Cancel </a>

            </div>
        </form>
    </div>
</div>

@push('scripts')
<script>
    @if(Session::get('profile_updated'))
    Swal.fire(
        'Success!',
        'You have updated your profile!',
        'success'
    )
    @endif
</script>
@endpush
@endsection
