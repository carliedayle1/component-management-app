@extends('layouts.app')

@section('content')
<div class="d-flex justify-content-between">
    <h1>Notification list</h1>
</div>

<div class="container py-3">
    <table id="example" class="table table-striped table-bordered" style="width:100%">
        <thead>
            <tr>
                <th>ID</th>
                <th>Description</th>
                <th>URL</th>
                <th>Date received</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>121212</td>
                <td>Sample description</td>
                <td>Sample url</td>
                <td>2011/04/25</td>
                <td>
                    <a href="/home" class="btn btn-sm btn-block btn-info"> Go to url </a>
                    <button class="btn btn-sm btn-block btn-success">Mark as seen</button>
                </td>
            </tr>


        </tbody>
        <tfoot>
            <tr>
                <th>ID</th>
                <th>Description</th>
                <th>URL</th>
                <th>Date received</th>
                <th>Actions</th>
            </tr>
        </tfoot>
    </table>
</div>
@endsection
