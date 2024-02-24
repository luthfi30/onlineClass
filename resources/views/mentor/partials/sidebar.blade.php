<aside class="left-sidebar bg-sidebar">
    <div id="sidebar" class="sidebar sidebar-with-footer">
      <!-- Aplication Brand -->
      <div class="app-brand">
        <a href="{{url('dashboard')}}" title="Sleek Dashboard">
          <svg
            class="brand-icon"
            xmlns="http://www.w3.org/2000/svg"
            preserveAspectRatio="xMidYMid"
            width="30"
            height="33"
            viewBox="0 0 30 33">
            <g fill="none" fill-rule="evenodd">
              <path class="logo-fill-blue" fill="#7DBCFF" d="M0 4v25l8 4V0zM22 4v25l8 4V0z" />
              <path class="logo-fill-white" fill="#FFF" d="M11 4v25l8 4V0z" />
            </g>
          </svg>

          <span class="brand-name text-truncate">Sleek Dashboard</span>
        </a>
      </div>

      <!-- begin sidebar scrollbar -->
      <div class="" data-simplebar style="height: 100%;">
        <!-- sidebar menu -->
        
        <ul class="nav sidebar-inner" id="sidebar-menu">
         
           {{-- Dashboard Menu --}}
          <li class="has-sub">
            <a class="sidenav-item-link" href="javascript:void(0)" data-toggle="collapse" data-target="#dashboard"
             aria-expanded="true" aria-controls="dashboard">
              <i class="mdi mdi-view-dashboard-outline"></i>
              <span class="nav-text">Dashboard</span> <b class="caret"></b>
            </a>
            <ul class="collapse" id="dashboard" data-parent="#sidebar-menu" style="">
              <div class="sub-menu">
                <li class="">
                  <a class="sidenav-item-link" href="{{url('dashboard')}}">
                    <span class="nav-text">Dashboard</span>
                  </a>
                </li>

              </div>
            </ul>
          </li>
          @if(Auth::User()->status == 1)
          <li class="has-sub">
            <a class="sidenav-item-link" href="javascript:void(0)" data-toggle="collapse" data-target="#course"
              aria-expanded="false" aria-controls="course">
              <i class="mdi mdi-book-open"></i>
              <span class="nav-text">Course Management</span> <b class="caret"></b>
            </a>

            <ul class="collapse" id="course" data-parent="#sidebar-menu">
              <div class="sub-menu">
                <li class="">
                  <a class="sidenav-item-link" href="{{route('mentor.course')}}">
                    <span class="nav-text">Courses Data</span>
                    
                  </a>
                </li>

                <li class="">
                  <a class="sidenav-item-link" href="{{route('mentor.chapter')}}">
                    <span class="nav-text">Chapters Data</span>
                  </a>
                </li>

                <li class="">
                  <a class="sidenav-item-link" href="{{route('mentor.lesson')}}">
                    <span class="nav-text">Lessons Data</span>
                  </a>
                </li>
               
              </div>
            </ul>
          </li>
            <li class="has-sub ">
            <a class="sidenav-item-link" href="javascript:void(0)" data-toggle="collapse" data-target="#certi"
              aria-expanded="false" aria-controls="certi">
              <i class="mdi mdi-equal-box"></i>
              <span class="nav-text">Project</span> <b class="caret"></b>
            </a>
            <ul class="collapse " id="certi" data-parent="#sidebar-menu">
              <div class="sub-menu ">
                <li class="">
                  <a class="sidenav-item-link" href="{{route('mentor.certificate.index')}}">
                    <span class="nav-text">Student Project</span>
                  </a>
                </li>
              </div>
            </ul>
          </li>
          <li class="has-sub ">
            <a class="sidenav-item-link" href="javascript:void(0)" data-toggle="collapse" data-target="#pages2"
              aria-expanded="false" aria-controls="pages2">
              <i class="mdi mdi-cash-usd"></i>
              <span class="nav-text">Revenue</span> <b class="caret"></b>
            </a>

            <ul class="collapse " id="pages2" data-parent="#sidebar-menu">
              <div class="sub-menu ">
                <li class="">
                  <a class="sidenav-item-link" href="{{route('mentor.revenue')}}">
                    <span class="nav-text">Revenue</span>
                    
                  </a>
                </li>
              </div>
            </ul>
          </li>
          
          <li class="has-sub ">
            <a class="sidenav-item-link" href="javascript:void(0)" data-toggle="collapse" data-target="#forum"
              aria-expanded="false" aria-controls="forum">
              <i class="mdi mdi-forum"></i>
              <span class="nav-text">Forum</span> <b class="caret"></b>
            </a>

            <ul class="collapse " id="forum" data-parent="#sidebar-menu">
              <div class="sub-menu ">
                <li class="">
                  <a class="sidenav-item-link" href="{{route('mentor.forum')}}">
                    <span class="nav-text">Forum</span>
                    
                  </a>
                </li>
              </div>
            </ul>
          </li>
          <!-- <li class="section-title">
            Pages
          </li> -->

          <li class="has-sub ">
            <a class="sidenav-item-link" href="javascript:void(0)" data-toggle="collapse" data-target="#pages"
              aria-expanded="false" aria-controls="pages">
              <i class="mdi mdi-account"></i>
              <span class="nav-text">User Management</span> <b class="caret"></b>
            </a>

            <ul class="collapse " id="pages" data-parent="#sidebar-menu">
              <div class="sub-menu ">
                <li class="">
                  <a class="sidenav-item-link" href="{{route('mentor.account')}}">
                    <span class="nav-text">User Profile</span>
                    
                  </a>
                </li>
                <li class="">
                  <a class="sidenav-item-link" href="{{route('mentor.password')}}">
                    <span class="nav-text">Change Password</span>
                    
                  </a>
                </li>
              </div>
            </ul>
          </li>

        @endif

          <!-- <li class="section-title">
            Documentation
          </li> -->
        </ul>
      </div>

    
    </div>
  </aside>