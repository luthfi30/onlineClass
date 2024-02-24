
@extends('admin.layout')
@section('sub-judul','')
@section('content')

<center><h1>Laporan Revenue {{$user->name}}</h1></center>

 <br>
      <form action="{{route('cetak.laporan.revenue')}}" method="GET">
                        <div class="input-group mb-3">
                            <input type="date" class="form-control" name="start_date">
                            <input type="date" class="form-control" name="end_date">
                            <input type="hidden" class="form-control" name="id" value="{{$user->id}}">
                            <button class="btn btn-primary" type="submit" ><i class="fa fa-print"> Cetak Pdf</i></button>
                        </div>
        </form>

 


@stop