<!DOCTYPE html>
<html lang="en">

<head>
    @include('frontend.includes.head')
    <link rel="stylesheet" href="{{ asset('frontend/css/home.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/sale.css')}}">
    <script src="https://cdn.anychart.com/releases/8.0.0/js/anychart-base.min.js"></script>
    <script src="https://cdn.anychart.com/releases/8.0.0/themes/dark_earth.min.js" type="text/javascript"></script>


    <!-- <link href="{{ asset('frontend/css/all.css')}}" rel="stylesheet" type="text/css"> -->
</head>
<style>
    .tabs-boot {
        margin: 20px 0px;
        / border: 1px solid #eaebec; /
    }

    .tab-content>.active {
        background-color: white;
    }

    .tab-content>.active>h2 {
        color: black;
    }

    .tab-content>.active>p {
        color: black;
    }

    a.nav-link.active.show {
        border-radius: 0px;
    }

    h1.tab-text {
        margin: 0;
        padding: 16px 0;
        font-size: 20px;
        font-weight: 500;
        line-height: 26px;
        text-transform: capitalize;
        color: #2f3d46;
        text-transform: none;
        text-align: center;
    }
    .tabs-boot > ul.nav.nav-tabs > li.nav-item > a.nav-link.active {
        border-bottom: 3px solid blue;
        border-radius: 0;
    }
    table {
        width: 100%;
        margin-bottom:10px;
    }
    tr.table-section-inner-heading {
        background-color: #f4f5f4;
    }
    tr.table-section-inner-heading > th ,td {
    padding:8px;
    }
    td.main-section-underline {
        color: blue;
        text-decoration: underline;
    }
    td {
        border-bottom: 2px solid #f4f5f4;
        border-left: 2px solid #f4f5f4;
        border-right: 2px solid #f4f5f4;
    }
    .center-text{
        text-align:center;
        font-size:12px;
    }
    .heading-center-section{
        text-align:center;
        margin:10px 0px;
    }
    .heading-center-section > p{
        font-size:12px;
    }
    @media only screen and (max-width:425px){
        .tabs-boot > ul.nav.nav-tabs > li.nav-item > a.nav-link > span {
        font-size: 12px;
    }
    }
</style>
<body>
    @include('frontend.includes.header')
    <div class="pg-opt">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h1 class="page-title">Average Trends {{$citytitle}}<span></span></h1>
                </div>
            </div>
        </div>
    </div>
    <section class="container">
        <div class="row">
            <div class="tabs-boot">
                @if($type === 'sale')
                    <ul class="nav nav-tabs">
                        <li class="nav-item">
                            <a class="nav-link" href="{{ url('/market/locality/sale/'.$city) }}">
                                <span>All</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ url('/market/locality/sale/bed/'.$city.'/1') }}">
                                <span>Bed 1</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ url('/market/locality/sale/bed/'.$city.'/2') }}">
                                <span>Bed 2</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ url('/market/locality/sale/bed/'.$city.'/3') }}">
                                <span>Bed 3</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ url('/market/locality/sale/bed/'.$city.'/4') }}">
                                <span>Bed 4</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ url('/market/locality/sale/bed/'.$city.'/5') }}">
                                <span>Bed 5</span>
                            </a>
                        </li>
                    </ul>
                @else
                <ul class="nav nav-tabs">
                        <li class="nav-item">
                            <a class="nav-link" href="{{ url('/market/locality/rent/'.$city) }}">
                                <span>All</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ url('/market/locality/rent/bed/'.$city.'/1') }}">
                                <span>Bed 1</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ url('/market/locality/rent/bed/'.$city.'/2') }}">
                                <span>Bed 2</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ url('/market/locality/rent/bed/'.$city.'/3') }}">
                                <span>Bed 3</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ url('/market/locality/rent/bed/'.$city.'/4') }}">
                                <span>Bed 4</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ url('/market/locality/rent/bed/'.$city.'/5') }}">
                                <span>Bed 5</span>
                            </a>
                        </li>
                    </ul>
                @endif

                 <div class="tab-content">
                    <div id="tab1" class="tab-pane active">
                        <div class="pg-opt">
                            <div class="container">
                                <div class="row">
                                    <div class="col-md-12">
                                        <h1 class="tab-text">Average Trends Chart<span></span></h1>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div id="containers" style="width: 100%; height: 50vh;"></div>
                    </div>
                   
                </div>

            </div>
        </div>
    </section>

<section class="table-section">
    <div class="container text-center">
        <table>
            <tr class="table-section-inner-heading">
                <th>Month</th>
                <th>Average Price</th>
                <th>Max. Property Price</th>
                <th>Min. Property Price</th>
                <th>Total Property Count</th>
                <th>New Property Added</th>
            </tr>
            @foreach ($datalist as $data )
            <tr>
                <td class="fw-bold">{{$data->months}}</td>
                <td>₦{{$data->avgprice}}</td>
                <td>₦{{$data->maxprice}}</td>
                <td>₦{{$data->minprice}}</td>
                <td>{{$data->count}}</td>
                <td>{{$data->date}}</td>
            </tr>
            @endforeach
        </table>
        <!-- <p class="center-text">This report has been generated using all Houses for Sale in Abuja listed on Nigeria Property Centre. The prices are calculated using the median of all listed property in the locality in Abuja.</p> -->
    </div>
</section>
<section class="heading-section">
    <div class="container">
        <div class="row pb-4">
            <!-- <div class="heading-center-section">
                <h3>Popular Question</h3>
                <h5>What is the price of houses for sale in Abujam Nigeria?</h5>
                <p>The average price of houses for sale in Abuja, Nigeria is ₦127,340,000.</p>
            </div> -->
        </div>
    </div>
</section>
<section>
    <div class="container hidden-xs hidden-sm hidden-ma">
        <div class="row">
            <div class="col-sm-12">
                <ol class="breadcrumbs">
                    <li><a href="#">Home</a></li>
                    <li>
                        <a href="#">
                            <span>/ Average Property Prices</span>
                        </a>
                    </li>
                </ol>
            </div>
        </div>
    </div>

</section>
    @include('frontend.includes.footer')
</body>
<script src="{{ asset('frontend/js/scripts.js')}}"></script>
<script>
//First Chart

    var datalist = @json($datalist);
    var months = [];
    var average = [];

    for(var i =0; i<datalist.length; i++ ){
        months.push([datalist[i].months,datalist[i].avgprice]);
    }

    anychart.onDocumentReady(function() {
        
    // set the data
        var data = {
            header: ["Name", "Average"],
            rows: months
        };

        // create the chart
        var chart = anychart.column();

        // add the data
        chart.data(data);

        // set the chart title
        // chart.title("");

        // draw
        chart.container("containers");
        chart.draw();
    });


//End First Chart
</script>

</html>