@extends('mentor.layout')
@section('sub-judul','Form Update mentor')
@section('content')

    @if(count($errors) > 0)
        @foreach ($errors->all() as $error)
        <div class="alert alert-highlighted alert-danger" role="alert">
            {{ $error }}
        </div>
        @endforeach
    @endif
    @if(Session::has('success'))
        <div class="alert alert-highlighted alert-success" role="alert">
            {{ Session('success') }}
        </div>
    @endif

    <form action="{{ route('mentor.account.update',$mentor->id) }}" method="POST" enctype="multipart/form-data" >
        @csrf
        @method('PUT')
        <div class="form-row">
            <div class="col-md-12 mb-3">
                <label for="validationServer01">Name</label>
                <input type="text" class="form-control" id="validationServer01" placeholder="" name="name" value="{{$mentor->name}}" >
            </div>

            <div class="col-md-12 mb-3">
                <label for="validationServer01">Role</label>
                <input type="text" class="form-control" id="validationServer01" placeholder="" name="role" value="{{$mentor->role}}" readonly>
            </div>
    
            <div class="col-md-3 mb-3">
                <label for="validationServer02">Profile</label>
                <input type="file" class="form-control" id="validationServer02" placeholder="" name="avatar" value="{{$mentor->avatar}}">
            </div>
           
            <div class="col-md-9 mt-4">
                <img width="150px" src="{{ url('/data_file/'.$mentor->avatar) }}">
            </div>
            <div class="col-md-6 mb-3">
                <label for="validationServer01">Email</label>
                <input type="text" class="form-control" id="validationServer01" placeholder="" name="email" value="{{$mentor->email}}" >
            </div>
            <div class="col-md-6 mb-3">
                <label for="validationServer01">Profession</label>
                <input type="text" class="form-control" id="validationServer01" placeholder="" name="profession" value="{{$mentor->profession}}" >
            </div>
        <input type="submit" class="btn btn-primary">
    </form>
    


    
@endsection