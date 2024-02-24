
@extends('admin.layout')
@section('sub-judul','Transaction Table')
@section('content')

    @if (Session::has('success'))
    <div class="alert alert-highlighted alert-success" role="alert">
        {{ Session('success') }}
    </div>
    @endif

      <form action="{{route('transaction.index')}}" method="GET">
                        <div class="input-group mb-3">
                            <input type="date" class="form-control" name="start_date">
                            <input type="date" class="form-control" name="end_date">
                            <button class="btn btn-primary" type="submit"><i class="mdi mdi-filter-variant"> Filter</i></button>
                        </div>
        </form>

    <div class="button-cetak mb-3">
         <a href="{{route('transaction.index')}}" class="btn btn-info"><i class="mdi mdi-refresh"> Refresh</i></a>
    </div>
      
       
        <p style="text-align:right"></p>
        <table class="table table-hover">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Tanggal Pemesanan </th>
                    <th>Nama Pemesan </th>
                    <th>Harga</th>
                    <th>Kode Unik</th>
                    <th>Status</th>
                    <th>Total Harga</th>
                    <th>Bukti Transfer</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php $no=1; ?>
                @foreach ($order as $item)
                <tr>
                    <td>{{$no++}}</td>
                    <td>{{$item->created_at->format('d M Y')}}</td>
                    <td>{{$item->user->name}}</td>
                    <td>@currency($item->price)</td>
                    <td>@currency($item->kode)</td>
                   
                     <td>
                     @if($item->status == 'success')
                     <a href="{{route('admin.transaction.status', $item->id)}}" class="btn btn-danger">Batalkan Verifikasi</a>
                     @else
                     <a href="{{route('admin.transaction.status', $item->id)}}" class="btn btn-success">Verifikasi</a>

                     @endif
                    </td>
                     <td><strong>@currency($item->price+$item->kode)</strong> </td>
                     <td>
                        @if($item->foto == '')
                            <img width="150px" src="{{ url('/data_file/no-image.jpg') }}">
                            @else
                            <a href="{{ url('/data_file/'.$item->foto) }}" target="_blank"> <img width="150px" src="{{ url('/data_file/'.$item->foto) }}"></a>
                        @endif
                        </td>
                    <td>
                        <a href="{{route('transaction.show', $item->id)}}" class="btn btn-primary btn-md"><i class="fa fa-eye"></i></a> |
                     <a href="{{route('transaction.edit', $item->id)}}"  class="btn btn-warning btn-md" ><i class="fa fa-edit"></i></a> 
                    </td>
                </tr>
                @endforeach
                <tfoot>
                    <tr>
                        <th colspan="6">Total Transaksi</th>
                        <th scope="col"><b>@currency($transaction->totalsales)</b></th>
                    </tr>
                 </tfoot>
            </tbody>
        </table>
        
        <div class="col-sm-12 justify">
            {{$order->links()}}
        </div>
    



@stop