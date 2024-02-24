@extends('frontpanel.layout')

@section('content')

<section id="why-us" class="why-us">
</section><!-- End Why Us Section -->

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
					<img class="card-img-top" src="{{ url('/data_file/'.$item->course->thumbnail) }}">
					<div class="card-body" data-toggle="modal" data-target="#exampleModal">
						<h4 class="card-title text-primary"> <a href="{{route('lesson',$item->course->id)}}">{{$item->course->title}}</a>  </h4>
						<h6 class="card-text pb-3 " 
                        style="font-weight:lighter; text-transform:capitalize; font-size:18px">
                            {{$item->course->level}}
                         </h6>
						
					</div>
				</div>
			</div>
            @endforeach
            @else
            <div class="mt-5">
                <h4>Ooopss anda belum memiliki kelas apapun, <a href="{{url('/')}}"
                    target="_blank">more details.</a></h4>
            </div>
            
            @endif
        </div>
			
    </div>
</section>


<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          ...
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="button" class="btn btn-primary">Save changes</button>
        </div>
      </div>
    </div>
  </div>

@stop


