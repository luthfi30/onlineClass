@extends('mentor.layout')
@section('sub-judul','Edit Forum')
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

    <a href="{{route('forum.show',$course->id)}}"  class="btn btn-primary mb-3">Back</a>
<form  action="{{ route('forum.update', $item->id) }}" method="POST" enctype="multipart/form-data" >
        @csrf
        @method('put')
        
    <div class="form-group">
        <label for="">judul</label>
        <input type="text" class="form-control" id="judul" placeholder="judul" name="judul" aria-describedby="judul" value="{{ $item->judul}}">
        </div>
        <div class="form-group">
            <label for="">Konten</label>
            <textarea rows="3" class="form-control"  id="konten" name="konten" value="">{{ $item->konten}}</textarea>
        </div>
        <div class="form-group">
        <input type="hidden" class="form-control" placeholder="mycourse_id" id="mycourse_id" value="{{$course->id}}" name="mycourse_id" aria-describedby="mycourse_id" readonly>

        </div>
    <button type="submit" class="btn btn-primary">Update Data</button>
 </form>



@stop



