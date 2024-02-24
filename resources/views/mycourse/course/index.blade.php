@extends('frontpanel.layout')

@section('content')

<section id="why-us" class="why-us">
</section><!-- End Why Us Section -->
@if (Session::has('success'))
<div class="alert alert-highlighted alert-success" role="alert">
    {{ Session('success') }}
</div>
@endif

<section id="popular-courses" class="courses">
    <div class="container" data-aos="fade-up">           
        <div class="row" data-aos="zoom-in" data-aos-delay="100">
            <div class="col-lg-12 ">
                <h1 class="mb-3" style="color:#34364a; line-height:24px; font-weight:600; font-size:32px;">Kelas Saya</h1>
                <p style="color:#34364a; line-height:24px; font-size:18px; font-weight:100;">Upgrade terus ilmu dan pengalaman
                <br>   terbaru kamu di bidang teknologi</p>
            </div>
            @if ($data->count())
            @foreach ($data as $item)
			 <div class="col-lg-4 col-md-6 d-flex align-items-stretch mt-5">
				<div class="card mb-4">
					<img class="card-img-top" src="{{ url('/data_file/'.$item->thumbnail) }}">
					<div class="card-body">
            
            @php
                   $chapter = \App\Models\Chapter::where('course_id',$item->id)->first();
       
                   $lessonid = \App\Models\Lesson::where('chapter_id',$chapter->id)->orderBy('id','ASC')->first();
            @endphp
                
           
						<h4 class="card-title text-primary"> <a href="{{route('show',['id' => $item->id ,'lessonid' => $lessonid->id])}}">{{$item->title}}</a>  </h4>
						<h6 class="card-text pb-3 " 
                style="font-weight:lighter; text-transform:capitalize; font-size:18px">
                    {{$item->level}}
                  </h6>
                 
                  <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                    Review
                  </button>
                   {{-- <a type="button" class="btn btn-secondary" href="{{route('front.forum')}}">
                    forum
                  </a> --}}
                  <a type="button" class="btn btn-success" href="{{route('show',['id' => $item->id ,'lessonid' => $lessonid->id])}}">
                    Play
                  </a>
                
              </div>
            </div>
          </div>
            @endforeach
            @else
            <div class="mt-5">
                <p style="color:#8a909d; text-align:left; font-size: 26px;">Sorry You Haven't Purchase Any Classes Yet.. <a href="{{url('/')}}"
                    target="_blank">more details.</a></p>
            </div>
            
            @endif
        </div>
			
</section>
<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModal" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">New message</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            @php
            $mycourse = \App\Models\MyCourse::with('course')->where('user_id', Auth::user()->id)->get();
            @endphp
          <form action="{{route('review.store')}}" method="POST">
           @csrf
            <div class="form-group">
              <label>Course</label>
                <select id="" class="form-control" name="mycourse_id">
                   @foreach ($mycourse as $item)
                    <option value="{{$item->id}}"> {{ $item->course->title }} </option>
                   @endforeach
                </select>
            </div>
            <div class="form-group">
                <label>Rating</label>
                <select class="form-control fa" name="rating">
                    <option>--Select Rating--</option>
                    <option class="fa" style="font-size:12px" value="1">&#xf005; </option>
                    <option class="fa" style="font-size:12px" value="2">&#xf005; &#xf005;  </option>
                    <option class="fa" style="font-size:12px" value="3">&#xf005;&#xf005;&#xf005; </option>
                    <option class="fa" style="font-size:12px" value="4">&#xf005;&#xf005;&#xf005;&#xf005;</option>
                    <option class="fa" style="font-size:12px" value="5">&#xf005;&#xf005;&#xf005;&#xf005;&#xf005; </option>
                </select>
            </div>
            <div class="form-group">
              <label for="message-text" class="col-form-label">Description:</label>
              <textarea class="form-control" id="message-text" name="description"></textarea>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Send</button>
              </div>
          </form>
        </div>
    
      </div>
    </div>
  </div>



@stop



