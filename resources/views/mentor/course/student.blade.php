
@extends('mentor.layout')
@section('sub-judul','Student Table')
@section('content')

    @if (Session::has('success'))
    <div class="alert alert-success" role="alert">
        {{ Session('success') }}
    </div>
    @endif

        <div class="btn-Course mb-3">
            <a href="{{route('mentor.course')}}" class="btn btn-primary">Back</a>   
        </div>
        

        <table class="table table-hover">
            <thead>
                <th>No</th>
                <th>Name</th>
                <th>Profession</th>
                <th>Email</th>
                <th>Class</th>
                <th>Avatar</th>
            </thead>
            <?php $no=1 ; ?>
            @foreach ($data as $c)
            
            <tbody>
                <td> {{$no}} </td>
                <td>{{ $c->name }}</td>
                <td>{{ $c->profession }}</td>
                <td>{{ $c->email }}</td>
                <td>{{ $c->title }}</td>
                <td> <img class="img-thumbnail " width="150px" src="{{ url('/data_file/'.$c->avatar) }}"></td>
            </tbody>
            <?php $no++ ?>
            @endforeach
           
        </table>
        <div class="col-sm-12 justify">
            {{$data->links()}}
        </div>
    




@stop