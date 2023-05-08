{{--<header class="header transparent scroll-hide">--}}

{{--    <!--Header Top Section Starts-->--}}

{{--    <div class="header-top-section">--}}

{{--        <div class="container">--}}

{{--            <div class="row align-items-center">--}}

{{--                <div class="col-sm-8 col-12">--}}

{{--                    <ul class="header-top-left">--}}

{{--                        <li><i class="las la-phone"></i> <a href="tel:4444356348">{{isset($siteInfo->phone) ? $siteInfo->phone : 'phone'}}</a></li>--}}

{{--                        <li><i class="las la-envelope"></i><a href="{{isset($siteInfo->email) ? $siteInfo->email : '#'}}">{{isset($siteInfo->email) ? $siteInfo->email : 'email'}}</a></li>--}}

{{--                    </ul>--}}

{{--                </div>--}}

{{--                @php--}}

{{--                     $languages = \Illuminate\Support\Facades\DB::table('languages')--}}

{{--                                ->select('id','name','locale')--}}

{{--                                // ->where('default','=',0)--}}

{{--                                ->where('locale','!=',\Illuminate\Support\Facades\Session::get('currentLocal'))--}}

{{--                                ->orderBy('name','ASC')--}}

{{--                                ->get();--}}

{{--                 \Illuminate\Support\Facades\App::setLocale(\Illuminate\Support\Facades\Session::get('currentLocal'));--}}

{{--                @endphp--}}

{{--                <div class="col-sm-4 col-12">--}}

{{--                    <div class="menu-btn">--}}

{{--                        <ul class="user-btn d-flex justify-content-center">--}}

{{--                            <li class="nav-item dropdown">--}}

{{--                                <a id="navbarDropdown" class="" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>--}}

{{--                                    <i class="las la-language"></i>--}}

{{--                                    @if (\Illuminate\Support\Facades\Session::has('currentLocal'))--}}

{{--                                        {{ __(strtoupper(\Illuminate\Support\Facades\Session::get('currentLocal'))) }}--}}

{{--                                    @endif--}}



{{--                                </a>--}}



{{--                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">--}}

{{--                                    @foreach ($languages as $item)--}}

{{--                                        <a class="dropdown-item" href="{{route('language.defaultChange',$item->id)}}">--}}

{{--                                            {{ strtoupper($item->name) }} ({{__(strtoupper($item->locale))}})--}}

{{--                                        </a>--}}

{{--                                    @endforeach--}}

{{--                                </div>--}}

{{--                            </li>--}}

{{--                            @guest--}}

{{--                            <li><a href="{{url('/login')}}"><i class="las la-user-circle"></i>{{ trans('file.login') }}</a>--}}

{{--                            </li>--}}

{{--                            @else--}}

{{--                                <li><a href="{{ route('admin.users.index') }}">{{Auth::user()->username}}</a>--}}

{{--                                </li>--}}

{{--                                <li><a href="{{ route('logout') }}" onclick="event.preventDefault();--}}

{{--                                                     document.getElementById('logout-form').submit();"><i class="lnr lnr-arrow-right-circle"></i>{{ trans('file.logout') }}</a>--}}

{{--                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">--}}

{{--                                        @csrf--}}

{{--                                    </form>--}}

{{--                                </li>--}}

{{--                            @endguest--}}

{{--                        </ul>--}}

{{--                    </div>--}}

{{--                </div>--}}

{{--            </div>--}}

{{--        </div>--}}

{{--    </div>--}}

{{--    <!--Header Top Section Ends-->--}}

{{--    <!--Main Menu starts-->--}}

{{--    <div class="site-navbar-wrap v2">--}} 

{{--        <div class="container">--}}

{{--            <div class="site-navbar">--}}

{{--                <div class="row align-items-center">--}}

{{--                    <div class="col-lg-2 col-md-6 col-7">--}}

{{--                        <a class="navbar-brand" href="{{url('/')}}">--}}
{{--                            @if(isset($siteInfo->logo))--}}
{{--                                @if(file_exists( public_path() . '/images/images/'.$siteInfo->logo))--}}
{{--                                    <img loading="lazy" src="{{ URL::asset('/images/images/'.$siteInfo->logo) }}" alt="logo1" class="img-fluid" width="300" height="50">--}}
{{--                                @else--}}
{{--                                    <img loading="lazy" src="{{asset('images/logo-blue.png')}}" alt="logo2" class="img-fluid" width="300" height="50">--}}
{{--                                @endif--}}
{{--                            @else--}}
{{--                                <img loading="lazy" src="{{asset('images/logo-blue.png')}}" alt="logo2" class="img-fluid" width="300" height="50">--}}
{{--                            @endif--}}
{{--                        </a>--}}

{{--                    </div>--}}

{{--                    <div class="col-lg-6 col-md-6 col-5  order-2 order-lg-1 pl-xs-0">--}}

{{--                        <nav class="site-navigation text-right">--}}

{{--                            <div class="container">--}}

{{--                                <ul class="site-menu js-clone-nav d-none d-lg-block">--}}

{{--                                    <li>--}}

{{--                                        <a class="{{ Request::is('/') ? 'active' : '' }}" href="{{url('/')}}">{{trans('file.home')}}</a>--}}

{{--                                    </li>--}}

{{--                                    <li>--}}

{{--                                        <a class="{{ Request::is('properties') ? 'active' : '' }}" href="{{url('properties')}}">{{trans('file.Properties')}}</a>--}}

{{--                                    </li>--}}

{{--                                    <li>--}}

{{--                                        <a class="{{ Request::is('agents') ? 'active' : '' }}" href="{{url('agents')}}">{{trans('file.agents')}}</a>--}}

{{--                                    </li>--}}

{{--                                    <li>--}}

{{--                                        <a class="{{ Request::is('news') ? 'active' : '' }}" href="{{url('news')}}">{{trans('file.news')}}</a>--}}

{{--                                    </li>--}}

{{--                                    <li class="d-lg-none">--}}
{{--                                        @guest--}}

{{--                                        <a class="btn btn-block v1" href="#" data-toggle="modal" data-target="#user-login-popup"><i class="las la-home"></i>{{trans('file.add_listing')}}</a>--}}

{{--                                        @else--}}

{{--                                        <a class="btn btn-block v1" href="{{url('/admin/properties')}}"><i class="las la-home"></i>{{trans('file.add_listing')}}</a>--}}

{{--                                        @endguest--}}
{{--                                    </li>--}}

{{--                                </ul>--}}

{{--                            </div>--}}

{{--                        </nav>--}}

{{--                        <div class="d-lg-none text-right">--}}

{{--                            <a href="#" class="mobile-bar js-menu-toggle">--}}

{{--                                <span class="las la-bars"></span>--}}

{{--                            </a>--}}

{{--                        </div>--}}

{{--                        <!--mobile-menu starts -->--}}

{{--                        <div class="site-mobile-menu">--}}

{{--                            <div class="site-mobile-menu-header">--}}

{{--                                <div class="site-mobile-menu-close  js-menu-toggle">--}}

{{--                                    <span class="las la-times"></span>--}}
{{--                                </div>--}}

{{--                            </div>--}}

{{--                            <div class="site-mobile-menu-body"></div>--}}

{{--                        </div>--}}

{{--                        <!--mobile-menu ends-->--}}

{{--                    </div>--}}

{{--                    <div class="col-lg-4 col-md-5 col-4 order-1 order-lg-2 text-right pr-xs-0 d-none d-lg-block">--}}

{{--                        <div class="menu-btn">--}}

{{--                            <div class="add-list">--}}

{{--                                @guest--}}

{{--                                <a class="btn v3" href="#" data-toggle="modal" data-target="#user-login-popup"><i class="las la-home"></i>{{trans('file.add_listing')}}</a>--}}

{{--                                @else--}}

{{--                                <a class="btn v3" href="{{url('/admin/properties')}}"><i class="las la-home"></i>{{trans('file.add_listing')}}</a>--}}

{{--                                @endguest--}}

{{--                            </div>--}}

{{--                        </div>--}}

{{--                    </div>--}}

{{--                </div>--}}

{{--            </div>--}}

{{--        </div>--}}

{{--    </div>--}}

{{--    <!--Main Menu ends-->--}}

{{--</header>--}}


<header class="nav-header-bar bg-primary" >
    <div class="container">
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <a class="navbar-brand" href="{{ url('/')}}">
                @if(isset($siteInfo->logo))
                    @if(file_exists( public_path() . '/images/images/'.$siteInfo->logo) && $siteInfo->logo != null )
                        <img loading="lazy" src="{{ URL::asset('/images/images/'.$siteInfo->logo) }}" alt="logo1" class="img-fluid" width="200" height="50">
                    @else
                        <img loading="lazy" src="{{asset('images/images/dynamic-property-2023-03-20-641879b1a439c.webp')}}" alt="logo2" class="img-fluid" width="200" height="50">
                    @endif
                @else
                    <img loading="lazy" src="{{asset('images/images/dynamic-property-2023-03-20-641879b1a439c.webp')}}" alt="logo2" class="img-fluid" width="200" height="50">
                @endif
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavDropdown">
                <ul class="navbar-nav ml-auto " style="font-size: small !important;">
                    <li class="nav-item active bg-primary">
                        <a class="nav-link " href="{{ url('/properties/sale') }}">FOR SALE</a>
                    </li>
                    <li class="nav-item bg-primary ">
                        <a class="nav-link" href="{{ url('/properties/rent')}}">FOR RENT</a>
                    </li>
                    <li class="nav-item dropdown bg-primary">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            COMPANIES
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink" style="font-size: small !important;">
                            <a class="dropdown-item" href="{{ url('/agents') }}">Estate Agents</a>
                            <a class="dropdown-item" href="{{ url('/builders') }}">Builders</a>
                            <!--<a class="dropdown-item" href="{{ url('/properties/property-developer')}}">Property Developers</a>-->
                        </div>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            REQUESTS
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink" style="font-size: small !important;">
                            <a class="dropdown-item" href="{{ route('property-request.create') }}">Post a Request</a>

                            <a class="dropdown-item" href="{{ route('property-request.index') }}">View Property Requests</a>
                        </div>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            MARKET TRENDS
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink" style="font-size: small !important;">
                            <a class="dropdown-item" href="{{ url('/properties/property-demand-trends')}}"><i class="fa fa-search-location fa-fw"></i>Property Demand Trends</a>
                            <a class="dropdown-item" href="{{ url('/properties/property-market-trends')}}"><i class="fa fa-coins fa-fw"></i>Average Property Prices</a>
                        </div>
                    </li>
                    

                    @guest
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('/register')}}">REGISTER</a>
                    </li>
                    
                    <li class="nav-item">
                        <a class="nav-link" href="{{url('/login')}}">SIGN IN</a>
                    </li>

                    @else
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('admin.dashboard')}}">DASHBOARD</a>
                        </li>

                        <li class="nav-item ">
                            <a class="nav-link text-uppercase text-muted" href="{{ route('admin.users.index') }}">{{Auth::user()->username}}</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link text-uppercase text-decoration-underline" href="{{ route('logout') }}" onclick="event.preventDefault();
                               document.getElementById('logout-form').submit();">{{ trans('file.logout') }}
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </li>

                    @endguest

                </ul>
            </div>
        </nav>

    </div>
</header>

