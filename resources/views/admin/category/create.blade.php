@extends('admin.layout')
@section('sub-judul','Form Create Category')
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
    <form action="{{ route('category.store') }}" method="POST" enctype="multipart/form-data" >
        @csrf
        <div class="form-row">
            <div class="col-md-12 mb-3">
                <label for="validationServer01">Category Name</label>
    
                <input type="text" class="form-control" id="validationServer01" placeholder="" name="name" >
                <div class="valid-feedback">
                    Looks good!
                </div>
            </div>
    
            <div class="col-md-3 mb-3">
                <label for="validationServer02">Thumbnail</label>
    
                <input type="file" class="form-control" id="validationServer02" placeholder="" name="thumbnail" >
                <div class="valid-feedback">
                    Looks good!
                </div>
            </div>
            <div class="col-md-9 mt-4">
                
            </div>
        <input type="submit" class="btn btn-primary">
    </form>
    


    
@endsection