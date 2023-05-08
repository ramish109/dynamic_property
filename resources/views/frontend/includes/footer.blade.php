
<footer class="footer hidden-ma ">
    <div class="container">
        <div class="row">
            <div class="col-md-3">
                <div class="col">
                    <h4>About Us</h4>
                    <p>{{ isset($siteInfo->about_us) ? $siteInfo->about_us :'Nigeria Property Centre is a real estate and property website in Nigeria with property listings for sale, rent and lease'}}</p>
                    <!-- <a href="{{url('about')}}" class="btn btn-base" style="background-color: #0D6EFD !important; border-color: #0D6EFD !important;">Learn more</a> -->
                </div>
                <!--<div class="col voffset-40">-->
                <!--    <h4>Advertise with Us</h4>-->
                <!--    <ul>-->
                <!--        <li class=""><a href="#">Advertise/Market Your Property</a></li>-->
                <!--        <li class=""><a href="#">Featured Real Estate Companies</a>-->
                <!--        </li>-->
                <!--        <li class=""><a href="#">Place Banner Adverts</a></li>-->
                <!--    </ul>-->
                <!--</div>-->
            </div>
            
            @php
            $links = DB::table('content_manages')->get();
            @endphp
            
            <div class="col-md-3 col-md-offset-1">
                
                  <div class="col">
                    <h4>Market Trends</h4>
                    <ul>
                        @foreach($links as $link)
                            @if($link->type == "trend")
                            <!-- <li class=""><a href="{{ url('/properties/property-demand-trends')}}">Property Demand Trends</a></li>
                            <li class=""><a href="{{ url('/properties/property-market-trends')}}">Average Property Prices</a></li> -->
                            <li class=""><a href="{{$link->link}}">{{$link->title}}</a></li>
                            @endif
                        @endforeach
                    </ul>
                </div>
                
                <!--<div class="col voffset-40">-->
                <!--    <h4>Popular Property</h4>-->
                <!--    <ul>-->
                <!--        <li class=""><a href="#">Flats for rent in Abuja</a>-->
                <!--        </li>-->
                <!--        <li class=""><a href="#">Houses for rent in Abuja</a></li>-->
                <!--        <li class=""><a href="#">Houses for sale in Abuja</a></li>-->
                <!--        <li class=""><a href="#">Land for sale in Abuja</a></li>-->
                <!--        <li class=""><a href="#">Mini flats for rent-->
                <!--                in Abuja</a></li>-->
                <!--        <li class=""><a href="/#">Self contain for-->
                <!--                rent in Abuja</a></li>-->
                <!--        <li class=""><a href="#">Flats for rent in Lagos</a>-->
                <!--        </li>-->
                <!--        <li class=""><a href="#">Houses for rent in Lagos</a></li>-->
                <!--        <li class=""><a href="#">Houses for sale in Lagos</a></li>-->
                <!--        <li class=""><a href="#">Land for sale in Lagos</a></li>-->
                <!--        <li class=""><a href="#">Mini flats for rent-->
                <!--                in Lagos</a></li>-->
                <!--        <li class=""><a href="#">Self contain for-->
                <!--                rent in Lagos</a></li>-->
                <!--    </ul>-->
                <!--</div>-->
            </div>
         

            <div class="col-md-3">
                <div class="col"> 
                    <h4>Companies</h4>
                    <ul>
                        @foreach($links as $link)
                            @if($link->type == "company")
                            <!-- <li class=""><a href="{{ url('/agents') }}">Estate Agents</a></li>
                            <li class=""><a href="{{ url('/properties/property-developer')}}">Property Developers</a></li> -->
                            <li class=""><a href="{{$link->link}}">{{$link->title}}</a></li>
                            @endif
                        @endforeach
                    </ul>
                </div>
                <div class="col voffset-40">
                    <h4>Useful Links</h4>
                    <ul>
                        @foreach($links as $link)
                            @if($link->type == "otherlink")
                            <!-- <li class=""><a href="{{ url('/news')}}">Property Blog</a></li>
                            <li class=""><a href="{{ url('/area-guides')}}">Area Guides</a></li>
                            <li class=""><a href="{{ url('/contact')}}">Contact Us</a></li> -->
                            <li class=""><a href="{{$link->link}}">{{$link->title}}</a></li>
                            @endif
                        @endforeach
                    </ul>
                    <br>
                    <ul>
                        <li class=""><a href="{{ url('/privacy-policy')}}">Privacy Policy</a></li>
                        <li class=""><a href="{{ url('/terms')}}">Terms of Use</a></li>
                        <li class=""><a href="{{ url('/faqs')}}">FAQs</a></li>
                    </ul>
                </div>
            </div>
            <div class="col-md-3">
                <div class="col col-social-icons">
                    @if( ($siteInfo->fb != null) || ($siteInfo->twitter != null) || ($siteInfo->pinterest != null) || ($siteInfo->yt != null) )
                    <h4>Follow us</h4>
                    @endif

                    @if( isset($siteInfo->fb) && $siteInfo->fb != null )
                    <a rel="nofollow" target="_blank" href="{{isset($siteInfo->fb) ? $siteInfo->fb : '#'}}"><i class="fab fa-facebook"></i></a>
                    @endif

                    @if( isset($siteInfo->twitter ) && $siteInfo->twitter != null )
                    <a rel="nofollow" target="_blank" href="{{isset($siteInfo->twitter) ? $siteInfo->twitter : '#'}}"><i class="fab fa-twitter"></i></a>
                    @endif
                    @if( isset($siteInfo->pinterest ) && $siteInfo->pinterest != null )
                    <a rel="nofollow" target="_blank" href="{{isset($siteInfo->pinterest) ? $siteInfo->pinterest : '#'}}"><i class="fab fa-pinterest"></i></a>
                    @endif
                    @if(isset( $siteInfo->yt ) && $siteInfo->yt != null )
                    <a rel="nofollow" target="_blank" href="{{isset($siteInfo->yt) ? $siteInfo->yt : '#'}}"><i class="fab fa-youtube"></i></a>
                    @endif
                </div>

                <div class="col">
                   <h4 class="voffset-40">Other Regions</h4>
                    <ul>
                        <!-- <li class=""><a target="_blank" href="https://kenyapropertycentre.com">Kenya Property Centre</a>
                        </li>
                        <li class=""><a target="_blank" href="https://ghanapropertycentre.com">Ghana Property Centre</a>
                        </li> -->
                        @foreach($links as $link)
                            @if($link->type == "location")
                            <li class=""><a href="{{$link->link}}">{{$link->title}}</a></li>
                            @endif
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
        <hr>
        <div class="row">
            <div class="col-lg-12 copyright">
                {{isset($siteInfo->copy_right) ? $siteInfo->copy_right : 'copy right'}}
            </div>
        </div>
    </div>
</footer>
