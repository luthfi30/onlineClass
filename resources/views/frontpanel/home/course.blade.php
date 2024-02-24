@extends('frontpanel.layout')
@section('content')
  @include('frontpanel.partials.carousel')
  <!-- ======= About Section ======= -->
  @include('frontpanel.partials.about')
  <!-- End About Section -->

  <!-- ======= Counts Section ======= -->
 <!-- End Counts Section -->
 @include('frontpanel.partials.count')
  <!-- ======= Why Us Section ======= -->
  <section id="why-us" class="why-us">
  </section><!-- End Why Us Section -->

  <!-- ======= Features Section ======= -->
  @include('frontpanel.partials.category')
  <!-- End Features Section -->

<section id="popular-courses" class="courses">
    <div class="container" data-aos="fade-up">

      <div class="section-title">
        <h2>Our Courses</h2>
        <p>All Courses</p>
        <h6 class="mt-1">Building a better world, one course at a time</h6>
      </div>
      
      <div class="row" data-aos="zoom-in" data-aos-delay="100">
         @foreach ($data as $d)
        <div class="col-lg-4 col-md-6 d-flex align-items-stretch mb-5">
          <div class="course-item">
            <img src="{{ url('/data_file/'.$d->thumbnail) }}" class="img-fluid" alt="...">
            <div class="course-content">
              <div class="d-flex justify-content-between align-items-center mb-3">
                <h4>{{$d->category->name}}</h4>
                <p class="price">@currency($d->price)</p>
              </div>

              <h3><a href="{{route('courseDetail', $d->title)}}">{{$d->title}}</a></h3>
             {!!substr(strip_tags($d->about), 0, 80)!!}
              <div class="trainer d-flex justify-content-between align-items-center">
                <div class="trainer-profile d-flex align-items-center">
                  @if (!empty($d->mentor->avatar))
                  <img src="{{ url('/data_file/'.$d->mentor->avatar) }}" class="rounded" alt="">
                  @else
                  <img src="{{ url('/data_file/no-image') }}" class="rounded" alt="">
                  @endif
                  <span>{{$d->mentor->name}}</span>
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
      </div>

    </div>
  </section>
@stop