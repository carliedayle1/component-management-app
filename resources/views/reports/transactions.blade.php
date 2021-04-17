@extends('layouts.app')

@section('content')
<div class="d-flex justify-content-between">
    <h1>Transaction history</h1>
    <a href="/reports"> <button class="btn btn-outline-warning mt-2"> <strong>Go back</strong></button> </a>
</div>

<div class="container py-3">
    @if($transactions->count())
    <table id="example" class="table table-striped table-bordered" style="width:100%">
        <thead>
            <tr>
                <th>ID</th>
                <th>Image</th>
                <th>Name</th>
                <th>Issue Description</th>
                <th>Category</th>
                <th>Model</th>
                <th>Room Location</th>
                <th>Status</th>
                <th>Performed by</th>
                <th>Date Executed</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach($transactions->reverse() as $transaction)
            <tr>
                <td>{{$transaction->id}}</td>
                <td><img src="{{ asset('uploads/components/' . $transaction->componentArchive->image) }}" class="img-fluid"
                        width="100px;" height="100px;" alt="{{$transaction->componentArchive->name}}"></td>
                <td>{{$transaction->componentArchive->name}}</td>
                <td>{{$transaction->issue}}</td>
                <td>{{$transaction->componentArchive->category}}</td>
                <td>{{$transaction->componentArchive->model_number}}</td>
                <td>{{$transaction->componentArchive->room->name}}</td>
                <td>{{$transaction->componentArchive->status}}</td>
                <td>{{$transaction->submitted_by}}</td>
                <td>{{\Carbon\Carbon::parse($transaction->created_at)->format('M d Y h:i A')}}</td>
                <td>{{$transaction->action}}</td>
            </tr>
        @endforeach

        </tbody>
        <tfoot>
            <tr>
                <th>ID</th>
                <th>Image</th>
                <th>Name</th>
                <th>Issue Description</th>
                <th>Category</th>
                <th>Model</th>
                <th>Room Location</th>
                <th>Status</th>
                <th>Performed by</th>
                <th>Date Executed</th>
                <th>Action</th>
            </tr>
        </tfoot>
    </table>
    @else 
    <div class="card text-white bg-info mb-3">
        <div class="card-body">
            <h4 class="card-title">Oops..</h4>
            <p class="card-text">There are no report transactions yet..</p>
        </div>
    </div>
    @endif
</div>
@endsection
