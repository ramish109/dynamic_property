<!DOCTYPE html> 
<html lang="en">

<head>
    @include('frontend.includes.head')
    <link rel="stylesheet" href="{{ asset('frontend/css/property-demand-trends.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/style.css') }}">
</head>

<body>
@include('frontend.includes.header') 
 
<section class="slice bg-white homeBG homeBG-xs homeBG-sm homeBG-md homeBG-lg homeDemandTrends">
    <div class="wp-section" style="background:none;">
        <div class="container" style="background:none;">
            <div class="row">
                <div class="col-md-12 text-center">
                    <h1 class="c-white strong-400 hidden-ma">Explore Property Demand Trends in Nigeria</h1>
                </div>
            </div>
            <div class="row">
                <div class="col-md-10 col-md-offset-1">
                    <a id="sPanelTop" name="searchPanelTop"></a>
                    <div class="">
                        <div class="">
                            <form name="search_jsForm" id="search_jsForm" action="{{route('search.demand')}}"
                                  class="search_jsForm em-background">
                                @csrf
                                <div class="row">
                                    <div class="col-md-offset-1 col-md-10 col-sm-12 col-xs-12">
                                        <div class="form-group">
                                            <div class="easy-autocomplete"><input id="propertyLocation"
                                                                                  name="title" placeholder="Enter a state or locality"
                                                                                  data-results="states-localities-only" type="text"
                                                                                  class="form-control" autocomplete="off">
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
                                                    <label for="cid">Category</label>
                                                    <select name="category" id="cid" class="form-control">
                                                        <option value="" selected="selected">All Categories </option>
                                                        <option value="1">Residential</option>
                                                        <option value="2">Commercial</option>
                                                        <option value="5">Land</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-sm-3 col-xs-6">
                                                <div class="form-group">
                                                    <label for="tid">Type</label>
                                                    <select name="type" id="tid" class="form-control">
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

<section class="slices bg-white no-padding">
    <div class="wp-section">
        <div class="container">
            <div class="row">
                <div class="col-md-6 voffset-40 voffset-bottom-40">
                    <div class="section-title-wr">
                        <h3 class="section-title left no-text-transform"><span>Top States</span></h3>
                    </div>
                    <div class="demand-trend">
                        <table class="table table-bordered no-margin">
                            <tbody>
                            <tr>
                                <th class="ds-title text-center ds-rank">Rank</th>
                                <th class="ds-title ds-area">State</th>
                                <th class="ds-title">Percentage of Total Searches</th>
                            </tr>
                            @foreach ( $states as $state )
                                <tr>
                                    <td class="text-center">{{$staterank++}}</td>
                                    <td class="dsi-title">
                                       <a class="red-text underline" href="{{ url('/cities/'.$state->state_id ) }}">{{ $state->states->name }}</a>
                                    </td>
                                    <td class="demand-trend-item">
                                        <div class="percentage-text">
                                           {{ round( $percent*$state->StateCount ,1)}}%
                                        </div>
                                        <div class="progress progress-lg">
                                            <div class="progress-bar progress-bar-report" role="progressbar"
                                                aria-valuenow="{{ $percent*$state->StateCount }}" aria-valuemin="0" aria-valuemax="100"
                                                style="width: {{ $percent*$state->StateCount }}%"></div>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
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
                                <th class="ds-title ds-area">locality</th>
                                <th class="ds-title">Percentage of Total Searches</th>
                            </tr>
                            @foreach ( $cities as $city )
                                <tr>
                                    <td class="text-center">{{$cityrank++}}</td>
                                    <td class="dsi-title">
                                        <a class="red-text underline" href="{{ url('/area/'.$city->cities->id ) }}">{{ $city->cities->name }}</a>
                                    </td>
                                    <td class="demand-trend-item">
                                        <div class="percentage-text">
                                           {{ round( $city_percent*$city->CityCount ,1) }}%
                                        </div>
                                        <div class="progress progress-lg">
                                            <div class="progress-bar progress-bar-report" role="progressbar"
                                                aria-valuenow="{{ $city_percent*$city->CityCount }}" aria-valuemin="0" aria-valuemax="100"
                                                style="width: {{ $city_percent*$city->CityCount }}%"></div>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6 voffset-40 voffset-bottom-40">
                    <div class="section-title-wr">
                        <h3 class="section-title left no-text-transform"><span>Top Category</span></h3>
                    </div>
                    <div class="demand-trend">
                        <table class="table table-bordered no-margin">
                            <tbody>
                            <tr>
                                <th class="ds-title text-center ds-rank">Rank</th>
                                <th class="ds-title ds-area">Category</th>
                                <th class="ds-title">Percentage of Total Searches</th>
                            </tr>

                            @foreach ( $categories as $category )
                                <tr>
                                    <td class="text-center">{{$categoryrank++}}</td>
                                    <td class="dsi-title">
                                        <a class="red-text underline" href="{{ url('/categories/'.$category->category_id ) }}">{{ $category->categories->name}}</a>
                                    </td>
                                    <td class="demand-trend-item">
                                        <div class="percentage-text">
                                            {{ round( $category_percent*$category->CategoryCount ,1) }}%
                                        </div>
                                        <div class="progress progress-lg">
                                            <div class="progress-bar progress-bar-report" role="progressbar"
                                                aria-valuenow="{{$category_percent*$category->CategoryCount}}" aria-valuemin="0" aria-valuemax="100"
                                                style="width: {{$category_percent*$category->CategoryCount}}%"></div>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach

                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="col-md-6 voffset-40 voffset-bottom-40">
                    <div class="section-title-wr">
                        <h3 class="section-title left no-text-transform"><span>Top Types</span></h3>
                    </div>
                    <div class="demand-trend">
                        <table class="table table-bordered no-margin">
                            <tbody>
                            <tr>
                                <th class="ds-title text-center ds-rank">Rank</th>
                                <th class="ds-title ds-area">Type</th>
                                <th class="ds-title">Percentage of Total Searches</th>
                            </tr>

                            @foreach ( $types as $type )
                                <tr>
                                    <td class="text-center">{{$typerank++}}</td>
                                    <td class="dsi-title">
                                        <a class="red-text underline" href="{{ url('/types/'.$type->type ) }}">{{ $type->type }}</a>
                                    </td>
                                    <td class="demand-trend-item">
                                        <div class="percentage-text">
                                           {{ round( $type_percent*$type->TypeCount ,1) }}%
                                        </div>
                                        <div class="progress progress-lg">
                                            <div class="progress-bar progress-bar-report" role="progressbar"
                                                aria-valuenow="{{ $type_percent*$type->TypeCount }}" aria-valuemin="0" aria-valuemax="100"
                                                style="width: {{ $type_percent*$type->TypeCount }}%"></div>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach

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
                        <p>Nigeria Property Centre is a real estate and property website in Nigeria with property
                            listings for sale, rent and lease. We offer Nigerian property seekers an easy way to
                            find details of property like homes, houses, lands, shops, office spaces and other
                            commercial properties to buy or rent. Nigeria Property Centre provides a platform for
                            advertising property from organisations and Nigerian private property owners.

                            <br><br>Nigeria Property Centre (NPC) is the clear leading property website with lots of
                            users, advertising members and properties. Our advertisers are property professionals
                            such as estate agents, letting (rental) agents, new homes developers and Nigerian
                            private property owners who offer properties within Nigeria for property hunters.
                        </p>
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
            // console.log(query);
            if(query != '')
            {
                var _token = $('input[name="_token"]').val();
                $.ajax({
                    url:"{{ route('autocomplete.trend.fetch') }}",
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
