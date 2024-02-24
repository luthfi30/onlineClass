
@extends('mentor.layout')
@section('sub-judul','Daftar Order')
@section('content')

   
        {{-- <div class="btn-user-admin mb-3">
            <a href="{{ url('admin/mentor')  }}" class="btn btn-primary">Back</a>   
        </div>
         --}}

         
        <div class="row">
            <div class="col-lg-12">
                <div class="card card-default" profile-data-height="">
                    <div class="card-header">
                        <h2>Kelas</h2>
                    </div>
                <div class="card-body">
                            
                     <table class='table table-bordered'>
                        <thead>
                            <tr>
                                <th scope="col">No</th>
                           
                                <th scope="col">Nama Kelas</th>
                                {{-- <th scope="col">Aksi</th> --}}
                            </tr>
                        </thead>
    
                        <tbody>
                             <?php $no=1 ; ?>
                            @foreach ($kelas as $item)
                           
                            <tr>
                                <td scope="row">{{$no}} </td>
                                
                                <td>{{$item->title}}</td>
                                {{-- <td>
                                    <a href="{{route('course.index')}}" class="btn btn-warning">Lihat Kelas</a> 
                                </td> --}}
                            </tr>
                                <?php $no++ ?>
                            @endforeach
                        </tbody>
                    </table>
                </div>

       
            </div>

            <div class="button mb-3">
                 <a href="{{route('mentor.cetak.revenue')}}" class="btn btn-primary" target="_blank"><i class="fa fa-print"> Cetak Pdf</i></a>
            </div>

           
           
            <div class="row">
                <div class="col-lg-12">
                    <div class="card card-default" profile-data-height="">
                        <div class="card-header">
                            <h2>Revenue</h2>
                            
                        </div>
                        <div class="card-header">
                             <h4>Sharing Profit revenue kepada mentor adalah sebesar <b>40%</b> dari total harga kelas</h4>
                        </div>
                        
                    <div class="card-body mt-0">
                         <table class='table table-bordered'>
                            <thead>
                                <tr>
                                    <th scope="col">No</th>
                                    <th>Tanggal</th>
                                    <th scope="col">Nama Kelas</th>
                                    <th scope="col">harga Kelas</th>
                                    <th scope="col">Jumlah Terjual</th>
                                    <th scope="col">Pendapatan</th>
                                </tr>
                            </thead>
        
                            <tbody>
                                     <?php $no=1; ?>
                                @foreach ($revenue as $item)
                           
                                <tr>
                                    <td scope="row">{{$no}}</td>
                                    <td>{{$item->created_at}}</td>
                                    <td>{{$item->title}}</td>
                                    <td>@currency($item->item_price)</td>
                                    <td>{{$item->total_terjual}}</td>
                                    <td><b>@currency($item->pendapatan)</b></td>
                                    
                                </tr>
                                <?php $no++ ?>
                                @endforeach
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th colspan="5">Total Pendapatan</th>
                                    <th scope="col"><b>@currency($totalrevenue->pendapatan)</b></th>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
            
            
        </div>




@stop