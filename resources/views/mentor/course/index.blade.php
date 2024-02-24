
@extends('mentor.layout')
@section('sub-judul','Course Table')
@section('content')

    @if (Session::has('success'))
    <div class="alert alert-success alert-highlighted" role="alert">
        {{ Session('success') }}
    </div>
    @endif

        <div class="btn-Course mb-3">
            <a href="{{ route('mentor.create.course')  }}" class="btn btn-primary"><i class="fa fa-plus"> Add Course</i></a>   
        </div>
        

        <table class="table table-hover">
            <thead>
                <th>No</th>
                <th>Name</th>
                <th>Thumbnail</th>
                <th>Mentor</th>
                <th>Category</th>
                {{-- <th>Level</th> --}}
                <th>Type</th>
                <th>Status</th>
                <th>Price</th>
                {{-- <th>About</th> --}}
                <th>Actions</th>
            </thead>
            <?php $no=1 ; ?>
            @foreach ($data as $c)
            
            <tbody>
                <td> {{$no}} </td>
                <td>{{ $c->title }}</td>
                <td>
                    @if($c->thumbnail == '')
                    <img width="150px" src="{{ url('/data_file/no-image.jpg') }}">
                    @else
                     <img width="150px" src="{{ url('/data_file/'.$c->thumbnail) }}">
                 @endif
                </td>
                <td>{{ $c->mentor->name }}</td>
                <td>{{ $c->category->name }}</td>
                {{-- <td>{{$c->level}}</td> --}}
                <td>{{$c->type}}</td>
                <td>{{ $c->status }}</td>
                <td>@currency($c->price) </td>
                {{-- <td>{{ substr ($c->about,0, 20) }}</td> --}}
                
                <td> 
                    <form action="{{ route('mentor.destroy.course',$c->id) }}" method="POST">
                     <a href="{{route('mentor.detail.course', $c->id)}}" class="btn btn-primary"><i class="fa fa-eye"> student</i></a> |
                    <a href="{{route('mentor.edit.course', $c->id)}}" class="btn btn-warning"><i class="fa fa-edit"></i></a> |
                    
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger " onclick="return confirm('Menghapus data ini akan menghapus relasi di data chapter dan lesson, Apakah anda yakin ingin menghapus data ini?')"><i class="fa fa-trash"></i></button>
                    </form>
                </td>
            </tbody>
            <?php $no++ ?>
            @endforeach
           
        </table>
        <div class="col-sm-12 justify">
            {{$data->links()}}
        </div>
    




@stop