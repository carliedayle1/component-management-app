@extends('layouts.app')

@section('content')
<div class="d-flex justify-content-between">
    <h1>Create user</h1>
    <a href="/users"> <button class="btn btn-outline-warning mt-2"> <strong>Go back</strong></button> </a>
</div>

<div class="d-flex justify-content-center py-3">
    <div style="width: 50%">
        <form action="">

            <div class="form-group">
                <label for="school_id">School ID</label>
                <input type="text" name="school_id" class="form-control" id="school_id" aria-describedby="school_id"
                    placeholder="Enter school id">
                <!-- <small id="school_id" class="form-text text-muted">We'll never share your email with anyone else.</small> -->
            </div>

            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" name="name" class="form-control" id="name" aria-describedby="name"
                    placeholder="Enter name">
                <!-- <small id="name" class="form-text text-muted">We'll never share your email with anyone else.</small> -->
            </div>

            <div class="form-group">
                <label for="email">Email Address</label>
                <input type="email" name="email" class="form-control" id="email" aria-describedby="email"
                    placeholder="Enter email">
                <!-- <small id="email" class="form-text text-muted">We'll never share your email with anyone else.</small> -->
            </div>

            <div class="form-group">
                <label for="contact_number">Contact Number</label>
                <input type="text" name="contact_number" class="form-control" id="contact_number" aria-describedby="contact_number"
                    placeholder="Enter contant number">
                <!-- <small id="contact_number" class="form-text text-muted">We'll never share your email with anyone else.</small> -->
            </div>

            <div class="form-group">
                <label for="birthdate">Birthdate</label>
                <input type="date" name="birthdate" class="form-control" id="birthdate" aria-describedby="birthdate"
                    placeholder="Enter birthdate">
                <!-- <small id="birthdate" class="form-text text-muted">We'll never share your email with anyone else.</small> -->
            </div>

            <div class="form-group">
                <label for="course">Course</label>
                <input type="text" name="course" class="form-control" id="course" aria-describedby="course"
                    placeholder="Enter course">
                <!-- <small id="course" class="form-text text-muted">We'll never share your email with anyone else.</small> -->
            </div>


            <div class="form-group">
                <label for="account_type">Account Type</label>
                <select class="form-control" name="account_type" id="account_type">
                    <option value="" selected disabled>Please select an account type</option>
                    <option>Admin</option>
                    <option>Working Student</option>
                    <option>Faculty</option>
                    <option>Student</option>
                </select>
            </div>

            <div class="form-group">
                <label for="password">Password</label>
                <input type="text" name="password" class="form-control" id="password" aria-describedby="password"
                    disabled>
                <small id="password" class="form-text">Default password of this user is <strong>PASSWORD</strong> in uppercase letters</small>
            </div>

            <div class="d-flex justify-content-center">
                <button type="submit" class="btn btn-info mx-1">Submit</button>
               <a href="/users" class="btn btn-outline-danger mx-1"> Cancel </a>

            </div>
        </form>
    </div>
</div>
@endsection
