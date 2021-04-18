@extends('layouts.app')

@section('content')
<h1>Home Content here!</h1>



@push('scripts')
<script>
  
    @if(Session::get('user_created'))
    Swal.fire(
        'Success!',
        'You created a user!',
        'success'
    )
    @endif



</script>
@endpush
@endsection
