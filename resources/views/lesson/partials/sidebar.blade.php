
<aside class="left-sidebar bg-sidebar">
    <div id="sidebar" class="sidebar sidebar-with-footer">
      <!-- Aplication Brand -->
      <div class="app-brand">
        <a href="/index.html" title="Sleek Dashboard">
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
          <li class="active">
            <a href="{{route('myCourse.show', Auth::user()->id)}}">
              <i class="mdi mdi-keyboard-backspace"></i>
              <span class="nav-text"> Back</span>  
            </a> 
          </li>
          @foreach ($chapter as $item)
          <li class="has-sub  expand">
           
            <a class="sidenav-item-link" href="javascript:void(0)" data-toggle="collapse" data-target="#dashboard"
              aria-expanded="false" aria-controls="dashboard">
              <i class="mdi mdi-play-circle-outline"></i>
              <span class="nav-text">{{$item->name}}</span> <b class="caret"></b>
            </a>
  
            <ul class="collapse show" id="dashboard" data-parent="#sidebar-menu">
             
              <div class="sub-menu">
                
               @foreach ($item->lesson as $d)
                <li class="active">
                  <a class="sidenav-item-link" href="{{route('show',['id' => $item->course_id ,'lessonid' => $d->id])}}">
                  
                    <span class="nav-text"> {{substr ($d->name,0, 15)}} </span>
                  </a>
                </li>
                @endforeach
                
              </div>
            </ul>
          </li>
          @endforeach
  
          <!-- <li class="section-title">
            Pages
          </li> -->
  
         
  
          <!-- <li class="section-title">
            Documentation
          </li> -->
        </ul>
      </div>
  
    
    </div>
  </aside>