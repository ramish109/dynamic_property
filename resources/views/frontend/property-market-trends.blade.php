<!DOCTYPE html>
<html lang="en">

<head>
@include('frontend.includes.head')
    <link rel="stylesheet" href="{{ asset('frontend/css/property-demand-trends.css')}}">
    <link rel="stylesheet" href="{{ asset('frontend/css/style.css')}}">
</head>

<body>
@include('frontend.includes.header')

    <section class="slice bg-white homeBG homeBG-xs homeBG-sm homeBG-md homeBG-lg homeDemandTrends">
        <div class="wp-section" style="background:none;">
            <div class="container" style="background:none;">
                <div class="row">
                    <div class="col-md-12 text-center">
                        <h1 class="c-white strong-400 hidden-ma">Explore Property Market Trends in Nigeria</h1>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-10 col-md-offset-1">
                        <a id="sPanelTop" name="searchPanelTop"></a>
                        <div class="">
                            <div class="">
                                <form name="search_jsForm" id="search_jsForm" action="{{route('search.average')}}" class="search_jsForm em-background">
                                @csrf
                                <div class="row">
                                    <div class="col-md-offset-1 col-md-10 col-sm-12 col-xs-12">
                                        <div class="form-group">
                                            <div class="easy-autocomplete">
                                                <input id="propertyLocation" name="title" placeholder="Enter a state or locality" data-results="states-localities-only" type="text" class="form-control" autocomplete="off">
                                                <div class="easy-autocomplete-container" id="eac-container-propertyLocation">
                                                    {{-- <ul></ul> --}}
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-offset-1 col-md-10 col-sm-12 col-xs-12 filter-panel">
                                        <div class="row">
                                            <div class="col-sm-3 col-xs-6">
                                                <div class="form-group">
                                                    <label for="tid">Type</label>
                                                    <select name="type" id="tid" class="form-control" required>
                                                        <option value="" selected="selected">All Types</option>
                                                        <option value="sale">Sale</option>
                                                        <option value="rent">Rent</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-sm-3 col-xs-6">
                                                <div class="form-group">
                                                    <label for="bedrooms">Bedrooms</label>
                                                    <select name="bed" id="bedrooms" class="form-control">
                                                        <option value="">Select Bedrooms</option>
                                                        <option value="1">1</option>
                                                        <option value="2">2</option>
                                                        <option value="3">3</option>
                                                        <option value="4">4</option>
                                                        <option value="5">5</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-sm-3 col-xs-6">
                                                <div class="form-group">
                                                    <label></label>
                                                    <button type="submit" class="btn btn-lg btn-base btn-block bg-primary" style="border-color: #0D6EFD !important;">
                                                        <span>Find</span>
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-offset-1 col-md-10 col-sm-12 col-xs-12 filter-panel">
                                        <div class="row">
                                            <div class="col-sm-4">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="slice bg-white no-padding">
        <div class="wp-section">
            <div class="container">
                <div class="row">
                    <div class="col-md-6 voffset-40 voffset-bottom-40">
                        <div class="section-title-wr">
                            <h3 class="section-title left no-text-transform"><span>Most Expensive Properties for Sale</span></h3>
                        </div>
                        <div class="demand-trend">
                            <table class="table table-bordered no-margin">
                                <tbody>
                                    <tr>
                                        <th class="ds-title text-center ds-rank">Rank</th>
                                        <th class="ds-title ds-area">State</th>
                                        <th class="ds-title">Percentage of Total Searches</th>
                                    </tr>
                                    <?php $staterank=1 ?>
                                    @if(! $statessale->isEmpty())
                                        @foreach ($statessale as $state)
                                            @if( isset($state->state->name))
                                            <tr>
                                                <td class="text-center">{{$staterank++}}</td>
                                                <td class="dsi-title">
                                                    <a class="red-text underline" >{{$state->state->name}}</a>
                                                </td>
                                                <td class="demand-trend-item text-end">
                                                ₦ {{round($state->average, 0)}}
                                                </td>
                                            </tr>
                                            @endif
                                    @endforeach
                                   @endif
                                </tbody>
                            </table>
                        </div>
                    </div>


                    <div class="col-md-6 voffset-40 voffset-bottom-40">
                        <div class="section-title-wr">
                            <h3 class="section-title left no-text-transform"><span>Top Localities</span></h3>
                        </div>
                        <div class="demand-trend">
                            <table class="table table-bordered no-margin">
                                <tbody>
                                    <tr>
                                        <th class="ds-title text-center ds-rank">Rank</th>
                                        <th class="ds-title ds-area">Localities</th>
                                        <th class="ds-title">Average Price</th>
                                    </tr>
                               
                                    <?php $cityrank=1 ?>
                                    @if(! $citiessale->isEmpty())
                                        @foreach ($citiessale as $city)
                                            @if(isset($city->city->name))
                                            <tr>
                                                <td class="text-center">{{$cityrank++}}</td>
                                                <td class="dsi-title">
                                                    <a class="red-text underline" href="{{ url('/market/locality/sale/'.$city->city_id) }}">{{$city->city->name}}</a>
                                                </td>
                                                <td class="demand-trend-item text-end">
                                                ₦ {{round($city->average, 0)}}
                                                </td>
                                            </tr>
                                            @endif
                                        @endforeach
                                   @endif
                                </tbody>
                            </table>
                        </div>
                    </div>

                </div>

                <div class="row">
                    <div class="col-md-6 voffset-40 voffset-bottom-40">
                        <div class="section-title-wr">
                            <h3 class="section-title left no-text-transform"><span>Most Expensive Properties for Rent</span></h3>
                        </div>
                        <div class="demand-trend">
                            <table class="table table-bordered no-margin">
                                <tbody>
                                    <tr>
                                        <th class="ds-title text-center ds-rank">Rank</th>
                                        <th class="ds-title ds-area">State</th>
                                        <th class="ds-title">Percentage of Total Searches</th>
                                    </tr>
                                    <?php $staterank=1 ?>
                                    @if(! $statesrent->isEmpty())
                                        @foreach ($statesrent as $state)
                                            @if(isset($state->state->name))
                                            <tr>
                                                <td class="text-center">{{$staterank++}}</td>
                                                <td class="dsi-title">
                                                    <a class="red-text underline" >{{$state->state->name}}</a>
                                                </td>
                                                <td class="demand-trend-item text-end">
                                                ₦ {{round($state->average, 0)}}
                                                </td>
                                            </tr>
                                            @endif
                                    @endforeach
                                   @endif                                   

                                </tbody>
                            </table>
                        </div>
                    </div>


                    <div class="col-md-6 voffset-40 voffset-bottom-40">
                        <div class="section-title-wr">
                            <h3 class="section-title left no-text-transform"><span>Top Localities</span></h3>
                        </div>
                        <div class="demand-trend">
                            <table class="table table-bordered no-margin">
                                <tbody>
                                    <tr>
                                        <th class="ds-title text-center ds-rank">Rank</th>
                                        <th class="ds-title ds-area">Localities</th>
                                        <th class="ds-title">Average Price</th>
                                    </tr>
                               
                                    <?php $cityrank=1 ?>
                                    @if(! $citiesrent->isEmpty())
                                        @foreach ($citiesrent as $city)
                                            @if(isset($city->city->name))
                                            <tr>
                                                <td class="text-center">{{$cityrank++}}</td>
                                                <td class="dsi-title">
                                                    <a class="red-text underline" href="{{ url('/market/locality/rent/'.$city->city_id) }}">{{$city->city->name}}</a>
                                                </td>
                                                <td class="demand-trend-item text-end">
                                                ₦ {{round($city->average, 0)}}
                                                </td>
                                            </tr>
                                            @endif
                                    @endforeach
                                   @endif
                                </tbody>
                            </table>
                        </div>
                    </div>
                    
                </div>

            </div>
        </div>
    </section>
   
    <section class="slice light-gray">
        <div class="wp-section">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="section-title-wr">
                            <h3 class="section title left">
                                About Nigeria Property Centre
                            </h3>
                                {{$about}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    @include('frontend.includes.footer')

    <script>
    $(document).ready(function(){

        $('#propertyLocation').keyup(function(){
            var query = $(this).val();
            if(query != '')
            {
                var _token = $('input[name="_token"]').val();
                $.ajax({
                    url:"{{ route('autocomplete.average.fetch') }}",
                    method:"POST",
                    data:{query:query, _token:_token},
                    success:function(data){
                        // console.log(data);
                        $('#eac-container-propertyLocation').fadeIn();
                        $('#eac-container-propertyLocation').html(data);
                    }
                });
            }
        });

        $(document).on('click', 'li', function(){
            var text = $(this).text();
            var city = $(this).text();
            // var city = text.substring(0, text.indexOf(','));

            $('#propertyLocation').val(city);
            $('#eac-container-propertyLocation').fadeOut();
        });

        $(document).on("click", function(event){
            var $trigger = $("#propertyLocation");
            if($trigger !== event.target && !$trigger.has(event.target).length){
                $("#eac-container-propertyLocation").slideUp("fast");
            }
        });

    });
</script>

</body>
<script src="{{ asset('frontend/js/scripts.js')}}"></script>
</html>
