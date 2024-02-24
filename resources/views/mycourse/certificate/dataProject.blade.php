@extends('frontpanel.layout')

@section('content')

<section id="contact" class="contact">
    <div data-aos="fade-up">
        
    </div>
 
    <div class="container " data-aos="fade-up">
        
        <div class="card mt-5">
            <div class="card-body">
                <h1 class="display-4">Data Project</h1>
                <h4><b>Upload your project to get certificate</b></h4>
                <br>
                <table id="table_id" class="table table-striped table-bordered " >
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Course</th>
                            <th>Description</th>
                            <th>Link</th>
                            <th>Status</th>
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
                            <td>{{$item->link_project}}</td>
                      
                        <td>
                            <img width="150px" src="{{ url('/data_file/'.$item->image1) }}">
                        </td>
                        
                        <td>
                            <form action="{{route('data.destroy.project',$item->id)}}" method="POST">

                                 @if($item->status == 'success')
                                 <a href="{{route('data.certicifate',$item->id)}}" class="btn btn-primary"><i class="fas fa-file-download"></i></a> 
                                 <br>  <br>  
                                @else
                           
                                @endif
                                <a href="{{route('edit.data.Project',$item->id)}}" class="btn btn-warning"><i class="fa fa-edit"> </i></a> 
                                <br>  <br>  
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger " onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')"><i class="fa fa-trash"> </i></button>
                                </form>
                        </td>
                            
                            
                        </tr>
                        @endforeach
                    </tbody>
                    <tfoot>
                        <tr>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Course</th>
                            <th>Status</th>
                            <th>Link</th>
                            <th>Image</th>
                            <th>Action</th>
                        </tr>
                    </tfoot>
                </table> 
            </div>
        </div>
    </div>
  </section><!-- End Contact Section -->





@stop



