<!DOCTYPE html>
<html>
<head>
	<title>Laporan Data Transaksi</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>
	<style>
        table.meta {
            border: 1px solid black;
        }

        table.meta {
            border-collapse: collapse;
            width: 100%;
                }

        table.metatr td th{
            border : none;
        }

        .meta td {
            height: 20px;
            vertical-align: middle;
            text-align: center;
             font-size: 11px;
             border: 1px solid black;
        }
        .meta th{
             height: 20px;
            font-size: 12px;
            border: 1px solid black;
        }
        
        td{
            font-size: 11px;
        }
  </style>
	
	<center>
		<h3>Laporan Data Transaksi</h4>
	</center>
    <table border="0">
    
     <tr>
    <td width="100">Tanggal Laporan</td>
    <td width="10">:</td>
    <td width="250">{{date('d-m-Y')}} </td>
  </tr>
  <tr>
    <td>Nama Admin</td>
    <td>:</td>
    <td>{{Auth::User()->name}}</td>
  </tr>
  <tr>
    <td>Email</td>
    <td>:</td>
    <td>{{Auth::User()->email}}</td>
  </tr>
    </table>

    <br>
	<table class='meta'>
		  <thead>
                <tr>
                    <th>No</th>
                    <th>Tanggal Pemesanan </th>
                    <th>Nama Pemesan </th>
                    <th>Harga</th>
                    <th>Kode Unik</th>
                     <th>Status</th>
                    <th>Total Harga</th>
                   
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
                       <p>{{$item->status}}</p> 
                        @else
                        <p>{{$item->status}}</p>
                        @endif
                    
                    </td>
                    <td><strong>@currency($item->price+$item->kode)</strong> </td>
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
 <br><br>
<p align='right' style="font-size: 11px">JAKARTA, {{date('d-m-Y')}} <br>
 {{-- <br><br> <br><br> <br><br> --}}
 {{-- <img width="150px" src="https://class.buildwithangga.com/themes/front/images/logo_bwa_new.svg"> --}}
( Luthfirrahman )</p>;
</body>
</html>