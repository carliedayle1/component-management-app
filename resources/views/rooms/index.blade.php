@extends('layouts.app')

@section('content')
<div class="d-flex justify-content-between">
    <h1>Room location list</h1>
    <a href="/rooms/create"> <button class="btn btn-primary mt-2"> <strong>ADD ROOM</strong></button> </a>
</div>

<div class="container py-3">
    @if($rooms->count())
        <table id="example" class="table table-striped table-bordered" style="width:100%">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Description</th>
                    <th>Type</th>
                    <th>Date Created</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($rooms as $room)
                <tr>
                    <td>{{$room->id}}</td>
                    <td>{{$room->name}}</td>
                    <td>{{$room->description}}</td>
                    <td>{{$room->type}}</td>
                    <td>{{\Carbon\Carbon::parse($room->created_at)->format('M d Y h:i A')}}</td>
                    <td>
                        <a href="/rooms/1" class="btn btn-sm  btn-info"> View components </a>
                        <a href="/rooms/edit/1" class="btn btn-sm  btn-success"> Edit </a>
                    </td>
                </tr>
                @endforeach


            </tbody>
            <tfoot>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Description</th>
                    <th>Type</th>
                    <th>Date Created</th>
                    <th>Actions</th>
                </tr>
            </tfoot>
        </table>
    @else
        <div class="card text-white bg-info mb-3">
            <div class="card-body">
                <h4 class="card-title">Oops..</h4>
                <p class="card-text">There are no rooms yet. Go and create one!</p>
            </div>
        </div>
    @endif
</div>

@push('scripts')
<script>
    @if(Session::get('room_created'))
    Swal.fire(
        'Success!',
        'You created a room!',
        'success'
    )
    @endif

</script>
@endpush
@endsection
