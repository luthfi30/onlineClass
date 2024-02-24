
@extends('admin.layout')
@section('sub-judul','Detail Course')
@section('content')

   
        <div class="btn-user-admin mb-3">
            <a href="{{ url('admin/course')  }}" class="btn btn-primary">Back</a>   
        </div>
        
        <div class="row">
            <div class="col-md-12">
                <div class="card card-default">
                    <div class="card-header card-header-border-bottom">
                        <h2>Detail Course</h2>
                    </div>
        
                    <div class="card-body">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Kategori</th>
                                    <th>Kelas</th>
                                    <th>chapter</th>
                                    <th>video</th>
                                </tr>
                            </thead>
        
                            <tbody>
                                <tr>
                                    <td scope="row">1</td>
                                    <td>{{$course->category->name}}</td>
                                    <td>{{$course->title}}</td>
                                    <td rowspan="2">
                                    @foreach ($chapter as $item)
                                    {!! nl2br(e($item->cname))!!}
                                    @endforeach
                                </td>
                                <td rowspan="2">
                                    @foreach ($chapter as $item)
                                    {!! nl2br(e($item->lename))!!}
                                    @endforeach
                                </td>
                                </tr>
        
                             
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

@stop




