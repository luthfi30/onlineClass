@extends('admin.layout')
@section('sub-judul','Form Create Student')
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

     <div class="btn-user-admin mb-3">
            <a href="{{ route('student.index')  }}" class="btn btn-primary">Back</a>   
        </div>

    <form action="{{ route('student.store') }}" method="POST" enctype="multipart/form-data" >
        @csrf
        <div class="form-row">
            <div class="col-md-12 mb-3">
                <label for="validationServer01">Name</label>
                <input type="text" class="form-control" id="validationServer01" placeholder="" name="name" >
            </div>
            <div class="col-md-12 mb-3">
                <label for="validationServer01">Profession</label>
                <input type="text" class="form-control" id="validationServer01" placeholder="" name="profession" >
            </div>

            <div class="col-md-6 mb-3">
                <label for="validationServer02">Avatar</label>
                <input type="file" class="form-control" id="validationServer02" placeholder="" name="avatar" >
            </div>

            <div class="col-md-9 mt-4">
                
            </div>
            <div class="col-md-12 mb-3">
                <label for="validationServer01">Role</label>
                <select name="role" class="form-select" id="">
                    <option value="student">Student</option>
                </select>
            </div>

            <div class="col-md-12 mb-3">
                <label for="validationServer01">Email</label>
                <input type="text" class="form-control" id="validationServer01" placeholder="" name="email" >
            </div>

            <div class="col-md-12 mb-3">
                <label for="validationServer01">Password</label>
                <input type="text" class="form-control" id="validationServer01" placeholder="" name="password" >
            </div>

            
           
            
        <input type="submit" class="btn btn-primary">
    </form>
    


    
@endsection