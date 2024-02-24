@extends('frontpanel.layout')

@section('content')


<section id="why-us" class="why-us">
</section><!-- End Why Us Section -->

<section id="popular-courses" class="courses">
    <div class="container" data-aos="fade-up">           
        <div class="row" data-aos="zoom-in" data-aos-delay="100">
            
            <div class="col-md-12">
            @if (Session::has('success'))
                <div class="alert alert-highlighted alert-success" role="alert">
                    {{ Session('success') }}
                </div>
            @endif
                <div class="card">
                <div class="card-body">
                    <h3><i class="fa fa-shopping-cart"></i> Order History</h3>
                    @if(!empty($order))
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Tanggal Pemesanan</th>
                                <th>Status</th>
                                <th>Jumlah Harga</th>
                                <th>Bukti Transfer</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no=1; ?>
                            @foreach ($order as $item)
                            <tr>
                                <td>{{$no++}}</td>
                                <td>{{$item->created_at->toDateString()}}</td>
                                <td>{{$item->status}}</td>
                                @if($item->price == 0)
                                <td>@currency($item->price)</td>
                                @else
                                <td>@currency($item->price+$item->kode)</td>
                                @endif
                               <td>
                                @if($item->foto == '')
                                    <img width="150px" src="{{ url('/data_file/no-image.jpg') }}">
                                    @else
                                   <a href="{{ url('/data_file/'.$item->foto) }}" target="_blank"> <img width="150px" src="{{ url('/data_file/'.$item->foto) }}"></a>
                                @endif
                                </td>
                                    <td>
                                        <a href="{{route('history.detail', $item->id)}}" class="btn btn-success btn-md">
                                             Detail</a>
                                          <a href="{{route('upload.transfer', $item->id)}}" class="btn btn-warning btn-md">
                                             Upload</a>    
                                    </td>
                               
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    @endif
                </div>
              </div>
            </div>
        </div>
    </div>
</section>

@stop