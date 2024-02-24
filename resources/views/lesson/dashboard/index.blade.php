@extends('lesson.layout')

@section('content')

@foreach ($data as $item)


<div class="card-default col-lg-12  " style="padding:20px;background:#000;webkit-border-radius: 20px;-moz-border-radius: 20px;border-radius: 20px; ;overflow:hidden;">
  <iframe class="media" width="100%" height="700" src="https://www.youtube.com/embed/{{$item->url_video}}?rel=0"  frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
</div>
@endforeach
<div class="col-lg-12">
  <h1 class="mb-4 mt-2" style="color: black"> {{$item->name}} </h1>
</div>
<div class="col-lg-6 mb-3 mt-3">
<a href="{{route('mydownload',$c->materi)}}" class="btn btn-warning"> <i class="mdi mdi-file-download-outline"></i> Download Materi</a>
</div>
 
<div class="card card-default col-lg-12">
  <div class="col-lg-11">
  <div class="mt-5 ml-3 col-lg-11">
  <h2 class="text-dark">About This Course</h2> <br>
  <p class="text-dark"> {!! $c->about !!} </p>
  <hr style="width: 100%">
</div>
</div>
 

  <div class="card-body" style="margin-top: -50px;">
    <div class="row">
      <div class="mt-0 col-lg-6">
        <p class="text-dark"> {!! $c->description !!}</p>
      </div>
    </div>
  </div>
</div>

           
			



@stop