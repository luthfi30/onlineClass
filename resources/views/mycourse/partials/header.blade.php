<header class="main-header " id="header">
    <nav class="navbar navbar-static-top navbar-expand-lg">
      <!-- Sidebar toggle button -->
      <button id="sidebar-toggler" class="sidebar-toggle">
        <span class="sr-only">Toggle navigation</span>
      </button>
      <!-- search form -->
      <div class="search-form d-none d-lg-inline-block">
  
      </div>
      <?php
      if(Auth::user()->role == 'admin')
      {
      $pesan = \App\Models\Order::where('status', 'checkout',)->get();
      $certi = \App\Models\Certificate::where('status', 'pending')->get();
      if(!empty($pesan || $certi))
      {
        $notif = \App\Models\Order::where('status', 'checkout')->count();
        $certis = \App\Models\Certificate::where('status', 'pending')->count();
      }
      }
     ?>
      <div class="navbar-right ">
        <ul class="nav navbar-nav">       
          <li class="dropdown">
            <button class="dropdown-toggle notify-toggler custom-dropdown-toggler">
              <i class="mdi mdi-bell-outline"></i>
              @if(empty($notif))
              {{-- <span class="badge badge-pill badge-warning">{{$notif }}</span> --}}
              @else
                 <span class="badge badge-pill badge-warning">{{$notif }}</span>
              @endif

              @if(empty($certi))
              
              @else
                <span class="badge badge-pill badge-warning">{{$certis }}</span>
              @endif
            </button>
            
            <div class="card card-default dropdown-notify dropdown-menu-right mb-0">
              <div class="card-header card-header-border-bottom px-3">
                <h2>Notifications</h2>
              </div>

              <div class="card-body px-0 py-3">
                <ul class="nav nav-tabs nav-style-border p-0 justify-content-between" id="myTab" role="tablist">
                  <li class="nav-item mx-3 my-0 py-0">
                    <a class="nav-link pb-3" id="contact2-tab" data-toggle="tab" href="#contact2" role="tab" aria-controls="contact2" aria-selected="false">All</a>
                  </li>
                </ul>

                <div class="tab-content" id="myTabContent3">
                  <div class="tab-pane fade show active" id="home2" role="tabpanel" aria-labelledby="home2-tab">
                    <ul class="list-unstyled" data-simplebar style="height: 360px">
                      @if(Auth::user()->role == 'admin')
                      @foreach ($pesan as $item)
                      <li>
                        <a href="{{route('transaction.index')}}" class="media media-message media-notification event-active">
                         
                          <div class="d-flex rounded-circle align-items-center justify-content-center mr-3 media-icon iconbox-45 bg-info text-white">
                            <i class="mdi mdi-cart-outline font-size-20"></i>
                          </div>
                          <div class="media-body d-flex justify-content-between">
                            <div class="message-contents">
                              <h4 class="title">{{$item->user->name}}</h4>
                              <p class="last-msg font-size-14">@currency($item->price)</p>
                              <p class="last-msg font-size-14">{{$item->created_at->diffForHumans()}}</p>
                            </div>
                          </div>
                        </a>
                      </li>
                      @endforeach
                     
                      @foreach ($certi as $items)
                      <li>
                        <a href="{{route('certificate.index')}}" class="media media-message media-notification event-active">
                         
                          <div class="d-flex rounded-circle align-items-center justify-content-center mr-3 media-icon iconbox-45 bg-info text-white">
                            <i class="mdi mdi-cart-outline font-size-20"></i>
                          </div>
                          <div class="media-body d-flex justify-content-between">
                            <div class="message-contents">
                              <h4 class="title">{{$items->username}}</h4>
                              <p class="last-msg font-size-14">Certificate Approval</p>
                              <p class="last-msg font-size-14">{{$items->email}}</p>
                              <p class="last-msg font-size-14">{{$items->created_at->diffForHumans()}}</p>
                            </div>
                          </div>
                        </a>
                      </li>
                      @endforeach
                      @endif
                    </ul>
                  </div>
                </div>
              </div>
            </div>

          </li>
          <!-- User Account -->
          <li class="dropdown user-menu">
            <button href="#" class="dropdown-toggle nav-link" data-toggle="dropdown">
              @if(Auth::user()->avatar == '')
                    <img src="{{ url('/data_file/no-image.jpg') }}" class="user-image" alt="User Image" />
                    @else
                    <img src="{{ url('/data_file/'.Auth::user()->avatar) }}" class="user-image" alt="User Image" />
                    @endif
             
              <span class="d-none d-lg-inline-block">{{ Auth::user()->name }}</span>
            </button>
            <ul class="dropdown-menu dropdown-menu-right">
              <!-- User image -->
              <li class="dropdown-header">
                
                <div class="d-inline-block">
                  {{ Auth::user()->email }}
                </div>
              </li>
              <li class="right-sidebar-in">
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
      </div>
    </nav>
  </header>