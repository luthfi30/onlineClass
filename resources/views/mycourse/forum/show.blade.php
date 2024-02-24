@extends('mentor.layout')


@section('content')
<div class="content">
    <div class="row">
                            <div class="row">
								<div class="col-xl-10">
									<div class="header " style="margin-bottom:35px; ">		
                                        								
											<h2 class="ml-5">Forum</h2>
                                            <div class="right" style="float: right; ">  
                                                 
                                                 <button type="button" class="btn btn-primary float-right mb-1" data-toggle="modal" data-target="#modaltambahforum"><i class="fa fa-plus"> Add new post</i></button>
                                            </div>
									 </div>
										<div class="card-body " data-simplebar="" >
                                            @foreach ($forum as $item)

											<div class="media media-border-bottom py-3 align-items-center justify-content-between border-bottom px-5">
												  @if($item->user->avatar == '')
                                                  <div class="media media-chat media-left"">
                                                    <img class="user-image mr-3" src="{{ url('/data_file/no-image.jpg') }}" >
                                                  </div>
                                                    @else
                                                     <div class="media media-chat media-left" ">
													<img class="user-image mr-3" src="{{ url('/data_file/'.$item->user->avatar) }}" />
												</div>
                                                    @endif
                                               
												<div class="media-body pr-3">
													<a class="mt-0 mb-1 font-size-15 text-dark" href="{{ route('forum.view', $item->id) }}">{{$item->user->name}} : {{$item->judul}} </a>
													<p><span class=" font-size-12 d-inline-block"><i class="mdi mdi-clock-outline"></i> {{$item->created_at->diffForHumans()}}</span></p>
												</div>

                                                @if($item->user_id === Auth::user()->id)
                                              
                                             <a href="{{route('forum.edit',$item->id)}}" class="btn btn-warning" ><i class="fa fa-edit"></i></a>
                                               <form action="{{ route('forum.destroy',$item->id) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                              
                                                <button type="submit" class="btn btn-danger " onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')"><i class="fa fa-trash"></i></button>
                                                </form>
                                                @endif
											</div>

                                         @endforeach
                                            
                                        </div>
                                    </div>
                                </div>
                            </div>
						
                        <div class="modal fade" id="modaltambahforum" tabindex="1" aria-labelledby="modaltambahforum" aria-hidden="true" >
                            <div class="modal-dialog" >
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title">Add new post</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                <div class="modal-body">
                                <!--FORM TAMBAH BARANG-->
                                    <form action="{{ route('forum.store') }}" method="POST" enctype="multipart/form-data" >
                                            @csrf
                                        <div class="form-group">
                                            <label for="">judul</label>
                                            <input type="text" class="form-control" id="judul" placeholder="judul" name="judul" aria-describedby="judul">
                                            </div>
                                            <div class="form-group">
                                             <label for="">Konten</label>
                                             <textarea rows="3" class="form-control" name="konten"></textarea>
                                            </div>
                                            <div class="form-group">
                                            <input type="hidden" class="form-control" placeholder="mycourse_id" value="{{$course->id}}" name="mycourse_id" aria-describedby="mycourse_id" readonly>

                                            </div>
                                         <button type="submit" class="btn btn-primary">Simpan Data</button>
                                    </form>
                                <!--END FORM TAMBAH BARANG-->
                                </div>
                                </div>
                            </div>
                        </div>




                        

 {{-- <div class="col-sm-12 justify">
            {{$forum->links()}}
        </div> --}}
    
        
@stop



