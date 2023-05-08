<aside class="menu-sidebar js-right-sidebar d-block">
    <div class="logo">
        <a href="{{url('/')}}">
            @if(isset($siteInfo->logo))
            @if(file_exists( public_path() . '/images/images/'.$siteInfo->logo))
                <img loading="lazy" src="{{ URL::asset('/images/images/'.$siteInfo->logo) }}"  alt="Image">
            @else
                <img loading="lazy" src="{{asset('images/logo-blue.png')}}" alt="logo2" class="img-fluid">
            @endif
        @else
                <img loading="lazy" src="{{asset('images/logo-blue.png')}}" alt="logo">
        @endif
        </a>
    </div>
    <div class="menu-sidebar__content js-scrollbar2">
        <nav class="navbar-sidebar2">
            <ul class="list-unstyled navbar__list">
                @can('isAdmin')
                
                <li>
                    <a class="{{Str::startsWith(Route::currentRouteName(),'admin.dashboard') ? 'active' : '' }}" href="{{route('admin.dashboard')}}">
                        <i class="las la-home"></i>{{trans('file.dashboard')}}
                  
                    </a>
                </li>
                <li class="has-sub">
                    <a class="js-arrow {{Str::startsWith(Route::currentRouteName(),'admin.properties') ? 'active' : '' }}" href="#">
                        <i class="las la-layer-group"></i>{{trans('file.real_estate')}}
                    </a>
                    <ul class="list-unstyled navbar__sub-list js-sub-list">
                        <li>
                            <a class="{{Str::startsWith(Route::currentRouteName(),'admin.properties.index') ? 'active' : '' }}" href="{{route('admin.properties.index')}}">{{trans('file.Properties')}}</a>
                        </li>
                        <li>
                            <a class="{{Str::startsWith(Route::currentRouteName(),'admin.facilities.index') ? 'active' : '' }}" href="{{route('admin.facilities.index')}}">{{trans('file.facilities')}}</a>
                        </li>
                        <li>
                            <a class="{{Str::startsWith(Route::currentRouteName(),'admin.categories.index') ? 'active' : '' }}" href="{{route('admin.categories.index')}}">{{trans('file.categories')}}</a>
                        </li>
                        <!-- <li>
                            <a class="{{Str::startsWith(Route::currentRouteName(),'admin.projects.index') ? 'active' : '' }}" href="{{route('admin.projects.index')}}">Projects</a>
                        </li> -->

                    </ul>
                </li>

                <li class="has-sub">
                    <a class="js-arrow" href="#">
                        <i class="las la-globe"></i>{{trans('file.locations')}}
                    </a>
                    <ul class="list-unstyled navbar__sub-list js-sub-list">
                        <li>
                            <a class="{{Str::startsWith(Route::currentRouteName(),'admin.countries.index') ? 'active' : '' }}" href="{{route('admin.countries.index')}}">{{trans('file.countries')}}</a>
                        </li>
                        <li>
                            <a class="{{Str::startsWith(Route::currentRouteName(),'admin.states.index') ? 'active' : '' }}" href="{{route('admin.states.index')}}">{{trans('file.states')}}</a>
                        </li>
                        <li>
                            <a class="{{Str::startsWith(Route::currentRouteName(),'admin.cities.index') ? 'active' : '' }}" href="{{route('admin.cities.index')}}">{{trans('file.cities')}}</a>
                        </li>

                        <!-- <li>
                            <a class="{{Str::startsWith(Route::currentRouteName(),'admin.cities.index') ? 'active' : '' }}" href="{{route('admin.areas.index')}}">Areas</a>
                        </li> -->
                        
                    </ul>
                </li>
                <!--<li>-->
                <!--    <a class="{{Str::startsWith(Route::currentRouteName(),'admin.agents.index') ? 'active' : '' }}" href="{{route('admin.agents.index')}}">-->
                <!--        <i class="las la-users"></i>Users Management</a>-->
                <!--</li>-->
                
                <li class="has-sub">
                    <a class="js-arrow" href="#">
                        <i class="las la-users"></i>Users Manage
                    </a>
                    <ul class="list-unstyled navbar__sub-list js-sub-list">
                        <li>
                            <a class="{{Str::startsWith(Route::currentRouteName(),'admin.agents.index') ? 'active' : '' }}" href="{{route('admin.agents.index')}}">Agents</a>
                        </li>
                        <li>
                            <a class="{{Str::startsWith(Route::currentRouteName(),'admin.buildershow') ? 'active' : '' }}" href="{{route('admin.buildershow')}}">Builders</a>
                        </li>
                        <li>
                            <a class="{{Str::startsWith(Route::currentRouteName(),'admin.ownershow') ? 'active' : '' }}" href="{{route('admin.ownershow')}}">Owner</a>
                        </li>
                        <li>
                            <a class="{{Str::startsWith(Route::currentRouteName(),'admin.individualshow') ? 'active' : '' }}" href="{{route('admin.individualshow')}}">Individual (End user)</a>
                        </li>
                        
                    </ul>
                </li>
                
                <li>
                    <a class="{{Str::startsWith(Route::currentRouteName(),'chat.index') ? 'active' : '' }}" href="{{route('chat.index')}}">
                    <i class="las la-envelope"></i>Chats</a>
                </li>  
                <!-- <li>
                    <a class="{{Str::startsWith(Route::currentRouteName(),'admin.bookings.index') ? 'active' : '' }}" href="{{route('admin.bookings.index')}}">
                        <i class="las la-copy"></i>{{trans('file.booking_request')}}</a>
                </li> -->
                <li>
                    <a class="{{Str::startsWith(Route::currentRouteName(),'admin.property-request.index') ? 'active' : '' }}" href="{{route('admin.property-request.index')}}">
                    <i class="las la-building"></i>Property Request</a>
                </li>
                <li>
                    <a class="{{Str::startsWith(Route::currentRouteName(),'admin.packages.index') ? 'active' : '' }}" href="{{route('admin.packages.index')}}">
                        <i class="las la-archive"></i>{{trans('file.packages')}}</a>
                </li>
                <li>
                    <a class="{{Str::startsWith(Route::currentRouteName(),'admin.payment.index') ? 'active' : '' }}" href="{{route('admin.payment.index')}}">
                        <i class="las la-money-check-alt"></i>{{trans('file.payments')}}</a>
                </li>
                <li>
                    <a class="{{Str::startsWith(Route::currentRouteName(),'admin.payment.detail') ? 'active' : '' }}" href="{{route('admin.payment.detail')}}">
                        <i class="las la-money-check-alt"></i>Payment Details</a>
                </li>
                <li class="has-sub">
                    <a class="js-arrow" href="#">
                        <i class="las la-blog"></i>{{trans('file.blogs')}}
                    </a>
                    <ul class="list-unstyled navbar__sub-list js-sub-list">
                        <li>
                            <a class="{{Str::startsWith(Route::currentRouteName(),'admin.blog-categories.index') ? 'active' : '' }}" href="{{route('admin.blog-categories.index')}}">{{trans('file.category')}}</a>
                        </li>
                        <li>
                            <a class="{{Str::startsWith(Route::currentRouteName(),'admin.tags.index') ? 'active' : '' }}" href="{{route('admin.tags.index')}}">{{trans('file.tags')}}</a>
                        </li>
                        <li>
                            <a class="{{Str::startsWith(Route::currentRouteName(),'admin.blogs.index') ? 'active' : '' }}" href="{{route('admin.blogs.index')}}">{{trans('file.blogs')}}</a>
                        </li>

                    </ul>
                </li>

                <!-- <li>
                    <a class="{{Str::startsWith(Route::currentRouteName(),'admin.messages.index') ? 'active' : '' }}" href="{{route('admin.messages.index')}}">
                        <i class="las la-envelope"></i>{{trans('file.messages')}}</a>
                </li> -->
                <li> 
                    <a class="{{Str::startsWith(Route::currentRouteName(),'admin.users.index') ? 'active' : '' }}" href="{{route('admin.users.index')}}">
                        <i class="las la-user-circle"></i>{{trans('file.my_profile')}}</a>
                </li>
                
                <li class="has-sub">
                    <a class="js-arrow" href="#">
                        <i class="las la-users"></i>Footer Useful Link
                    </a>
                    <ul class="list-unstyled navbar__sub-list js-sub-list">
                        
                        <li>
                            <a class="{{Str::startsWith(Route::currentRouteName(),'admin.trendlinkshow') ? 'active' : '' }}" href="{{route('admin.trendlinkshow')}}">Market Trends</a>
                        </li> 
                        
                        <li>
                            <a class="{{Str::startsWith(Route::currentRouteName(),'admin.locationlinkshow') ? 'active' : '' }}" href="{{route('admin.locationlinkshow')}}">Other Regions</a>
                        </li>                                                                 
                        <li>
                            <a class="{{Str::startsWith(Route::currentRouteName(),'admin.comapnyshow') ? 'active' : '' }}" href="{{route('admin.comapnyshow')}}">Companies</a>
                        </li>
                        <li>
                            <a class="{{Str::startsWith(Route::currentRouteName(),'admin.otherlinkshow') ? 'active' : '' }}" href="{{route('admin.otherlinkshow')}}">Useful links</a>
                        </li>
                    </ul>
                </li>
                
                
                <li class="has-sub">
                    <a class="js-arrow" href="#">
                        <i class="las la-cog"></i>{{trans('file.settings')}}
                    </a>
                    <ul class="list-unstyled navbar__sub-list js-sub-list">
                        <!--<li>-->
                        <!--    <a class="{{Str::startsWith(Route::currentRouteName(),'admin.pages.index') ? 'active' : '' }}" href="{{route('admin.pages.index')}}">Pages</a>-->
                        <!--</li>-->
                        <li>
                            <a class="{{Str::startsWith(Route::currentRouteName(),'admin.currencies.index') ? 'active' : '' }}" href="{{route('admin.currencies.index')}}">Currency</a>
                        </li>
                        <li>
                            <a class="{{Str::startsWith(Route::currentRouteName(),'admin.header-images.index') ? 'active' : '' }}" href="{{route('admin.header-images.index')}}">Header Image</a>
                        </li>
                        <li>
                            <a class="{{Str::startsWith(Route::currentRouteName(),'admin.mail-settings.create') ? 'active' : '' }}" href="{{route('admin.mail-settings.create')}}">Mail Settings</a>
                        </li>   
                        <!-- <li>
                            <a class="{{Str::startsWith(Route::currentRouteName(),'admin.analytics.create') ? 'active' : '' }}" href="{{route('admin.analytics.create')}}">Google Analytics</a>
                        </li> -->
                        <!--<li>-->
                        <!--    <a class="{{Str::startsWith(Route::currentRouteName(),'admin.testimonials.index') ? 'active' : '' }}" href="{{route('admin.testimonials.index')}}">Testimonials</a>-->
                        <!--</li>-->
                        <!-- <li>
                            <a class="{{Str::startsWith(Route::currentRouteName(),'admin.ourPartners.index') ? 'active' : '' }}" href="{{route('admin.ourPartners.index')}}">Our Partners</a>
                        </li> -->
                        <li>
                            <a class="{{Str::startsWith(Route::currentRouteName(),'admin.siteinfo.create') ? 'active' : '' }}" href="{{route('admin.siteinfo.create')}}">Site Informations</a>
                        </li>
                        <!-- <li>
                            <a class="{{Str::startsWith(Route::currentRouteName(),'admin.social.login') ? 'active' : '' }}" href="{{route('admin.social.login')}}">Social Login</a>
                        </li> -->
                    </ul>
                </li>
                <li>
                    <a href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                        <i class="las la-file-upload"></i>{{trans('file.logout')}}</a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">

                        @csrf

                    </form>
                </li>
                @endcan
                @can('isUser')
                        <li>
                            <a class="{{Str::startsWith(Route::currentRouteName(),'admin.dashboard') ? 'active' : '' }}" href="{{route('admin.dashboard')}}">
                                <i class="las la-home"></i>{{trans('file.dashboard')}}
                            </a>
                        </li>
                        <!-- <li>
                            <a class="{{Str::startsWith(Route::currentRouteName(),'admin.messages.index') ? 'active' : '' }}" href="{{route('admin.messages.index')}}">
                                <i class="las la-envelope"></i>{{trans('file.messages')}}</a>
                        </li> -->
                        
                        <li>
                            <a class="{{Str::startsWith(Route::currentRouteName(),'chat.index') ? 'active' : '' }}" href="{{route('chat.index')}}">
                            <i class="las la-envelope"></i>Chats</a>
                        </li>

                        <li>
                            <a class="{{Str::startsWith(Route::currentRouteName(),'admin.my-packages.index') ? 'active' : '' }}" href="{{route('admin.my-packages.index')}}">
                                <i class="las la-archive"></i>{{trans('file.my_packages')}}</a>
                        </li>
                        <li class="has-sub">
                            <a class="js-arrow" href="#">
                                <i class="las la-globe"></i>{{trans('file.locations')}}
                            </a>
                            <ul class="list-unstyled navbar__sub-list js-sub-list">
                                <!--<li>-->
                                <!--    <a class="{{Str::startsWith(Route::currentRouteName(),'admin.countries.index') ? 'active' : '' }}" href="{{route('admin.countries.index')}}">{{trans('file.countries')}}</a>-->
                                <!--</li>-->
                                <li>
                                    <a class="{{Str::startsWith(Route::currentRouteName(),'admin.states.index') ? 'active' : '' }}" href="{{route('admin.states.index')}}">{{trans('file.states')}}</a>
                                </li>
                                <li>
                                    <a class="{{Str::startsWith(Route::currentRouteName(),'admin.cities.index') ? 'active' : '' }}" href="{{route('admin.cities.index')}}">{{trans('file.cities')}}</a>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <a class="{{Str::startsWith(Route::currentRouteName(),'admin.properties.index') ? 'active' : '' }}" href="{{route('admin.properties.index')}}">
                                <i class="las la-layer-group"></i>{{trans('file.Properties')}}</a>
                        </li>

                        <li>
                            <a class="{{Str::startsWith(Route::currentRouteName(),'admin.property-request.index') ? 'active' : '' }}" href="{{route('admin.property-request.index')}}">
                            <i class="las la-copy"></i>Property Request</a>
                        </li>

                        <!--<li>-->
                        <!--    <a class="{{Str::startsWith(Route::currentRouteName(),'admin.blogs.index') ? 'active' : '' }}" href="{{route('admin.blogs.index')}}">-->
                        <!--        <i class="las la-blog"></i>{{trans('file.blogs')}}</a>-->
                        <!--</li>-->
                        <!-- <li>
                            <a class="{{Str::startsWith(Route::currentRouteName(),'admin.bookings.index') ? 'active' : '' }}" href="{{route('admin.bookings.index')}}">
                                <i class="las la-copy"></i>{{trans('file.booking_request')}}</a>
                        </li> -->
                        <li>
                            <a class="{{Str::startsWith(Route::currentRouteName(),'admin.individualshow') ? 'active' : '' }}" href="{{route('admin.individualshow')}}">
                                 <i class="las la-user-circle"></i>Customer</a>
                        </li>
                        <li>
                            <a class="{{Str::startsWith(Route::currentRouteName(),'admin.users.index') ? 'active' : '' }}" href="{{route('admin.users.index')}}">
                                <i class="las la-user-circle"></i>{{trans('file.my_profile')}}</a>
                        </li>

                        <li>
                            <a href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                                <i class="las la-file-upload"></i>
                                {{trans('file.logout')}}</a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">

                                @csrf

                            </form>
                        </li>
                @endcan
                
                 @can('isBuilder') 
                        <li>
                            <a class="{{Str::startsWith(Route::currentRouteName(),'admin.dashboard') ? 'active' : '' }}" href="{{route('admin.dashboard')}}">
                                <i class="las la-home"></i>{{trans('file.dashboard')}}
                            </a>
                        </li>
                        <!-- <li>
                            <a class="{{Str::startsWith(Route::currentRouteName(),'admin.messages.index') ? 'active' : '' }}" href="{{route('admin.messages.index')}}">
                                <i class="las la-envelope"></i>{{trans('file.messages')}}</a>
                        </li> -->

                        <li>
                            <a class="{{Str::startsWith(Route::currentRouteName(),'chat.index') ? 'active' : '' }}" href="{{route('chat.index')}}">
                            <i class="las la-envelope"></i>Chats</a>
                        </li>  
 
                        <li>
                            <a class="{{Str::startsWith(Route::currentRouteName(),'admin.my-packages.index') ? 'active' : '' }}" href="{{route('admin.my-packages.index')}}">
                                <i class="las la-archive"></i>{{trans('file.my_packages')}}</a>
                        </li>
                        <li class="has-sub">
                            <a class="js-arrow" href="#">
                                <i class="las la-globe"></i>{{trans('file.locations')}}
                            </a> 
                            <ul class="list-unstyled navbar__sub-list js-sub-list">
                                <!--<li>-->
                                <!--    <a class="{{Str::startsWith(Route::currentRouteName(),'admin.countries.index') ? 'active' : '' }}" href="{{route('admin.countries.index')}}">{{trans('file.countries')}}</a>-->
                                <!--</li>-->
                                <li>
                                    <a class="{{Str::startsWith(Route::currentRouteName(),'admin.states.index') ? 'active' : '' }}" href="{{route('admin.states.index')}}">{{trans('file.states')}}</a>
                                </li>
                                <li>
                                    <a class="{{Str::startsWith(Route::currentRouteName(),'admin.cities.index') ? 'active' : '' }}" href="{{route('admin.cities.index')}}">{{trans('file.cities')}}</a>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <a class="{{Str::startsWith(Route::currentRouteName(),'admin.properties.index') ? 'active' : '' }}" href="{{route('admin.projects.index')}}">
                                <i class="las la-layer-group"></i>Projects</a>
                        </li>

                        <li>
                            <a class="{{Str::startsWith(Route::currentRouteName(),'admin.property-request.index') ? 'active' : '' }}" href="{{route('admin.property-request.index')}}">
                            <i class="las la-building"></i>Property Request</a>
                        </li>

                        <!-- <li>
                            <a class="{{Str::startsWith(Route::currentRouteName(),'admin.blogs.index') ? 'active' : '' }}" href="{{route('admin.blogs.index')}}">
                                <i class="las la-blog"></i>{{trans('file.blogs')}}</a>
                        </li> -->
                        <!-- <li>
                            <a class="{{Str::startsWith(Route::currentRouteName(),'admin.bookings.index') ? 'active' : '' }}" href="{{route('admin.bookings.index')}}">
                                <i class="las la-copy"></i>{{trans('file.booking_request')}}</a>
                        </li> -->
                        <li>
                            <a class="{{Str::startsWith(Route::currentRouteName(),'admin.individualshow') ? 'active' : '' }}" href="{{route('admin.individualshow')}}">
                                 <i class="las la-user-circle"></i>Clients</a>
                        </li>
                        <li>
                            <a class="{{Str::startsWith(Route::currentRouteName(),'admin.users.index') ? 'active' : '' }}" href="{{route('admin.users.index')}}">
                                <i class="las la-user-circle"></i>{{trans('file.my_profile')}}</a>
                        </li>

                        <li>
                            <a href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                                <i class="las la-file-upload"></i>
                                {{trans('file.logout')}}</a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">

                                @csrf

                            </form>
                        </li>
                @endcan
                
                
                @can('isIndividual') 
                        <li>
                            <a class="{{Str::startsWith(Route::currentRouteName(),'admin.dashboard') ? 'active' : '' }}" href="{{route('admin.dashboard')}}">
                                <i class="las la-home"></i>{{trans('file.dashboard')}}
                            </a>
                        </li>
                         
                        <li> 
                            <a class="{{Str::startsWith(Route::currentRouteName(),'chat.index') ? 'active' : '' }}" href="{{route('chat.index')}}">
                            <i class="las la-envelope"></i>Chats</a>
                        </li>

                        <li> 
                            <a class="{{Str::startsWith(Route::currentRouteName(),'save-property.index') ? 'active' : '' }}" href="{{route('save-property.index')}}">
                            <i class="las la-copy"></i>Saved Property</a>
                        </li>

                        <li>
                            <a class="{{Str::startsWith(Route::currentRouteName(),'admin.property-request.index') ? 'active' : '' }}" href="{{route('admin.property-request.index')}}">
                            <i class="las la-building"></i>Property Request</a>
                        </li>

                        <li>
                            <a class="{{Str::startsWith(Route::currentRouteName(),'admin.my-packages.index') ? 'active' : '' }}" href="{{route('admin.my-packages.index')}}">
                            <i class="las la-archive"></i>{{trans('file.my_packages')}}</a>
                        </li>
                        

                        <li>
                            <a class="{{Str::startsWith(Route::currentRouteName(),'admin.users.index') ? 'active' : '' }}" href="{{route('admin.users.index')}}">
                                <i class="las la-user-circle"></i>{{trans('file.my_profile')}}</a>
                        </li>
                        <li>
                            <a class="{{Str::startsWith(Route::currentRouteName(),'admin.agents.index') ? 'active' : '' }}" href="{{route('admin.agents.index')}}">
                            <i class="las la-user-circle"></i>Agents</a>
                        </li>
                        <li>
                            <a href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                                <i class="las la-file-upload"></i>
                                {{trans('file.logout')}}</a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">

                                @csrf

                            </form>
                        </li>
                @endcan

                    
                @can('isOwner')
                        <li>
                            <a class="{{Str::startsWith(Route::currentRouteName(),'admin.dashboard') ? 'active' : '' }}" href="{{route('admin.dashboard')}}">
                                <i class="las la-home"></i>{{trans('file.dashboard')}}
                            </a>
                        </li>
                        <!-- <li>
                            <a class="{{Str::startsWith(Route::currentRouteName(),'admin.messages.index') ? 'active' : '' }}" href="{{route('admin.messages.index')}}">
                                <i class="las la-envelope"></i>{{trans('file.messages')}}</a>
                        </li> -->

                        <!-- <li>
                            <a class="{{Str::startsWith(Route::currentRouteName(),'chat.index') ? 'active' : '' }}" href="{{route('chat.index')}}">
                            <i class="las la-envelope"></i>Chats</a>
                        </li>   -->

                        <li>
                            <a class="{{Str::startsWith(Route::currentRouteName(),'admin.my-packages.index') ? 'active' : '' }}" href="{{route('admin.my-packages.index')}}">
                                <i class="las la-archive"></i>{{trans('file.my_packages')}}</a>
                        </li>

                        <!-- <li class="has-sub">
                            <a class="js-arrow" href="#">
                                <i class="las la-globe"></i>{{trans('file.locations')}}
                            </a>
                            <ul class="list-unstyled navbar__sub-list js-sub-list">
                                <li>
                                   <a class="{{Str::startsWith(Route::currentRouteName(),'admin.countries.index') ? 'active' : '' }}" href="{{route('admin.countries.index')}}">{{trans('file.countries')}}</a>
                                </li>
                                <li>
                                    <a class="{{Str::startsWith(Route::currentRouteName(),'admin.states.index') ? 'active' : '' }}" href="{{route('admin.states.index')}}">{{trans('file.states')}}</a>
                                </li>
                                <li>
                                    <a class="{{Str::startsWith(Route::currentRouteName(),'admin.cities.index') ? 'active' : '' }}" href="{{route('admin.cities.index')}}">{{trans('file.cities')}}</a>
                                </li>
                            </ul>
                        </li> --> 
                        
                        <li>
                            <a class="{{Str::startsWith(Route::currentRouteName(),'admin.properties.index') ? 'active' : '' }}" href="{{route('admin.properties.index')}}">
                                <i class="las la-layer-group"></i>{{trans('file.Properties')}}</a>
                        </li>
                        <li>
                            <a class="{{Str::startsWith(Route::currentRouteName(),'admin.property-request.index') ? 'active' : '' }}" href="{{route('admin.property-request.index')}}">
                            <i class="las la-building"></i>Property Request</a>
                        </li>
                        <!-- <li>
                            <a class="{{Str::startsWith(Route::currentRouteName(),'admin.blogs.index') ? 'active' : '' }}" href="{{route('admin.blogs.index')}}">
                                <i class="las la-blog"></i>{{trans('file.blogs')}}</a>
                        </li> -->
                        <!-- <li>
                            <a class="{{Str::startsWith(Route::currentRouteName(),'admin.bookings.index') ? 'active' : '' }}" href="{{route('admin.bookings.index')}}">
                                <i class="las la-copy"></i>{{trans('file.booking_request')}}</a>
                        </li> -->

                        <li>
                            <a class="{{Str::startsWith(Route::currentRouteName(),'admin.users.index') ? 'active' : '' }}" href="{{route('admin.users.index')}}">
                                <i class="las la-user-circle"></i>{{trans('file.my_profile')}}</a>
                        </li>

                        <li>
                            <a href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                                <i class="las la-file-upload"></i>
                                {{trans('file.logout')}}</a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">

                                @csrf

                            </form>
                        </li>
                @endcan
                

            </ul>
        </nav>
    </div>
</aside>
