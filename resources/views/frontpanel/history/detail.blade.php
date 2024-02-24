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
                
                <div class="card mt-2">
                <div class="card-body">
                    <h3><i class="fa fa-shopping-cart"></i> Detail Order</h3>
                    @if(!empty($order))
                    <p style="text-align:right">Tanggal Pesanan : {{$order->created_at->toDateString()}}</p>
               
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama Kelas</th>
                                <th>Harga</th>
                                {{-- <th>Aksi</th> --}}
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no=1; ?>
                            @foreach ($order_detail as $item)
                            <tr>
                                <td>{{$no++}}</td>
                                <td>{{$item->course->title}}</td>
                                <td>@currency($item->item_price)</td>
                                {{-- <td>
                                    <form action="{{ route('checkout.delete',$item->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm"  onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">
                                        <i class="fa fa-trash" ></i></button>
                                    </form>
                                </td> --}}
                            </tr>
                            @endforeach
                            <tr>
                                <td colspan="2" align="right"><strong>Total Harga :</strong></td>
                                <td><strong> @currency($order->price)</strong></td>
                            </tr>
                            @if($order->price == 0)

                            <tr>
                                <td colspan="2" align="right"><strong>Total Pembayaran :</strong></td>
                                <td><strong> @currency($order->price)</strong></td>
                            </tr>
                            @else
                            <tr>
                                <td colspan="2" align="right"><strong>Kode Unik :</strong></td>
                                <td><strong> @currency($order->kode)</strong></td>
                            </tr>
                            <tr>
                                <td colspan="2" align="right"><strong>Total Pembayaran :</strong></td>
                                <td><strong> @currency($order->price+$order->kode)</strong></td>
                            </tr>
                            @endif
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