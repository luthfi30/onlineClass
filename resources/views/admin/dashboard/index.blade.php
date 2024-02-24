@extends('admin.layout')

@section('content')
<div class="content">

    <h1>Admin Dashboard</h1>
    <br><br>
    <!-- First Row  -->
    <div class="row">
        <div class="col-md-3 col-lg-6 col-xs-3">
            <div class="media widget-media p-4 bg-white border">
                <div class="icon rounded-circle mr-4 bg-primary">
                    <i class="mdi mdi-account-multiple font-size-20 text-white "></i>
                </div>
    
                <div class="media-body align-self-center">
                    <h4 class="text-primary mb-2">{{$maxuser}}</h4>
                    <p>Student</p>
                </div>
            </div>
        </div>

        <div class="col-md-3 col-lg-6 col-xs-3">
            <div class="media widget-media p-4 bg-white border">
                <div class="icon bg-success rounded-circle mr-4">
                    <i class="mdi mdi-account-multiple-outline font-size-20 text-white "></i>
                </div>
    
                <div class="media-body align-self-center">
                    <h4 class="text-primary  mb-2">{{$maxmentor}}</h4>
                    <p>Mentor</p>
                </div>
            </div>
        </div>
    
        <div class="col-md-3 col-lg-6 col-xs-3">
            <div class="media widget-media p-4 bg-white border">
                <div class="icon rounded-circle bg-warning mr-4">
                    <i class="mdi mdi-cart-outline font-size-20 text-white "></i>
                </div>
    
                <div class="media-body align-self-center">
                    <h4 class="text-primary mb-2">{{$transaction}} </h4>
                    <p>Transaction Success</p>
                </div>
            </div>
        </div>
    
        <div class="col-md-3 col-lg-6 col-xs-3">
            <div class="media widget-media p-4 bg-white border">
                <div class="icon rounded-circle mr-4 bg-danger">
                    <i class="mdi mdi-cart-outline font-size-20 text-white "></i>
                </div>
    
                <div class="media-body align-self-center">
                    <h4 class="text-primary mb-2">@currency($totalsales->totalsales)</h4>
                    <p>Total Sales</p>
                </div>
            </div>
        </div>
        
    </div>
    
    <div class="row mt-5">
        <div id="chart">

        </div>
    </div>
    
   
</div>
@stop

@section('chart')
<script src="https://code.highcharts.com/highcharts.js"></script>
<script>
  Highcharts.chart('chart', {
    chart: {
        type: 'column'
    },
    title: {
        text: 'Best Seller'
    },
    subtitle: {
        text: 'Best Seller Class'
    },
    xAxis: {
        categories: {!!json_encode($chartName)!!} ,
        crosshair: true
    },
    yAxis: {
        min: 0,
        title: {
            text: 'Jumlah Order'
        }
    },
    tooltip: {
        headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
        pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
            '<td style="padding:0"><b> {point.y:.f}</b></td></tr>',
        footerFormat: '</table>',
        shared: true,
        useHTML: true
    },
    plotOptions: {
        column: {
            pointPadding: 0.2,
            borderWidth: 0
        }
    },
    series: [{
        name: 'Best Seller',
        data: {!!json_encode($chartPrice)!!}
    }]
});
      
</script>
@endsection