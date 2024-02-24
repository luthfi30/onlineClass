@extends('admin.layout')
@section('sub-judul','Form Edit chapter')
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
    <form action="{{ route('chapter.update', $chapter->id) }}" method="POST" enctype="multipart/form-data" >
        @csrf
        @method('PUT')
        <div class="form-row">
            <div class="col-md-12 mb-3">
                <label for="validationServer01">chapter Name</label>
                <input type="text" class="form-control" id="validationServer01" placeholder="" name="name" value="{{$chapter->name}}" >
            </div>
                <div class="col-md-12 mb-3">
                    <label for="validationServer01">Course</label>
                    <select name="course_id" class="form-select" >
                        @foreach ($course as $c)
                        <option value="{{$c->id}}" {{ $c->id == $chapter->course_id ? 'selected' : ''  }}  >{{$c->title}}</option>
                        @endforeach
                    </select>
                   
            </div>
    
           
        <input type="submit" class="btn btn-primary">
    </form>
    
</div>

    
@endsection