
@extends('admin.layout')
@section('sub-judul','Revenue Mentor')
@section('content')

    @if (Session::has('success'))
    <div class="alert alert-highlighted alert-success" role="alert">
        {{ Session('success') }}
    </div>
    @endif

       

        <table class="table table-hover">
            <thead>
                <th>No</th>
                <th>Name</th>
                <th>profile</th>
                <th>Email</th>
                <th>Profession</th>
                <th>Actions</th>
            </thead>
            <?php $no=1 ; ?>
            @foreach ($mentor as $c)
            
            <tbody>
                <td> {{$no}} </td>
                <td>{{ $c->name }}</td>
                <td>
                    @if($c->avatar == '')
                    <img width="150px" src="{{ url('/data_file/no-image.jpg') }}">
                    @else
                     <img width="150px" src="{{ url('/data_file/'.$c->avatar) }}">
                    @endif
                </td>
                <td>{{ $c->email }}</td>
                <td>{{ $c->profession }}</td>
                
               
                
                <td> 
                 <a href="{{route('laporan.form.revenue', $c->id)}}" class="btn btn-primary btn-md"><i class="fa fa-eye"> lihat Revenue</i></a> 
                </td>
            </tbody>
            <?php $no++ ?>
            @endforeach
           
        </table>
        <div class="col-sm-12 justify">
            {{$mentor->links()}}
        </div>
    




@stop
