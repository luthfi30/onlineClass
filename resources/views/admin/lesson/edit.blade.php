@extends('admin.layout')
@section('sub-judul','Form Update Lesson')
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
    <form action="{{ route('lesson.update', $lesson->id) }}" method="POST" enctype="multipart/form-data" >
        @csrf
        @method('PUT')
        <div class="form-row">
            <div class="col-md-12 mb-3">
                <label for="validationServer01">Judul</label>
                <input type="text" class="form-control" id="validationServer01" placeholder="masukkan Judul lesson" name="name" value="{{ $lesson->name }}" >
            </div>
            
            <div class="col-md-12 mb-3">
                <label for="validationServer01">Chapter</label>
                <select name="chapter_id" class="form-select" >
                    @foreach ($chapter as $c)
                    <option value="{{$c->id}}" {{ $c->id == $lesson->chapter_id ? 'selected' : '' }}>{{$c->name}} - {{$c->title}}</option>
                    @endforeach
                </select>
            </div>

            <div class="col-md-12 mb-3">
                <label for="validationServer01">Url Video</label>
                <input type="text" class="form-control" id="validationServer01" placeholder="masukkan url video" name="url_video"  value="{{ $lesson->url_video }}">
            </div>

            <div class="col-md-12 mb-3">
                <iframe width="260" height="115" src="https://www.youtube.com/embed/{{$lesson->url_video}}" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
            </div>
            
             <div class="col-md-12 mb-3">
                <label for="validationServer01">Duration</label>
                <input type="text" class="form-control" id="validationServer01" placeholder="masukkan Time" name="time" value="{{ $lesson->time }}" >
            </div>
    
           
        <input type="submit" class="btn btn-primary">
    </form>
    
</div>

    
@endsection