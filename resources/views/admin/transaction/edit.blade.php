@extends('admin.layout')
@section('sub-judul','Form Update Transaction')
@section('content')

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
    <form action="{{ route('transaction.update', $order->id) }}" method="POST" enctype="multipart/form-data" >
        @csrf
        @method('PUT')
        <div class="form-row">
    
            <div class="col-md-12 mb-3">
                <label for="">Nama Student :</label>
                <select name="user_id" class="form-select" >
                    <option value="{{$order->user_id}}">{{$order->user->name}}</option>
                </select>
            </div>
            
            @foreach ($mycourse as $item)
            <div class="col-md-6 mb-3">
                <label for="validationServer01">Nama Kelas</label>
                <input type="text" class="form-control" id="validationServer01" placeholder="Nama Kelas" name="course_id" value="{{$item->course->title}}" readonly>
            </div>
            
            <div class="col-md-6 mb-3">
                <label for="validationServer01">Harga Item</label>
                <input type="number" class="form-control" id="validationServer01" placeholder="Masukan Harga" name="item_price" value="{{$item->item_price}}" readonly>
            </div>
            @endforeach


            <div class="col-md-6 mb-3">
                <label for="type">Status </label>
                <select class="form-select" aria-label="Default select example" name="status">
                    <option>Pilih Level</option>
                    <option value="pending"  {{ $order->status == 'pending' ? 'selected' : '' }}>Pending</option>
                    <option value="success" {{ $order->status == 'success' ? 'selected' : '' }}>Success</option>
                </select>
            </div>


            <div class="col-md-6 mb-3">
                <label for="validationServer01">Kode Unik</label>
                <input type="number" class="form-control" id="validationServer01" placeholder="Masukan Harga" name="kode" value="{{$order->kode}}" readonly>
            </div>
            
            <div class="col-md-6 mb-3">
                <label for="validationServer01">Total Harga</label>
                <input type="number" class="form-control" id="validationServer01" placeholder="Masukan Harga" name="price" value="{{$order->price}}" readonly>
            </div>

            <div class="col-md-6 mb-3">
                <label for="validationServer01">Jumlah Pembayaran</label>
                <input type="number" class="form-control" id="validationServer01" placeholder="Masukan Harga"  value="{{$order->price+$order->kode}}" readonly>
            </div>
          
        <input type="submit" class="btn btn-primary">
    </div>
    </form>
    


    
@endsection