@extends('admin.layout')
@section('sub-judul','Form Update Category')
@section('content')

    @if(count($errors) > 0)
        @foreach ($errors->all() as $error)
        <div class="alert alert-highlighted alert-danger" role="alert">
            {{ $error }}
        </div>
        @endforeach
    @endif
    @if(Session::has('success'))
        <div class="alert alert-highlighted  alert-success" role="alert">
            {{ Session('success') }}
        </div>
    @endif
    <form action="{{ route('category.update', $categori->id) }}" method="POST" enctype="multipart/form-data" >
        @csrf
        @method('PUT')
        <div class="form-row">
            <div class="col-md-12 mb-3">
                <label for="validationServer01">Category Name</label>
    
                <input type="text" class="form-control" id="validationServer01" placeholder="" name="name"  value="{{ $categori->name }}">
                <div class="valid-feedback">
                    Looks good!
                </div>
            </div>
    
            <div class="col-md-3 mb-3">
                <label for="validationServer02">Thumbnail</label>
               
                <input type="file" class="form-control" id="validationServer02" placeholder="" name="thumbnail" value="{{ $categori->thumbnail }}" >
                
                <div class="valid-feedback">
                    Looks good!
                </div>
            </div>

            <div class="col-md-9 mt-4">
                <img width="150px" src="{{ url('/data_file/'.$categori->thumbnail) }}">
            </div>
        <input type="submit" class="btn btn-primary">
    </form>
    


    
@endsection