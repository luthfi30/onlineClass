@extends('frontpanel.layout')
@section('content')
<main id="main">

    <!-- ======= Breadcrumbs ======= -->
    <div class="breadcrumbs" data-aos="fade-in">
      <div class="container">
        <h2>Course Details</h2>
        <p>Building a better world, one course at a time </p>
      </div>
    </div><!-- End Breadcrumbs -->

    <!-- ======= Cource Details Section ======= -->
    <section id="course-details" class="course-details">
        
        
      <div class="container" data-aos="fade-up">

        <div class="row">
          <div class="col-lg-8" >
              <div class="col-lg-12 mb-3" style="padding:8px;background:#000;webkit-border-radius: 10px;-moz-border-radius: 10px;border-radius: 10px; ;overflow:hidden;">
            {{-- <img src="{{ url('/data_file/'.$data->thumbnail) }}" class="img-fluid" alt=""> --}}
             <iframe class="media" width="100%" height="500" src="https://www.youtube.com/embed/{{$trailer2}}?rel=0"  frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
              </div>
             <h3> {{$data->title }}</h3>
            <p>
              {{-- {{$data->description}} --}}
            </p>
          </div>
          <div class="col-lg-4">
             <div class="course-info d-flex justify-content-between align-items-center">
                <h5>Trainer</h5>
                <p><b>{{$data->mentor->name}}</b></p>
              </div>

              <div class="course-info d-flex justify-content-between align-items-center">
                <h5>Category</h5>
                <p>{{$data->category->name}} </p>
              </div>

            <div class="course-info d-flex justify-content-between align-items-center">
              <h5>Course Fee</h5>
              <p>@currency($data->price) </p>
            </div>

            <div class="course-info d-flex justify-content-between align-items-center">
              <h5>Type</h5>
              <p style=" padding:5px; background: #5fcf80; color:white; font-size:14px" > {{$data->type}}  </p>
            </div>
            <div class="d-flex justify-content-between align-items-center mt-3">
                <h5></h5>
            @guest
             <p><a href="{{ route('login') }}" class="get-started-btn">Buy Course</a></p>
            @else
            @if(\App\Models\MyCourse::where('user_id', Auth::User()->id)->where('course_id',$data->id)->where('status','success')->count())
             <p><a href="{{route('myCourse.show', Auth::User()->id)}}" class="get-started-btn">See Course</a></p>
            @elseif(\App\Models\MyCourse::where('user_id', Auth::User()->id)->where('course_id',$data->id)->where('status','pending')->count())
            @php  $order = \App\Models\Order::where('user_id', Auth::user()->id)->where('status','pending')->first(); @endphp
            <p><a href="{{ route('history.detail', $order->id) }}" type="submit" class="get-started-btn">Buy Course</a></p>
             
            @else
            <form action="{{ route('order',$data->id) }}" method="POST">
            @csrf
            <p><button type="submit" class="get-started-btn">Buy Course</button></p>
             </form>
            @endif 
            @endguest
          </div>
          </div>
                  
          <div class="accordion" id="accordionExample">
            <div class="accordion-item">
              <h2 class="accordion-header" id="headingOne">
                <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
                 Deskripsi
                </button>
              </h2>
              <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                <div class="accordion-body">
                  {!!$data->about!!}
                </div>
              </div>
            </div>
            <div class="accordion-item">
              <h2 class="accordion-header" id="headingTwo">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                  Mentor
                </button>
              </h2>
              <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
                <div class="accordion-body">
                  <img src="{{ url('/data_file/'.$data->mentor->avatar) }}" class="rounded" width="50px;" alt="">
                  &nbsp;
                  {{$data->mentor->name}}
                  {{$data->mentor->profession}}
                  

                </div>
              </div>
            </div>
            <div class="accordion-item">
              <h2 class="accordion-header" id="headingTree">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTree" aria-expanded="false" aria-controls="collapseTree">
                  Project
                </button>
              </h2>
              <div id="collapseTree" class="accordion-collapse collapse" aria-labelledby="headingTree" data-bs-parent="#accordionExample">
                <div class="accordion-body">
                  <?php $no=1 ; ?>
                @foreach ($chapter as $item)
                <table class="col-lg-12">
                <thead>
                  <tr>
                    <th scope="col"  style="font-size:16px;">{{$no}}</th>
                    <th scope="col-2" style="font-size:16px;">{{$item->name}} </th>
                    
                  </tr>
                </thead>
                  @foreach ($item->lesson as $i)
                  <tbody>
                    <tr class="'mb-6 ">
                      <th scope="row"></th>
                      <td class="col-lg-10"><i class="fa fa-play-circle mr-2"></i> {{$i->name}}</td>  
                      <td><b>{{$i->time}}</b> </td>
                    </tr> 
                  </tbody>
                  @endforeach 
                </table>
                <?php $no++ ?>
                @endforeach 
                
              
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="row mt-5">
          <div class="col-md-12">
            <div class="rating-block">
              <h3>Average User Review</h3>
          
            @foreach ($review->where('mycourse.course_id',$data->id) as $ratings)
            @php
              if ($review->where('mycourse.course_id',$data->id)->count()== '') {
                $totalavg = 'No Comment';
              }else{
                $total = $review->where('mycourse.course_id',$data->id)->sum('rating');
                $count = $review->where('mycourse.course_id',$data->id)->count();
                $totalavg = $total/$count;
               
              }
            @endphp
            @endforeach
            @if($review->where('mycourse.course_id',$data->id)->count()== '')
            <h5 class="bold padding-bottom-7">No Comment</h5>
            @else
              <h2 class="bold padding-bottom-7">{{ $totalavg }} <small>/ 5</small></h2>
              @for ($i=1; $i<=5; $i++)
                @if ($i <= $totalavg)
                  <button type="button" class="btn btn-warning btn-xs" aria-label="Left Align">
                    <span class="fas fa-star" aria-hidden="true"></span>
                  </button>
                @else
                  <button type="button" class="btn btn-default btn-grey btn-xs" aria-label="Left Align">
                    <span class="fas fa-star" aria-hidden="true"></span>
                  </button>
                @endif
               @endfor
              @endif
            </div>
          </div>	
        </div>			
        
        <div class="row">
          @php
          $avgRating = 0;   
         @endphp
          <div class="col-md-12 mt-2">
            <div class="review-block">
              @foreach ($review->where('mycourse.course_id',$data->id) as $rating)
              @php
              if(!empty($rating)){
                $avgRating = $rating->rating;   
              }else{
                $avgRating = $avgRating + 0;
              }
              @endphp
               <hr/>
              <div class="row">
                <div class="col-md-3">
                  @if(!empty($rating->user->avatar))
                  <img width="150px" src="{{ url('/data_file/'.$rating->user->avatar) }}" class="rounded">
                  @else
                   <img width="150px" src="{{ url('/data_file/no-image.jpg') }}" class="rounded">
                  @endif
                  <h4 class="review-block-title mt-1"><a href="#">{{$rating->user->name}}</a></h4>
                  <div class="review-block-date">{{$rating->created_at->format('d-M-Y')}}<br/>{{$rating->created_at->diffForhumans()}}</div>
                </div>
                <div class="col-md-9">
                  <div class="review-block-rate">
                    @for ($i=1;$i<=5;$i++)
                        @if ($i<=$avgRating)
                        <button type="button" class="btn btn-warning btn-xs" aria-label="Left Align">
                          <span class="fas fa-star" aria-hidden="true"></span>
                        </button>
                        @else
                        <button type="button" class="btn btn-default btn-grey btn-xs" aria-label="Left Align">
                          <span class="fas fa-star" aria-hidden="true"></span>
                        </button>
                        @endif
                    @endfor
                  </div>
                  <div class="review-block-title">{{$rating->description}}</div>
                 <div class="review-block-description"></div> 
                </div>
              </div>
              @endforeach
            </div>
          </div>
        </div>
      </div>
      
     
    </section><!-- End Cource Details Section -->
 
    <!-- ======= Cource Details Tabs Section ======= -->
    {{-- <section id="cource-details-tabs" class="cource-details-tabs">
      <div class="container" data-aos="fade-up">

        <div class="row">
          <div class="col-lg-3">
            <ul class="nav nav-tabs flex-column">
              <li class="nav-item">
                <a class="nav-link active show" data-toggle="tab" href="#tab-1">Modi sit est</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" data-toggle="tab" href="#tab-2">Unde praesentium sed</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" data-toggle="tab" href="#tab-3">Pariatur explicabo vel</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" data-toggle="tab" href="#tab-4">Nostrum qui quasi</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" data-toggle="tab" href="#tab-5">Iusto ut expedita aut</a>
              </li>
            </ul>
          </div>
          <div class="col-lg-9 mt-4 mt-lg-0">
            <div class="tab-content">
              <div class="tab-pane active show" id="tab-1">
                <div class="row">
                  <div class="col-lg-8 details order-2 order-lg-1">
                    <h3>Architecto ut aperiam autem id</h3>
                    <p class="fst-italic">Qui laudantium consequatur laborum sit qui ad sapiente dila parde sonata raqer a videna mareta paulona marka</p>
                    <p>Et nobis maiores eius. Voluptatibus ut enim blanditiis atque harum sint. Laborum eos ipsum ipsa odit magni. Incidunt hic ut molestiae aut qui. Est repellat minima eveniet eius et quis magni nihil. Consequatur dolorem quaerat quos qui similique accusamus nostrum rem vero</p>
                  </div>
                  <div class="col-lg-4 text-center order-1 order-lg-2">
                    <img src="assets/img/course-details-tab-1.png" alt="" class="img-fluid">
                  </div>
                </div>
              </div>
              <div class="tab-pane" id="tab-2">
                <div class="row">
                  <div class="col-lg-8 details order-2 order-lg-1">
                    <h3>Et blanditiis nemo veritatis excepturi</h3>
                    <p class="fst-italic">Qui laudantium consequatur laborum sit qui ad sapiente dila parde sonata raqer a videna mareta paulona marka</p>
                    <p>Ea ipsum voluptatem consequatur quis est. Illum error ullam omnis quia et reiciendis sunt sunt est. Non aliquid repellendus itaque accusamus eius et velit ipsa voluptates. Optio nesciunt eaque beatae accusamus lerode pakto madirna desera vafle de nideran pal</p>
                  </div>
                  <div class="col-lg-4 text-center order-1 order-lg-2">
                    <img src="assets/img/course-details-tab-2.png" alt="" class="img-fluid">
                  </div>
                </div>
              </div>
              <div class="tab-pane" id="tab-3">
                <div class="row">
                  <div class="col-lg-8 details order-2 order-lg-1">
                    <h3>Impedit facilis occaecati odio neque aperiam sit</h3>
                    <p class="fst-italic">Eos voluptatibus quo. Odio similique illum id quidem non enim fuga. Qui natus non sunt dicta dolor et. In asperiores velit quaerat perferendis aut</p>
                    <p>Iure officiis odit rerum. Harum sequi eum illum corrupti culpa veritatis quisquam. Neque necessitatibus illo rerum eum ut. Commodi ipsam minima molestiae sed laboriosam a iste odio. Earum odit nesciunt fugiat sit ullam. Soluta et harum voluptatem optio quae</p>
                  </div>
                  <div class="col-lg-4 text-center order-1 order-lg-2">
                    <img src="assets/img/course-details-tab-3.png" alt="" class="img-fluid">
                  </div>
                </div>
              </div>
              <div class="tab-pane" id="tab-4">
                <div class="row">
                  <div class="col-lg-8 details order-2 order-lg-1">
                    <h3>Fuga dolores inventore laboriosam ut est accusamus laboriosam dolore</h3>
                    <p class="fst-italic">Totam aperiam accusamus. Repellat consequuntur iure voluptas iure porro quis delectus</p>
                    <p>Eaque consequuntur consequuntur libero expedita in voluptas. Nostrum ipsam necessitatibus aliquam fugiat debitis quis velit. Eum ex maxime error in consequatur corporis atque. Eligendi asperiores sed qui veritatis aperiam quia a laborum inventore</p>
                  </div>
                  <div class="col-lg-4 text-center order-1 order-lg-2">
                    <img src="assets/img/course-details-tab-4.png" alt="" class="img-fluid">
                  </div>
                </div>
              </div>
              <div class="tab-pane" id="tab-5">
                <div class="row">
                  <div class="col-lg-8 details order-2 order-lg-1">
                    <h3>Est eveniet ipsam sindera pad rone matrelat sando reda</h3>
                    <p class="fst-italic">Omnis blanditiis saepe eos autem qui sunt debitis porro quia.</p>
                    <p>Exercitationem nostrum omnis. Ut reiciendis repudiandae minus. Omnis recusandae ut non quam ut quod eius qui. Ipsum quia odit vero atque qui quibusdam amet. Occaecati sed est sint aut vitae molestiae voluptate vel</p>
                  </div>
                  <div class="col-lg-4 text-center order-1 order-lg-2">
                    <img src="assets/img/course-details-tab-5.png" alt="" class="img-fluid">
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

      </div>
    </section> --}}
    <!-- End Cource Details Tabs Section -->

  </main><!-- End #main -->

@stop