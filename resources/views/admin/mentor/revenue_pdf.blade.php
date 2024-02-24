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
		<h3>Laporan Revenue  </h4>
	</center>
        <table border="0">
    
     <tr>
    <td width="100">Tanggal Laporan</td>
    <td width="10">:</td>
    <td width="250">{{date('d-m-Y')}} </td>
  </tr>
  <tr>
    <td>Nama Penerima</td>
    <td>:</td>
    <td>{{$user->name}}</td>
  </tr>
  <tr>
    <td>Email</td>
    <td>:</td>
    <td>{{$user->email}}</td>
  </tr>
    </table>

    <br>
	<table class='meta'>
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
           <?php $no=1 ; ?>
                    @foreach ($revenue as $item)  
                <tbody>
                    <tr>
                        <td>{{$no}} </td>
                        <td>{{$item->created_at}}</td>
                        <td>{{$item->title}}</td>
                        <td>@currency($item->item_price)</td>
                        <td>{{$item->total_terjual}}</td>
                        <td><b>@currency($item->pendapatan)</b></td>
                    </tr>
                </tbody>
                <?php $no++ ?>
                @endforeach
            <tfoot>
                <tr>
                    <th colspan="5">Total Pendapatan</th>
                    <th scope="col"><b>@currency($totalrevenue->pendapatan)</b></th>
                </tr>
            </tfoot>
            </tbody>
	</table>
<br>
<p align='right' style="font-size: 11px">JAKARTA, {{date('d-m-Y')}} <br>
 <br><br> <br><br> <br><br>
( Luthfirrahman )</p>;
</body>
</html>