
@extends('mentor.layout')
@section('sub-judul','Chapter Table')
@section('content')

    @if (Session::has('success'))
    <div class="alert alert-highlighted alert-success" role="alert">
        {{ Session('success') }}
    </div>
    @endif

        <div class="btn-chapter mb-3">
            <a href="{{ route('mentor.create.chapter')  }}" class="btn btn-primary"><i class="fa fa-plus"> Add Chapter</i></a>   
        </div>
        

         <table id="table_id" class="table table-striped table-bordered" style="width:100%">
            <thead>
                <th>No</th>
                <th>Name</th>
                <th>Course</th>
                <th>Action</th>
            </thead>
            <?php $no=1 ; ?>
            @foreach ($chapter as $c)
            
            <tbody>
                <td> {{$no}} </td>
                <td>{{ $c->name }}</td>
               
                <td>{{ $c->title }}</td>
                <td> 
                    <form action="{{ route('mentor.destroy.chapter',$c->id) }}" method="POST">
 
                    <a href="{{route('mentor.edit.chapter', $c->id)}}" class="btn btn-warning"><i class="fa fa-edit"> </i></a> |
                    
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger " onclick="return confirm('Data Ini adalah Foreign Key Pada Data Lain, Menghapus Data Ini Akan Menghapus Data Lain Secara otomatis, Apakah Anda yakin ingin menghapus data ini?')"><i class="fa fa-trash"> </i></button>
                    </form>
                </td>
            </tbody>
            <?php $no++ ?>
            @endforeach
           
        </table>
        <div class="col-sm-12 justify">
            {{$chapter->links()}}
        </div>
    



@stop