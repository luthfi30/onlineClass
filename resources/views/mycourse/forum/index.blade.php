
@extends('mentor.layout')
@section('sub-judul','Forum')
@section('content')

    @if (Session::has('success'))
    <div class="alert alert-success" role="alert">
        {{ Session('success') }}
    </div>
    @endif


        <table class="table table-hover">
            <thead>
                <th>No</th>
                <th>Name</th>
                <th>Thumbnail</th>
                <th>Mentor</th>
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
                
                <td> 
                    <a href="{{route('forum.show', $c->mycourse->id)}}" class="btn btn-primary"> Lihat Forum</a> 
                </td>
            </tbody>
            <?php $no++ ?>
            @endforeach
           
        </table>
        {{-- <div class="col-sm-12 justify">
            {{$data->links()}}
        </div>
     --}}




@stop