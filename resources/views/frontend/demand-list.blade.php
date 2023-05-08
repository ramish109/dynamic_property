<!DOCTYPE html>
<html lang="en">

<head>
    @include('frontend.includes.head')
    <link rel="stylesheet" href="{{ asset('frontend/css/property-demand-trends.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/style.css') }}">
</head>

<body> 
@include('frontend.includes.header')

<section class="slices bg-white no-padding">
    <div class="wp-section">
        <div class="container">

            <div class="row">
                <div class="col-md-12 voffset-40 voffset-bottom-40">
                    <div class="section-title-wr">
                        <h3 class="section-title left no-text-transform"><span>Demand Trends for Property in <strong>{{$topname[0]->name ?? $topname}}</strong> </span></h3>
                    </div>
                    <div class="demand-trend">
                        <table class="table table-bordered no-margin">
                            <tbody>
                                <tr>
                                    <th class="ds-title text-center ds-rank">Rank</th>
                                    <th class="ds-title ds-area">{{$heading}}</th>
                                    <th class="ds-title">Percentage of Total Searches</th>
                                </tr>
                            <!-- @empty($trends)  
                                <tr>
                                    <td colspan="3" class="text-center ">No property demand trend data breakdown found.</td>
                                </tr>
                            @else --> 
                              @foreach ( $trends as $trend )
                                    <tr>
                                        <td class="text-center">{{$rank++}}</td>
                                        <!-- <td class="dsi-title">

                                            @if(! isset($trend->area))
                                                @if( isset($trend->states->id))
                                                    <a href="{{ url('/state/')}}/{{ $trend->states->id ?? 'null' }}" class="red-text underline">
                                                        {{ $trend->states->name ?? 'State' }}
                                                    </a>                                               
                                                @else
                                                    <a href="{{ url('/area/')}}/{{ $trend->cities->id ?? 'null' }}" class="red-text underline">
                                                    {{ $trend->cities->name ?? 'Area'}}
                                                    </a>    
                                                @endif
                                            @else
                                            <a class="red-text underline">
                                                {{ $trend->cities->name ?? $trend->states->name ?? $trend->area}}
                                            </a>
                                            @endif
                                        </td> -->

                                        <td class="dsi-title">
                                            @if(! isset($trend->cities->id) )
                                                <a class="red-text underline" 
                                                    href="{{ url('/state/')}}/{{$trend->states->id ?? $trend->cities->id }}" >
                                                   {{ $trend->cities->name ?? $trend->states->name }}
                                                </a>
                                            @else
                                            <a class="red-text underline" 
                                                >
                                                {{ $trend->cities->name ?? $trend->states->name }}
                                            </a>
                                            @endif
                                        </td>


                                        <td class="demand-trend-item">
                                            <div class="percentage-text">
                                            {{ round( $percent*$trend->Count ,1) }}%
                                            </div>
                                            <div class="progress progress-lg">
                                                <div class="progress-bar progress-bar-report" role="progressbar"
                                                    aria-valuenow="{{ $percent*$trend->Count }}" aria-valuemin="0" aria-valuemax="100"
                                                    style="width: {{ $percent*$trend->Count }}%">
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach                             
                            <!-- @endempty -->
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
</body>
<script src="{{ asset('frontend/js/scripts.js')}}"></script>

</html>