<!DOCTYPE html>
<html>
<head>
	<title>Laporan Data Kurses</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
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
</head>
<body>
             <div class="button mb-3">
                <center>
                <h3>Laporan Data Kelas</h3>
	            </center>
            </div>
                                
             <table class="table table-border">
            <tr>
                <th>No</th>
                <th>Name</th>
                <th>Mentor</th>
                <th>Category</th>
                <th>Level</th>
                <th>Type</th>
                <th>Status</th>
                <th>Price</th>
                
            </tr>
             <?php $no=1 ; ?>
                @foreach ($course as $c)
            <tr>
                    <td> {{$no}} </td>
                    <td>{{ $c->title }}</td>
                    <td>{{ $c->mentor->name }}</td>
                    <td>{{ $c->category->name }}</td>
                    <td>{{$c->level}}</td>
                    <td>{{$c->type}}</td>
                    <td>{{ $c->status }}</td>
                    <td>@currency($c->price) </td>
                  
            </tr>
                <?php $no++ ?>
            @endforeach
           
        </table>
</body>
</html>