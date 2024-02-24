
@extends('admin.layout')
@section('sub-judul','admin Table')
@section('content')

    @if (Session::has('success'))
    <div class="alert alert-highlighted alert-success" role="alert">
        {{ Session('success') }}
    </div>
    @endif

        <div class="btn-user-admin mb-3">
            <a href="{{ route('user-admin.create')  }}" class="btn btn-primary"><i class="fa fa-plus"> Add Admin</i></a>   
        </div>
        

        <table class="table table-hover">
            <thead>
                <th>No</th>
                <th>Name</th>
                <th>Avatar</th>
                <th>Profession</th>
                <th>Role</th>
                <th>Email</th>
                <th>Actions</th>
            </thead>
            <?php $no=1 ; ?>
            @foreach ($user as $c)
            
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
                <td>{{ $c->profession }}</td>
                <td>{{ $c->role }}</td>
                <td>{{ $c->email }}</td>
                
                
                <td> 
                    <form action="{{ route('user-admin.destroy',$c->id) }}" method="POST">
                    <a href="{{route('user-admin.show', $c->id)}}" class="btn btn-primary btn-md"><i class="fa fa-eye"></i></a> |
                    <a href="{{route('user-admin.edit', $c->id)}}" class="btn btn-warning"><i class="fa fa-edit"></i></a> |
            
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger " onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')"><i class="fa fa-trash"></i></button>
                    </form>
                </td>
            </tbody>
            <?php $no++ ?>
            @endforeach
           
        </table>
        <div class="col-sm-12 justify">
            {{$user->links()}}
        </div>
    




@stop