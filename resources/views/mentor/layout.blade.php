<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="description" content="Sleek Dashboard - Free Bootstrap 4 Admin Dashboard Template and UI Kit. It is very powerful bootstrap admin dashboard, which allows you to build products like admin panels, content management systems and CRMs etc.">
  
    <title>Mentor Dashboard </title>
    
    <link rel="stylesheet" href="{{URL::asset ('prism.css')}}">
    <!-- GOOGLE FONTS -->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,500|Poppins:400,500,600,700|Roboto:400,500" rel="stylesheet" />

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <link href="https://cdn.materialdesignicons.com/4.4.95/css/materialdesignicons.min.css" rel="stylesheet" />
      <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css" rel="stylesheet" />
        <link href="https://cdn.datatables.net/1.11.3/css/jquery.dataTables.min.css" rel="stylesheet" />
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  
    <!-- PLUGINS CSS STYLE -->
    <link href="{{ URL::asset ('admin/assets/plugins/simplebar/simplebar.css')}}" rel="stylesheet" />
    <link href="{{ URL::asset ('admin/assets/plugins/nprogress/nprogress.css')}}" rel="stylesheet" />
  
    <!-- No Extra plugin used -->
    <link href='{{ URL::asset ('admin/assets/plugins/jvectormap/jquery-jvectormap-2.0.3.css')}}' rel='stylesheet'>
    <link href='{{ URL::asset ('admin/assets/plugins/daterangepicker/daterangepicker.css')}}' rel='stylesheet'>
    <link href='{{ URL::asset ('admin/assets/plugins/toastr/toastr.min.css')}}' rel='stylesheet'>
    <link href="{{ URL::asset('admin/assets/options/optionswitch.css')}}" rel="stylesheet">
    <!-- SLEEK CSS -->
    <link id="sleek-css" rel="stylesheet" href="{{ URL::asset ('admin/assets/css/sleek.css')}}" />
  
    <!-- FAVICON -->
    <link href="{{ URL::asset ('admin/assets/img/favicon.png')}}" rel="shortcut icon" />
    
    <!--
      HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries
    -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    <script src="{{URL::asset ('assets/plugins/nprogress/nprogress.js')}}"></script>
  </head>

  <body class="header-fixed sidebar-fixed sidebar-dark header-light" id="body">
    <script>
      NProgress.configure({ showSpinner: false });
      NProgress.start();
    </script>

    <div id="toaster"></div>

    <!-- ====================================
    ——— WRAPPER
    ===================================== -->
    <div class="wrapper">

      <!-- Github Link -->
       <!-- ====================================
          ——— LEFT SIDEBAR WITH OUT FOOTER
        ===================================== -->

        @if(Auth::user()->role == 'mentor')
        @include('mentor.partials.sidebar')
                   
        @else
            @include('mycourse.partials.sidebarforum')
        @endif

          <!-- ====================================
        ——— PAGE WRAPPER
        ===================================== -->
        <div  div class="page-wrapper">
          <!-- Header -->
          @include('mycourse.partials.header')
          <!-- ====================================
          ——— CONTENT WRAPPER
          ===================================== -->
          <div class="content-wrapper">
            <div class="content">
              <div class="card card-default">
                <div class="body">
                   <div class="card-header">
                      <h3>@yield('sub-judul')</h3> 
                    </div>
                    <div class="card-body">
                      @yield('content')
                    </div>
                </div>
              </div>
            </div>
          </div> <!-- End Content -->
          @include('admin.partials.footer')
        </div> <!-- End Content Wrapper -->
    </div> <!-- End Page Wrapper -->

    <!-- Javascript -->
    <script src='{{ URL::asset ('prism.js')}}'></script>
    <script src="https://cdn.tiny.cloud/1/ev21s9ilvec6a8ki9t6p0liuaql04bggkb20ndfehqlq2jqy/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
    <script src="{{ URL::asset ('admin/assets/plugins/jquery/jquery.min.js')}}"></script>
    <script src="{{ URL::asset ('admin/assets/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
    <script src="{{ URL::asset ('admin/assets/plugins/simplebar/simplebar.min.js')}}"></script>
 
    <script src='{{ URL::asset ('admin/assets/plugins/charts/Chart.min.js')}}'></script>
    <script src='{{ URL::asset ('admin/assets/js/chart.js')}}'></script>
   
    <script src='{{ URL::asset ('admin/assets/plugins/jvectormap/jquery-jvectormap-2.0.3.min.js')}}'></script>
    <script src='{{ URL::asset ('admin/assets/plugins/jvectormap/jquery-jvectormap-world-mill.js')}}'></script>
    <script src='{{ URL::asset ('admin/assets/js/vector-map.js')}}'></script>

    <script src='{{ URL::asset ('admin/assets/plugins/daterangepicker/moment.min.js')}}'></script>
    <script src='{{ URL::asset ('admin/assets/plugins/daterangepicker/daterangepicker.js')}}'></script>
    <script src='{{ URL::asset ('admin/assets/js/date-range.js')}}'></script>
    <script src='{{ URL::asset ('admin/assets/plugins/toastr/toastr.min.js')}}'></script>
    <script src="{{ URL::asset ('admin/assets/js/sleek.js')}}"></script>
    
    <script src="{{ URL::asset('admin/assets/options/optionswitcher.js')}}"></script>
    <script>
      $(document).ready(function() {
    $('#example').DataTable();
} );
    </script>
    <script>
      tinymce.init({
        // selector: '#mytextarea',
        // plugins: 'print preview powerpaste casechange importcss tinydrive searchreplace autolink autosave save directionality advcode visualblocks visualchars fullscreen image link media mediaembed template codesample table charmap hr pagebreak nonbreaking anchor toc insertdatetime advlist lists checklist wordcount tinymcespellchecker a11ychecker imagetools textpattern noneditable help formatpainter permanentpen pageembed charmap tinycomments mentions quickbars linkchecker emoticons advtable export',
        // tinydrive_token_provider: 'URL_TO_YOUR_TOKEN_PROVIDER',
        // tinydrive_dropbox_app_key: 'YOUR_DROPBOX_APP_KEY',
        // tinydrive_google_drive_key: 'YOUR_GOOGLE_DRIVE_KEY',
        // tinydrive_google_drive_client_id: 'YOUR_GOOGLE_DRIVE_CLIENT_ID',
        // mobile: {
        //   plugins: 'print preview powerpaste casechange importcss tinydrive searchreplace autolink autosave save directionality advcode visualblocks visualchars fullscreen image link media mediaembed template codesample table charmap hr pagebreak nonbreaking anchor toc insertdatetime advlist lists checklist wordcount tinymcespellchecker a11ychecker textpattern noneditable help formatpainter pageembed charmap mentions quickbars linkchecker emoticons advtable'
        // },
        // menubar: 'file edit view insert format tools table tc help',
        // toolbar: 'undo redo | bold italic underline strikethrough | fontselect fontsizeselect formatselect | alignleft aligncenter alignright alignjustify | outdent indent |  numlist bullist checklist | forecolor backcolor casechange permanentpen formatpainter removeformat | pagebreak | charmap emoticons | fullscreen  preview save print | insertfile image media pageembed template link anchor codesample | a11ycheck ltr rtl | showcomments addcomment',
        // autosave_ask_before_unload: true,
        //     forced_root_block : false,

         selector: 'textarea',
      plugins: 'advlist autolink lists link image charmap print preview hr anchor pagebreak codesample',
      toolbar_mode: 'floating',
             forced_root_block : false,
          });

  toolbar: 'codesample'
    </script>

</body>
</html>

