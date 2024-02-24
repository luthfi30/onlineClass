
@extends('mentor.layout')
@section('sub-judul','Student Project')
@section('content')

    @if (Session::has('success'))
    <div class="alert alert-highlighted alert-success" role="alert">
        {{ Session('success') }}
    </div>
    @endif

       
        <p style="text-align:right"></p>
        <table id="table_id" class="table table-striped table-bordered" style="width:100%">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Course</th>
                    <th>Description</th>
                    <th>Status</th>
                    <th>Link Project</th>
                    <th>Image</th>
                    <th>Action</th>

                </tr>
            </thead>
            <tbody>
                @foreach ($data as $item)
                <tr>
                    <td>{{$item->username}}</td>
                    <td>{{$item->email}}</td>
                    <td>{{$item->title}}</td>
                    <td>{{$item->description}}</td>
                    <td>
                        @if($item->status == 'success')
                       <h6><span class="badge badge-success">{{$item->status}}</span></h6> 
                        @else
                        <h6><span class="badge badge-danger">{{$item->status}}</span></h6>
                        @endif
                    
                    </td>
                    <td><a href="{{$item->link_project}}" target="_blank">{{$item->link_project}}</a></td>
                    
                <td>
                    <img width="150px" src="{{ url('/data_file/'.$item->image1) }}">
                </td>
                
                <td>
                      @if($item->status == 'success')
                     <a href="{{route('mentor.certificate.status', $item->id)}}" class="btn btn-danger">Batalkan Verifikasi</a>
                     @else
                     <a href="{{route('mentor.certificate.status', $item->id)}}" class="btn btn-success">Verifikasi</a>

                     @endif
                </td>
                    
                    
                </tr>
                @endforeach
            </tbody>
            <tfoot>
                <tr>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Course</th>
                    <th>Link</th>
                    <th>Image</th>
                    <th>Action</th>
                </tr>
            </tfoot>
        </table> 
        
        <div class="col-sm-12 justify">
            {{$data->links()}}
        </div>
    



@stop