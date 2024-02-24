@extends('mentor.layout')

@section('content')
<div class="row">
						
    <div class="col-xl-12">
        <div class="card card-default">
            <div class="col-xs-3" style="padding:20px">
             <a href="{{ route('front.forum')  }}" class="btn btn-primary">Back</a>   
             </div>
            <div class="card-header d-block d-md-flex justify-content-between">
                <h3>{{$forum->judul}}</h3> <br>
             <p><span class=" font-size-12 d-inline-block"><i class="mdi mdi-clock-outline"></i> {{$forum->created_at->diffForHumans()}}</span></p>
            </div>
            <div class="card-body ">
                <div class="media media-border-bottom py-3 align-items-center  border-bottom ">
                     {{$forum->konten}}    
                </div>
            </div>
            <div class="card-body" style="margin-top: -50px; margin-bottom: -30px;">
                <div class="btn-group mb-1">
                    {{-- <button class="btn btn-outline-secondary mr-1"><i class="mdi mdi-thumb-up"></i>  suka</button> --}}

                    <button class="btn btn-outline-secondary"><i class="mdi mdi-comment"></i> Komentar</button>
                </div>
                <form action="" method="POST">
                    @csrf
                    <input type="hidden" name="forum_id" value="{{$forum->id}}">
                    <input type="hidden" name="parent" value="0">
                     <textarea name="konten" class="form-control" id="" rows="4"></textarea>
                    <input type="submit" class="btn btn-primary mt-1" value="Kirim">
                </form>
            </div>
           
           <div class="card-header">
                 <h3>Komentar ({{$data}})</h3>
           </div>
            <div class="card-body  p-0 mt-2" >
              @foreach ($forum->comment()->where('parent',0)->orderBy('created_at','desc')->get() as $komentar)
                <div class="media media-border-bottom py-3 align-items-center  px-5">
                    @if($forum->user->avatar == '')
                        <div class="media media-chat media-left"">
                        <img class="user-image mr-3" src="{{ url('/data_file/no-image.jpg') }}" >
                        </div>
                        @else
                        <div class="media media-chat media-left" ">
                        <img class="user-image mr-3" src="{{ url('/data_file/'.$komentar->user->avatar) }}" />
                        </div>
                    @endif
                    <div class="media-body pr-3">
                        <a class="mt-0 mb-1 font-size-15 text-dark" href="#">{{$komentar->user->name}}</a>  <span class=" font-size-6 "><i class="mdi mdi-clock-outline"></i>  {{$komentar->created_at->diffForHumans()}}</span>
                        <p>{{$komentar->konten}}</p>
                    </div>
                </div>

                <div class="card-body " style="margin-top: -60px; ">
                @foreach ($komentar->child as $child)
                    <div class="media media-border-bottom py-3 align-items-center  px-5">
                        <div class="media media-chat media-left"">
                        <img class="user-image mr-3" src="{{ url('/data_file/'.$child->user->avatar) }}" >
                        </div>
                        <div class="media-body pr-3">
                            <a class="mt-0 mb-1 font-size-15 text-dark" href="#">{{$child->user->name}}</a>
                            <p>{{$child->konten}}</p>
                        </div>
                        <span class=" font-size-12 d-inline-block "><i class="mdi mdi-clock-outline"></i>  {{$child->created_at->diffForHumans()}}</span>
                    </div>
                @endforeach

                 <form action="" method="POST">
                    @csrf
                    <input type="hidden" name="forum_id" value="{{$forum->id}}">
                    <input type="hidden" name="parent" value="{{$komentar->id}}">
                    <textarea name="mytextarea" class="form-control" id="mytextarea" rows="1"></textarea>
                    <input type="submit" class="btn btn-primary btn-xs mt-1" value="Kirim">
                </form>
                </div>
                
            @endforeach

            </div>
            
        </div>
    </div>

</div>

@stop



