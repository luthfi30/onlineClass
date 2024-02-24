
@extends('admin.layout')
@section('sub-judul','Detail Student')
@section('content')

   
        <div class="btn-user-admin mb-3">
            <a href="{{ route('student.index')  }}" class="btn btn-primary">Back</a>   
        </div>
        
        <div class="row">
            <div class="col-lg-12 col-md-12 col-xl-4">
                <div class="card card-default" profile-data-height="">
                    <div class="card-header">
                        <h2>Profile</h2>
                    </div>
                    <div class="card-body text-center">
                         @if($user->avatar == '')
                        <img class="img-thumbnail d-flex mx-auto" src="{{ url('/data_file/no-image.jpg') }}">
                         @else
                         <img class="img-thumbnail " width="150px" src="{{ url('/data_file/'.$user->avatar) }}">
                         @endif
                        <h4 class="py-2 text-dark">{{$user->name}}</h4>
                            <i class="mdi mdi-email mr-1"></i>
                            <span>{{$user->email}}</span>
                            <i class="mdi mdi-professional-hexagon mr-1"></i>
                            <span>{{$user->profession}}</span>
                            <i class="mdi mdi-account-supervisor-circle mr-1"></i>
                            <span>{{$user->role}}</span>                                         
                    </div>
                </div>
            </div>
     
      <div class="col-lg-8">
                <div class="card card-default" profile-data-height="">
                    <div class="card-header">
                        <h2>Kelas Saya</h2>
                    </div>
                <div class="card-body">
                    <p class="mb-5">Daftar Kelas</p>
                            
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">No</th>
                                <th scope="col">Nama Kelas</th>
                                <th scope="col">Aksi</th>
                            </tr>
                        </thead>
    
                        <tbody>
                             <?php $no=1 ; ?>
                            @foreach ($kelas as $item)
                            <tr>
                                <td scope="row">{{$no}}</td>
                                <td>{{$item->title}}</td>
                                <td>
                                    <a href="{{route('course.index')}}" class="btn btn-warning">Lihat Kelas</a> 
                                </td>
                            </tr>
                             <?php $no++ ?>
                            @endforeach
                        </tbody>
                    </table>
                </div>


@stop