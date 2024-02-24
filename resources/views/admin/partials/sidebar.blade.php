<aside class="left-sidebar bg-sidebar">
    <div id="sidebar" class="sidebar sidebar-with-footer">
      <!-- Aplication Brand -->
      <div class="app-brand">
        <a href="{{url('admin/dashboard')}}" title="Sleek Dashboard">
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
                  <a class="sidenav-item-link" href="{{url('admin/dashboard')}}">
                    <span class="nav-text">Dashboard</span>
                  </a>
                </li>

              </div>
            </ul>
          </li>
          {{-- course Menu --}}
          <li class="has-sub ">
            <a class="sidenav-item-link" href="javascript:void(0)" data-toggle="collapse" data-target="#course"
              aria-expanded="false" aria-controls="course">
              <i class="mdi mdi-book-open"></i>
              <span class="nav-text">Course Management</span> <b class="caret"></b>
            </a>

            <ul class="collapse " id="course" data-parent="#sidebar-menu">
              <div class="sub-menu">
                <li class="active">
                  <a class="sidenav-item-link" href="{{route('category.index')}}">
                    <span class="nav-text">Categories Data</span>
                  </a>
                </li>

                <li class="">
                  <a class="sidenav-item-link" href="{{route('course.index')}}">
                    <span class="nav-text">Courses Data</span>
                    
                  </a>
                </li>

                <li class="">
                  <a class="sidenav-item-link" href="{{route('chapter.index')}}">
                    <span class="nav-text">Chapters Data</span>
                  </a>
                </li>

                <li class="">
                  <a class="sidenav-item-link" href="{{route('lesson.index')}}">
                    <span class="nav-text">Lessons Data</span>
                  </a>
                </li>
               
              </div>
            </ul>
          </li>
           {{-- Transaction Menu --}}
          <li class="has-sub ">
            <a class="sidenav-item-link" href="javascript:void(0)" data-toggle="collapse" data-target="#pages2"
              aria-expanded="false" aria-controls="pages2">
              <i class="mdi mdi-cart"></i>
              <span class="nav-text">Transaction</span> <b class="caret"></b>
            </a>

            <ul class="collapse " id="pages2" data-parent="#sidebar-menu">
              <div class="sub-menu ">
                <li class="">
                  <a class="sidenav-item-link" href="{{route('transaction.index')}}">
                    <span class="nav-text">Order Transaction</span>
                    
                  </a>
                </li>
              </div>
            </ul>
          </li>
          {{-- <li class="has-sub ">
            <a class="sidenav-item-link" href="javascript:void(0)" data-toggle="collapse" data-target="#certi"
              aria-expanded="false" aria-controls="certi">
              <i class="mdi mdi-equal-box"></i>
              <span class="nav-text">Project</span> <b class="caret"></b>
            </a>
            <ul class="collapse " id="certi" data-parent="#sidebar-menu">
              <div class="sub-menu ">
                <li class="">
                  <a class="sidenav-item-link" href="{{route('certificate.index')}}">
                    <span class="nav-text">Student Project</span>
                  </a>
                </li>
              </div>
            </ul>
          </li> --}}

           {{-- User Menu --}}
          <li class="has-sub ">
            <a class="sidenav-item-link" href="javascript:void(0)" data-toggle="collapse" data-target="#pages3"
              aria-expanded="false" aria-controls="pages3">
              <i class="mdi mdi-account-edit"></i>
              <span class="nav-text">User Management</span> <b class="caret"></b>
            </a>
            <ul class="collapse " id="pages3" data-parent="#sidebar-menu">
              <div class="sub-menu ">
                <li class="">
                  <a class="sidenav-item-link" href="{{route('user-admin.index')}}">
                    <span class="nav-text">Admin Data</span>
                    
                  </a>
                </li>
               
                <li class="">
                  <a class="sidenav-item-link" href="{{route('mentor.index')}}">
                    <span class="nav-text">Mentor Data</span>
                 
                  </a>
                </li>

                 <li class="">
                  <a class="sidenav-item-link" href="{{route('student.index')}}">
                    <span class="nav-text">Student Data</span>
                    
                  </a>
                </li>

                <li class="has-sub ">
                  <a class="sidenav-item-link" href="javascript:void(0)" data-toggle="collapse" data-target="#others"
                    aria-expanded="false" aria-controls="others">
                    <span class="nav-text">Auth</span> <b class="caret"></b>
                  </a>

                  <ul class="collapse " id="others">
                    <div class="sub-menu">
                      <li class="">
                        <a href="{{route('admin.password')}}">Reset Password</a>
                      </li>
                    </div>
                  </ul>
                </li>
              </div>
            </ul>
          </li>

            <li class="has-sub ">
            <a class="sidenav-item-link" href="javascript:void(0)" data-toggle="collapse" data-target="#print"
              aria-expanded="false" aria-controls="print">
              <i class="mdi mdi-printer"></i>
              <span class="nav-text">Laporan</span> <b class="caret"></b>
            </a>

            <ul class="collapse " id="print" data-parent="#sidebar-menu">
              <div class="sub-menu ">
                <li class="">
                  <a class="sidenav-item-link" href="{{route('laporan.transaksi')}}">
                    <span class="nav-text">Laporan Transaksi</span>
                    
                  </a>
                </li>
                 <li class="">
                  <a class="sidenav-item-link" href="{{route('laporan.revenue')}}">
                    <span class="nav-text">Laporan Revenue</span>
                    
                  </a>
                </li>
              </div>
            </ul>
          </li>

                {{-- Setting Menu --}}

                
                <li class="has-sub ">
                  <a class="sidenav-item-link" href="javascript:void(0)" data-toggle="collapse" data-target="#setting"
                    aria-expanded="false" aria-controls="pages2">
                    <i class="mdi mdi-settings"></i>
                    <span class="nav-text">Setting</span> <b class="caret"></b>
                  </a>
      
                  <ul class="collapse " id="setting" data-parent="#sidebar-menu">
                    <?php
                      if(Auth::user()->role == 'admin')
                      {
                      $site = \App\Models\Site::first();
                      }
                    ?>
                    <div class="sub-menu ">
                      <li class="">
                        <a class="sidenav-item-link" href="{{route('setting.edit', $site->id)}}">
                          <span class="nav-text">Site Management</span>
                          
                        </a>
                      </li>
                    </div>
                  </ul>
                </li>

          
        </ul>
      </div>

    
    </div>
  </aside>