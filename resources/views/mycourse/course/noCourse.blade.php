@extends('mycourse.layout')

@section('content')


@if (Session::has('success'))
<div class="alert alert-highlighted alert-success" role="alert">
    {{ Session('success') }}
</div>
@endif



@stop