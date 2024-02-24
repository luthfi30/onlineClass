@php
    $site = \App\Models\Site::first()
@endphp
<header id="header" class="fixed-top">
    <div class="container d-flex align-items-center">
      <h1 class="logo me-auto"><a href="{{route('index')}}">{{$site->site_name}}</a></h1>
      <!-- Uncomment below if you prefer to use an image logo -->
      <!-- <a href="index.html" class="logo me-auto"><img src="frontend/assets/img/logo.png" alt="" class="img-fluid"></a>-->
      <nav id="navbar" class="navbar order-last order-lg-0">
         <i class="bi bi-list mobile-nav-toggle"></i>
        <ul>
          <li><a class="{{set_active('index')}}" href="{{route('index')}}">Home</a></li>
          <li class="dropdown   "><a href="#" class="{{set_active('category')}}"><span>Classes</span> <i class="bi bi-chevron-down"></i></a>
            <ul>
               @foreach (\App\Models\Category::all() as $item)
              <li><a href="{{route('category', $item->id)}}"> {{$item->name}} </a></li>
              @endforeach
            </ul>
          </li>
          <li><a class="" href="{{route('data.showcase')}}">ShowCase</a></li>
          {{-- <li><a href="events.html">Events</a></li> --}}
          <?php
            if(Auth::user())
            {
            $order = \App\Models\Order::where('user_id', Auth::user()->id)->where('status', 'pending')->first();
            if(!empty($order))
            {
              $notif = \App\Models\MyCourse::where('order_id',$order->id)->count();
            }
            }
          ?>
           @if(!empty($notif))
          <a href="{{ url('checkout') }}" style=" margin-left: -10px; margin-right: 10px; "> 
          <i class="fa fa-shopping-cart"></i>
          <span class="badge badge-pill badge-danger">{{$notif}}</span> 
          </a>
          @else
          <a href="{{url('/history')}}" style=" margin-left: -10px; margin-right: 10px; "> 
          <i class="fa fa-shopping-cart"></i>
          <span class="badge badge-pill badge-danger"></span> 
          </a>
          @endif
      @guest
      <a href="{{ route('login') }}"  style="padding:10px 20px 10px 20px; border-radius:50px; color:white; background-color:#5fcf80; margin-left:15px;"> {{ __('login') }} </a>
      @if (Route::has('register'))
      <a href="{{ route('register') }}"  > {{ __('Register') }} </a>
      @endif
      @else
      @if (Auth::User()->role == 'admin')
      <a href="{{url('/admin/dashboard')}}"  style="padding:10px 20px 10px 20px; border-radius:50px; color:white; background-color:#5fcf80; margin-left:15px;"> {{ Auth::user()->name }} </a>
      @elseif(Auth::User()->role == 'mentor')
      <a href="{{route('mentor.dashboard')}}"  style="padding:10px 20px 10px 20px; border-radius:50px; color:white; background-color:#5fcf80; margin-left:15px;"> {{ Auth::user()->name }} </a>
      @else
      <li class="dropdown"><a href="#"><span>{{ Auth::user()->name }}</span> <i class="bi bi-chevron-down"></i></a>
        <ul>
          <li><a href="{{url('/history')}}">order history</a></li>
          <li><a href="{{url('/my-course')}}">Profile</a></li>
           <li><a href="{{route('front.forum')}}">Forum</a></li>
          <li><a href="{{route('myCourse.show',Auth::user()->id)}}">Class</a></li>
          <li class="dropdown"><a href="#"><span>Project</span> <i class="bi bi-chevron-right"></i></a>
            <ul>
              <li><a href="{{route('data.Project')}}">Data Project</a></li>
              <li><a href="{{route('myCourse.certicifate')}}">Insert Project</a></li>
            </ul>
          </li>
         
          <li>
            <a class="dropdown-item" href="{{ route('logout') }}"
            onclick="event.preventDefault();
                          document.getElementById('logout-form').submit();">
             {{ __('Logout') }}
            </a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                @csrf
            </form>
          </li>
        </ul>
      </li>
    </ul>
      </nav>
      @endif
      @endguest
    </div>
  </header><!-- End Header -->

  