@extends('frontpanel.layout')
@section('content')
 
<section id="popular-courses" class="courses">
    <div class="container" data-aos="fade-up">

      <div class="section-title">
        <h2>ShowCase</h2>
        <p>All Student Project</p>
        <h6 class="mt-1">Student Show Case base On The Class</h6>
      </div>
      
      <div class="row" data-aos="zoom-in" data-aos-delay="100">
        @if($data->count())
         @foreach ($data as $d)
        <div class="col-lg-4 col-md-6 d-flex align-items-stretch">
          <div class="course-item">
            <a href="{{$d->link_project}}" target="_blank">
            <img src="{{ url('/data_file/'.$d->image1) }}" class="img-fluid" alt="...">
             </a>
            <div class="course-content">
    
              <h3>{{$d->description}}</h3>
              <div class="trainer d-flex justify-content-between align-items-center">
                <div class="trainer-profile d-flex align-items-center">
                  <span>{{$d->username}}</span>
                </div>
                {{-- <div class="trainer-rank d-flex align-items-center">
                  <i class="bx bx-user"></i>&nbsp;50
                  &nbsp;&nbsp;
                  <i class="bx bx-heart"></i>&nbsp;65
                </div> --}}
              </div>
            </div>
          </div>
        </div> <!-- End Course Item-->
        @endforeach
        @else

        <h4>No student Showcase Yet...</h4>
        @endif
      </div>

    </div>
  </section>
@stop