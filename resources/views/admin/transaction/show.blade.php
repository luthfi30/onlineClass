@extends('admin.layout')
@section('sub-judul','Detail Transaction')
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
   


          <a href="{{ route('transaction.index') }}" class="btn btn-primary btn-md">Back</a> 
         <a href="{{ route('cetak.detail.transaction',$order->id) }}" class="btn btn-primary btn-md">cetak</a> 
      
   
        <div class="row mt-3">
            <div class="col-md-12">
                <div class="invoice-title">
                  <h5 class="pull-right">Order A-{{$order->id}}
                </div>
                <hr>
                <div class="row">
                    <div class="col-md-6">
                        <address>
                        <strong>Billed To:</strong><br>
                        {{$order->user->name}}<br>
                        </address>
                    </div>
                    <div class="col-md-6 text-right">
                        <address>
                            <strong>Order Date:</strong><br>
                            {{$order->created_at->format('d M Y')}}<br>
                        </address>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <address>
                            <strong>Email:</strong><br>
                            {{$order->user->email}}
                        </address>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="row mt-2">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title"><strong>Order summary</strong></h3>
                    </div>
                    <div class="panel-body">
                        <div class="table-responsive">
                            <table class="table table-condensed">
                                <thead>
                                    <tr>
                                        <td><strong>Item</strong></td>
                                        <td class="text-center"><strong>Status</strong></td>
                                        <td></td>
                                        <td class="text-right"><strong>Price</strong></td>
                                    </tr>
                                </thead>
                                <tbody>
                                    <!-- foreach ($order->lineItems as $line) or some such thing here -->
                                    @foreach ($mycourse as $item)
                                    <tr>
                                        <td>{{$item->course->title}}</td>
                                        <td class="text-center">
                                            @if($order->status == 'success')
                                            <h6><span class="badge badge-success">{{$order->status}}</span></h6> 
                                             @else
                                             <h6><span class="badge badge-danger">{{$order->status}}</span></h6>
                                             @endif    
                                        </td>
                                        <td></td>
                                        <td class="text-right">@currency($item->course->price)</td>
                                    </tr>
                                   @endforeach
                                    <tr>
                                        <td class="thick-line"></td>
                                        <td class="thick-line"></td>
                                        <td class="thick-line text-center"><strong>Subtotal</strong></td>
                                        <td class="thick-line text-right">@currency($order->price)</td>
                                    </tr>
                                    <tr>
                                        <td class="no-line"></td>
                                        <td class="thick-line"></td>
                                        <td class="no-line text-center"><strong>Kode Unik</strong></td>
                                        <td class="no-line text-right">{{$order->kode}}</td>
                                    </tr>
                                    <tr>
                                        <td class="no-line"></td>
                                        <td class="thick-line"></td>
                                        <td class="no-line text-center"><strong>Total</strong></td>
                                        <td class="no-line text-right">@currency($order->price+$order->kode)</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
  
      
    


    
@endsection