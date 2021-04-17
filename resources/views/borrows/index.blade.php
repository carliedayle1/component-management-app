@extends('layouts.app')

@section('content')
<div class="d-flex justify-content-between">
    <h1>Borrow logs</h1>
    <a href="/rooms/create"> <button class="btn btn-primary mt-2"> <strong>ADD ROOM</strong></button> </a>
</div>

<div class="container py-3">
    @if($logs->count())
        <table id="example" class="table table-striped table-bordered" style="width:100%">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Component Name</th>
                    <th>Image</th>
                    <th>Model</th>
                    <th>Category</th>
                    <th>Borrower Name</th>
                    <th>Borrower Type</th>
                    <th>Reason</th>
                    <th>Date Borrowed</th>
                    <th>Return Date</th>
                    <th>Status</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($logs->reverse() as $log)
                <tr>
                    <td>{{$log->id}}</td>
                    <td>{{$log->component->name}}</td>
                    <td><img src="{{ asset('uploads/components/' . $log->component->image) }}" class="img-fluid" width="100px;"
                        height="100px;" alt="{{$log->component->name}}"></td>
                    <td>{{$log->component->model_number}}</td>
                    <td>{{$log->component->category}}</td>
                    <td><a href="/users/edit/{{$log->user->id}}"> {{$log->borrower_name}} </a></td>
                    <td>{{$log->borrower_type}}</td>
                    <td>{{$log->reason}}</td>
                    <td>{{\Carbon\Carbon::parse($log->borrow_date)->format('M d Y h:i A')}}</td>
                    <td>{{\Carbon\Carbon::parse($log->return_date)->format('M d Y h:i A')}}</td>
                    <td>
                        @if($log->status == 'ACCEPTED')
                            <span class="badge badge-info">ACCEPTED</span>
                        @elseif($log->status == 'PENDING') 
                            <span class="badge badge-warning">PENDING</span>
                        @elseif($log->status == 'DENIED')
                            <span class="badge badge-danger">DENIED</span>
                        @endif
                    </td>
                    <td>
                        <a href="/borrows/edit/{{$log->id}}" class="btn btn-sm btn-block  btn-success"> Edit </a>
                    </td>
                </tr>
                @endforeach


            </tbody>
            <tfoot>
                <tr>
                    <th>ID</th>
                    <th>Component Name</th>
                    <th>Image</th>
                    <th>Model</th>
                    <th>Category</th>
                    <th>Borrower Name</th>
                    <th>Borrower Type</th>
                    <th>Reason</th>
                    <th>Date Borrowed</th>
                    <th>Return Date</th>
                    <th>Status</th>
                    <th>Actions</th>
                </tr>
            </tfoot>
        </table>
    @else
        <div class="card text-white bg-info mb-3">
            <div class="card-body">
                <h4 class="card-title">Oops..</h4>
                <p class="card-text">There are no borrow logs yet. Click <a href="/components" class="text-light">here</a> to borrow components. </p>
            </div>
        </div>
    @endif
</div>

@push('scripts')
<script>
    @if(Session::get('borrow_updated'))
    Swal.fire(
        'Success!',
        'You updated a borrow log!',
        'success'
    )
    @endif

</script>
@endpush
@endsection
