@extends('admin.layout')
@section('sub-judul','Form Create Lesson')
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
    <form action="{{ route('lesson.store') }}" method="POST" enctype="multipart/form-data" >
        @csrf
        <div class="form-row">
            <div class="col-md-12 mb-3">
                <label for="validationServer01">Judul</label>
                <input type="text" class="form-control" id="validationServer01" placeholder="masukkan Judul lesson" name="name" >
            </div>
            
            <div class="col-md-12 mb-3">
                <label for="validationServer01">Chapter</label>
                <select name="chapter_id" class="form-select" >
                    @foreach ($chapter as $c)
                    <option value="{{$c->id}}">{{$c->name}} - {{$c->title}}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-md-12 mb-3">
                <label for="validationServer01">Duration</label>
                <input type="text" class="form-control" id="validationServer01" placeholder="masukkan time" name="time" >
            </div>

            <div class="col-md-12 mb-3">
                <label for="validationServer01">Url Video</label>
                <input type="text" class="form-control" id="validationServer01" placeholder="masukkan url video" name="url_video" >
            </div>
            
    
           
        <input type="submit" class="btn btn-primary">
    </form>
    
</div>

    
@endsection