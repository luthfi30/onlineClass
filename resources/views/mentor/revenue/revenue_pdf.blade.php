<!DOCTYPE html>
<html>
<head>
	<title>Laporan Data Pendapatan</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>
<style>
        table, td, th {
            border: 1px solid black;
        }

        table {
            border-collapse: collapse;
            width: 100%;
                }

        .table-no-border tr td th{
            border : none;
        }

        td {
            height: 20px;
            vertical-align: middle;
            text-align: center;
             font-size: 11px;
        }
        th{
             height: 20px;
            font-size: 12px;
        }
        
  </style>
            <div class="button mb-3">
                <center>
                <h3>Laporan Data Pendapatan</h3>
	            </center>
            </div>
                                
            <table class="table table-sm table-responsive-sm table-bordered table-hover">
                <thead>
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Nama Kelas</th>
                        <th scope="col">harga Kelas</th>
                        <th scope="col">Jumlah Terjual</th>
                        <th scope="col">Pendapatan</th>
                    </tr>
                </thead>
                   
                <tbody>
                    <?php $no=1 ; ?>
                    @foreach ($revenue as $item)
                    <tr>
                        <td scope="row">{{$no}} </td>
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
                        <th colspan="4">Total Pendapatan</th>
                        <th scope="col"><b>@currency($totalrevenue->pendapatan)</b></th>
                    </tr>
                 </tfoot>
            </table>
</body>
</html>