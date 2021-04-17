@extends('layouts.app')

@section('content')
<div class="d-flex justify-content-between">
    <h1>Users list</h1>
    <div class="mt-2">
        <a href="/users/create"> <button class="btn btn-primary"> <strong>ADD USER</strong></button> </a>
        <a href="/users/create"> <button class="btn btn-secondary"> <strong>EXPORT USERS</strong></button> </a>
    </div>
</div>

<div class="container py-3">
    @if($users->count())
    <table id="example" class="table table-striped table-bordered" style="width:100%">
        <thead>
            <tr>
                <th>School ID</th>
                <th>Name</th>
                <th>Email</th>
                <th>Contact Number</th>
                <th>Birthdate</th>
                <th>Course</th>
                <th>Account Type</th>
                <th>Date Created</th>
                <th>Verified</th>
                <th>Borrow Status</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($users->reverse() as $user)
            <tr>
                <td>{{$user->school_id}}</td>
                <td>{{$user->name}}</td>
                <td>{{$user->email}}</td>
                <td>{{$user->contact_number}}</td>
                <td>{{$user->birthdate}}</td>
                <td>{{$user->course}}</td>
                <td>{{$user->account_type}}</td>
                <td>{{$user->created_at}}</td>
                <td>
                    @if($user->verified)
                    <span class="badge badge-info">Verified</span>
                    @else
                    <span class="badge badge-warning">Not verified</span>
                    @endif
                </td>
                <td>
                    @if($user->borrow_status)
                    <span class="badge badge-info">Can borrow</span>
                    @else
                    <span class="badge badge-warning">Cannot borrow</span>
                    @endif
                </td>
                <td>
                    <a href="/users/edit/{{$user->id}}" class="btn btn-sm btn-block btn-primary"> Edit </a>
                    <button class="btn btn-sm btn-block btn-danger"
                        onclick="return deleteUser({{$user->id}})">Delete</button>
                </td>
                <div style="display:hidden">
                        <form action="/users/delete/{{$user->id}}" method="POST"
                            id="delete{{$user->id}}">
                            @csrf
                            @method('DELETE')
                        </form>
                    </div>
            </tr>

            @endforeach


        </tbody>
        <tfoot>
            <tr>
                <th>School ID</th>
                <th>Name</th>
                <th>Email</th>
                <th>Contact Number</th>
                <th>Birthdate</th>
                <th>Course</th>
                <th>Account Type</th>
                <th>Date Created</th>
                <th>Verified</th>
                <th>Borrow Status</th>
                <th>Actions</th>
            </tr>
        </tfoot>
    </table>
    @else
    <div class="card text-white bg-info mb-3">
        <div class="card-body">
            <h4 class="card-title">Oops..</h4>
            <p class="card-text">There are no users created yet. Go and create one!</p>
        </div>
    </div>
    @endif
</div>

@push('scripts')
<script>
    @if(Session::get('user_updated'))
    Swal.fire(
        'Success!',
        'You have updated a user!',
        'success'
    )
    @endif

    @if(Session::get('user_deleted'))
    Swal.fire(
        'Success!',
        'You have delete a user',
        'success'
    )
    @endif

    function deleteUser(id) {
        Swal.fire({
            title: 'Are you sure?',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
            if (result.isConfirmed) {
                $("#delete" + id).submit();
            }
        })
    }

</script>
@endpush
@endsection
