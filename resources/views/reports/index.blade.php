@extends('layouts.app')

@section('content')
<h1>Report list</h1>

<div class="container py-3">
    @if($reports->count())
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
                <th>Submitted By</th>
                <th>Submitted At</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($reports->reverse() as $report)

            <tr>
                <td>{{$report->id}}</td>
                <td><img src="{{ asset('uploads/components/' . $report->componentArchive->image) }}" class="img-fluid"
                        width="100px;" height="100px;" alt="{{$report->componentArchive->name}}"></td>
                <td>{{$report->componentArchive->name}}</td>
                <td>{{$report->issue}}</td>
                <td>{{$report->componentArchive->category}}</td>
                <td>{{$report->componentArchive->model_number}}</td>
                <td>{{$report->componentArchive->room->name}}</td>
                <td>{{$report->submitted_by}}</td>
                <td>{{\Carbon\Carbon::parse($report->created_at)->format('M d Y h:i A')}}</td>
                <td>
                    <a href="/reports/{{$report->id}}" class="btn btn-sm btn-block btn-info"> View </a>
                    <a href="/reports/edit/{{$report->id}}" class="btn btn-sm btn-block btn-success"> Edit </a>
                    <button class="btn btn-sm btn-block btn-danger" onclick="return deleteReport({{$report->id}})">Archive</button>
                    <!-- <button class="btn btn-sm btn-block btn-warning">History</button> -->
                </td>

                <div style="display:hidden">
                    <form action="/reports/delete/{{$report->id}}" method="POST" id="delete{{$report->id}}">
                        @csrf
                        @method('DELETE')
                    </form>
                </div>
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
                <th>Submitted By</th>
                <th>Submitted At</th>
                <th>Actions</th>
            </tr>
        </tfoot>
    </table>
    @else
    <div class="card text-white bg-info mb-3">
        <div class="card-body">
            <h4 class="card-title">Oops..</h4>
            <p class="card-text">There are no reports submitted yet..</p>
        </div>
    </div>
    @endif
</div>

@push('scripts')
<script>
    @if(Session::get('report_created'))
    Swal.fire(
        'Success!',
        'You submitted a report',
        'success'
    )
    @endif

    @if(Session::get('report_updated'))
    Swal.fire(
        'Success!',
        'You updated a report',
        'success'
    )
    @endif

    @if(Session::get('report_deleted'))
    Swal.fire(
        'Success!',
        'You deleted a report',
        'success'
    )
    @endif

    @if(Session::get('report_restored'))
    Swal.fire(
        'Success!',
        'You restored a report',
        'success'
    )
    @endif

    function deleteReport(id) {
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
