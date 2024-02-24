    @extends('frontpanel.layout')
    @section('sub-judul','Form Upload Bukti')
    @section('content')

    <section id="why-us" class="why-us">
    </section><!-- End Why Us Section -->

    <section id="popular-courses" class="courses">
    <div class="container" data-aos="fade-up">           
        <div class="row" data-aos="zoom-in" data-aos-delay="100">
               <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                    @if(count($errors) > 0)
                @foreach ($errors->all() as $error)
                    <div class="alert alert-highlighted alert-danger" role="alert">
                        {{ $error }}
                    </div>
                    @endforeach
                @endif
                @if(Session::has('success'))
                    <div class="alert alert-highlighted alert-success" role="alert">
                        {{ Session('success') }}
                    </div>
                @endif


                <div class="card mb-3">
                    <div class="card-body">
                    <h4>Pesanan anda sudah sukses di chekcout selanjutnya silahkan transfer
                            ke Rekening <strong> Bank BRI Nomer Rekening 31123-1196976-98393</strong> 
                        dengan nominal 
                            @if($order->price > 0)
                            <strong> @currency($order->price+$order->kode)</strong>
                            @else
                            <strong> @currency($order->price)</strong>
                            @endif .
                    </h4>  
                    </div>
                </div>
                <h3 class="mb-3"><b>Upload Bukti Transfer</b></h3>
                <form action="{{ route('transfer.store', $order->id) }}" method="POST" enctype="multipart/form-data" >
                    @csrf
                    @method('PUT')
                    <div class="form-row mb-2">
                        <div class="col-md-12 mb-12">
                            <label for="validationServer02">Bukti Transfer</label>
                            <input type="file" class="form-control" id="validationServer02" placeholder="" name="foto" > 
                        </div>
                    </div>
                    <input type="submit" class="btn btn-primary">
                   <a href="{{ route('history.transaction') }}" class="btn btn-primary">Back</a>
                </form>
                </div>
              </div>
            </div>
        </div>
    </div>
</section>
        

        
    @endsection