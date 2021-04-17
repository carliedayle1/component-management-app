@extends('layouts.app')

@section('content')
<div class="d-flex justify-content-between">
    <h1>Edit user</h1>
    <a href="/users"> <button class="btn btn-outline-warning mt-2"> <strong>Go back</strong></button> </a>
</div>

<div class="d-flex justify-content-center py-3">
    <div style="width: 50%">
        <form action="/users/update/{{$user->id}}" method="POST">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="school_id">School ID</label>
                <input type="text" name="school_id" class="form-control @error('school_id') is-invalid @enderror"
                    id="school_id" aria-describedby="school_id" placeholder="Enter school_id"
                    value="{{old('school_id') ? old('school_id'):$user->school_id}}">
                @error('school_id')
                <small id="school_id" class="form-text text-danger">{{$message}}</small>
                @enderror
            </div>

            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" id="name"
                    aria-describedby="name" placeholder="Enter name" value="{{old('name') ? old('name'):$user->name}}">
                @error('name')
                <small id="name" class="form-text text-danger">{{$message}}</small>
                @enderror
            </div>

            <div class="form-group">
                <label for="email">Email Address</label>
                <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" id="email"
                    aria-describedby="email" placeholder="Enter email"
                    value="{{old('email') ? old('email'):$user->email}}">
                @error('email')
                <small id="email" class="form-text text-danger">{{$message}}</small>
                @enderror
            </div>

            <div class="form-group">
                <label for="contact_number">Contact Number</label>
                <input type="text" name="contact_number"
                    class="form-control @error('contact_number') is-invalid @enderror" id="contact_number"
                    aria-describedby="contact_number" placeholder="Enter contact_number"
                    value="{{old('contact_number') ? old('contact_number'):$user->contact_number}}">
                @error('contact_number')
                <small id="contact_number" class="form-text text-danger">{{$message}}</small>
                @enderror
            </div>

            <div class="form-group">
                <label for="birthdate">Birthdate</label>
                <input type="date" name="birthdate" class="form-control @error('birthdate') is-invalid @enderror"
                    id="birthdate" aria-describedby="birthdate" placeholder="Enter birthdate"
                    value="{{old('birthdate') ? old('birthdate'):$user->birthdate}}">
                @error('birthdate')
                <small id="birthdate" class="form-text text-danger">{{$message}}</small>
                @enderror
            </div>

            <div class="form-group">
                <label for="course">Course</label>
                <input type="text" name="course" class="form-control @error('course') is-invalid @enderror"
                    id="course" aria-describedby="course" placeholder="Enter course"
                    value="{{old('course') ? old('course'):$user->course}}">
                @error('course')
                <small id="course" class="form-text text-danger">{{$message}}</small>
                @enderror
            </div>

            <div class="form-group">
                <label for="category">Account Type</label>
                <select class="form-control @error('account_type') is-invalid @enderror" name="account_type"
                    id="account_type">
                    <option value="" selected disabled>Please select a category</option>
                    <option value="admin"
                        {{old('account_type') === 'admin' || $user->account_type == 'admin' ? 'selected':''}}>Admin
                    </option>
                    <option value="working student"
                        {{old('account_type') === 'working student' || $user->account_type == 'working student' ? 'selected':''}}>
                        Working Student</option>
                    <option value="faculty"
                        {{old('account_type') === 'faculty' || $user->account_type == 'faculty' ? 'selected':''}}>
                        Faculty</option>
                    <option value="student"
                        {{old('account_type') === 'student' || $user->account_type == 'student' ? 'selected':''}}>
                        Student</option>
                </select>
                @error('account_type')
                <small id="account_type" class="form-text text-danger">{{$message}}</small>
                @enderror

            </div>

            <div class="form-group">
                <div class="custom-control custom-checkbox">
                    <input type="checkbox" name="verified" class="custom-control-input" id="customCheck1" {{$user->verified ? 'checked':''}}>
                    <label class="custom-control-label" for="customCheck1"><h6>Verified</h6></label>
                </div>
            </div>

            <div class="form-group">
                <div class="custom-control custom-checkbox">
                    <input type="checkbox" name="borrow_status" class="custom-control-input" id="check2" {{$user->borrow_status ? 'checked':''}}>
                    <label class="custom-control-label" for="check2"><h6>Borrow Status</h6></label>
                </div>
            </div>




            <div class="d-flex justify-content-center">
                <button type="submit" class="btn btn-info mx-1">Submit</button>
                <a href="/users" class="btn btn-outline-danger mx-1"> Cancel </a>

            </div>
        </form>
    </div>
</div>
@endsection
