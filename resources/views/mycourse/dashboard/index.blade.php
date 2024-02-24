@extends('mycourse.layout')

@section('content')
    
    <div class="card-body">
        <h3>Page Dashboard</h3>
     @if (Session::has('status'))
        <p class="mt-3">{{ Session('status') }}  Lihat Katalog Kelas...<a href="{{url('/')}}"
                target="_blank">more details.</a></p>
          
    @endif
     </div>
@stop