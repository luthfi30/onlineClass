
@extends('admin.layout')
@section('sub-judul','Category Table')
@section('content')

    @if (Session::has('success'))
    <div class="alert alert-highlighted alert-success" role="alert">
        {{ Session('success') }}
    </div>
    @endif

        <div class="btn-category mb-3">
            <a href="{{ route('category.create')  }}" class="btn btn-primary"><i class="fa fa-plus"> Add Category</i></a>   
        </div>
        

        <table class="table table-hover">
            <thead>
                <th>No</th>
                <th>Name</th>
                <th>Slug</th>
                <th>Thumbnail</th>
                <th>Action</th>
            </thead>
            <?php $no=1 ; ?>
            @foreach ($category as $c)
            
            <tbody>
                <td> {{$no}} </td>
                <td>{{ $c->name }}</td>
                <td>{{ $c->slug }}</td>
                <td>{{ $c->thumbnail }}</td>
                <td> 
                    <form action="{{ route('category.destroy',$c->id) }}" method="POST">
 
                    <a href="{{route('category.edit', $c->id)}}" class="btn btn-warning"><i class="fa fa-edit"></i></a> |
                    
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger " onclick="return confirm('Data Ini adalah Foreign Key Pada Data Course, Menghapus Data Ini Akan Menghapus Data Course Dengan Id Ini Secara otomatis, Apakah Anda yakin ingin menghapus data ini?')"><i class="fa fa-trash"></i></button>
                    </form>
                </td>
            </tbody>
            <?php $no++ ?>
            @endforeach
           
        </table>
        <div class="col-sm-12 justify">
            {{$category->links()}}
        </div>
    



@stop