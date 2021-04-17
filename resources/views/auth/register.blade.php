@extends('layouts.index')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Register new users</div>

                <div class="card-body">
                <p>Fields with an <strong class='text-danger'>*</strong> is required</p>
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="schoolId" class="col-md-4 col-form-label text-md-right"><strong class='text-danger'>*</strong> School ID</label>

                            <div class="col-md-6">
                                <input id="schoolId" type="text" class="form-control{{ $errors->has('schoolId') ? ' is-invalid' : '' }}" name="schoolId" value="{{ old('schoolId') }}" required autofocus>

                                @if ($errors->has('schoolId'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('schoolId') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right"><strong class='text-danger'>*</strong> Name</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name') }}" required autofocus>

                                @if ($errors->has('name'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right"><strong class='text-danger'>*</strong> Email Address</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required>

                                @if ($errors->has('email'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                            
                        </div>

                        <div class="form-group row">
                            <label for="contactNum" class="col-md-4 col-form-label text-md-right"><strong class='text-danger'>*</strong> Contact Number</label>

                            <div class="col-md-6">
                                <input id="contactNum" type="text" class="form-control{{ $errors->has('contactNum') ? ' is-invalid' : '' }}" name="contactNum" value="{{ old('contactNum') }}" required autofocus>

                                @if ($errors->has('contactNum'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('contactNum') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="birthdate" class="col-md-4 col-form-label text-md-right"><strong class='text-danger'>*</strong> Birth Date</label>

                            <div class="col-md-6">
                                <input id="birthdate" type="date" class="form-control{{ $errors->has('birthdate') ? ' is-invalid' : '' }}" name="birthdate" value="{{ old('birthdate') }}" required autofocus>

                                @if ($errors->has('birthdate'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('birthdate') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="course" class="col-md-4 col-form-label text-md-right"><strong class='text-danger'>*</strong> Course</label>

                            <div class="col-md-6">
                                <input id="course" type="text" class="form-control{{ $errors->has('course') ? ' is-invalid' : '' }}" name="course" value="{{ old('course') }}" required autofocus>

                                @if ($errors->has('course'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('course') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="accountType" class="col-md-4 col-form-label text-md-right"><strong class='text-danger'>*</strong> Account Type</label>

                            <div class="col-md-6">
                                <select class="form-select" name='account_type' aria-label="Default select example">
                                    <option value="admin" selected>Admin</option>
                                    <option value="working student">Working Student</option>
                                    <option value="faculty">Faculty</option>
                                    <option value="student">Student</option>

                                </select>

                                <!-- @if ($errors->has('email'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif -->
                            </div>
                            
                        </div>

                     


                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right"><strong class='text-danger'>*</strong> Password</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password"  disabled>
                                <p class='m-0'>Default password of the user is <strong>PASSWORD</strong> in uppercase letters</p>


                                @if ($errors->has('password'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <!-- <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                            </div>
                        </div> -->


                        <div class="form-group d-flex mb-0 justify-content-center align-items-center">
                            
                                <button type="submit" class="btn btn-primary mr-2">
                                    {{ __('Register') }}
                                </button>
                            
                               
                                <a href="/" class="btn btn-outline-danger">
                                    Cancel
                                </a>
                                
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
