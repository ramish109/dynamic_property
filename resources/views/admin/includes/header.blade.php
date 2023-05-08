<header class="db-top-header" style="z-index: 1;">

    <div class="container-fluid">

        <div class="row align-items-center">
 
            @php

                $notifications = auth()->user()->unreadNotifications;

                $notifications->markAsRead(); 
            $languages = DB::table('languages')

                                ->select('id','name','locale')

                                // ->where('default','=',0)

                                ->where('locale','!=',\Illuminate\Support\Facades\Session::get('currentLocal'))

                                ->orderBy('name','ASC')

                                ->get();

             \Illuminate\Support\Facades\App::setLocale(\Illuminate\Support\Facades\Session::get('currentLocal'));

            @endphp 

            <div class="col-md-12 col-sm-12 col-12"> 

                <div class="header-button">

                    <li class="nav-item">
                        <a  class="nav-link">
                        <!-- <i class="la la-globe"></i> -->
                            @php $user = auth()->user(); @endphp
                            @if($user->type == 'user')
                                AGENT Dashboard
                            @else
                                {{Str::upper($user->type)}} Dashboard
                            @endif
                        </a>
                    </li>

                    <li class="nav-item">
                        <a  class="nav-link" href="{{url('/')}}" target="_blank">
                            <i class="la la-globe"></i>
                            <span>View Website</span>
                        </a>
                    </li>
                    <!-- <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>

                            <i class="la la-language"></i>
                            <span>
                            @if (\Illuminate\Support\Facades\Session::has('currentLocal'))

                                {{ __(strtoupper(\Illuminate\Support\Facades\Session::get('currentLocal'))) }}

                            @endif
                            </span>

                        </a>
                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">

                            @foreach ($languages as $item)

                                <a class="dropdown-item" href="{{route('language.defaultChange',$item->id)}}">

                                    {{ strtoupper($item->name) }} ({{__(strtoupper($item->locale))}})

                                </a>

                            @endforeach

                        </div>

                    </li> -->
                    <!-- <li class="nav-item">
                        <a  class="nav-link" href="{{url('public/help/index.html')}}" target="_blank" title="help">
                            <i class="las la-question-circle"></i>
                        </a>
                    </li> -->
                    
                    @php 
                    $auth = Auth::user();
                    $notifies = App\Models\notify::with(['user'])
                            ->select('sender_id', DB::raw( '(COUNT(sender_id)) as SenderCount'))
                            ->where('status', 1)
                            ->where('reciever_id',$auth->id)
                            ->where('read_at', '=', null)
                            ->groupBy('sender_id')
                            ->get();               
                    
                    $property_notifies = App\Models\notify::with(['properties', 'property_user'])
                            ->where('read_at', '=', null)
                            ->where('property_id','!=', null)
                            ->where('type','=','property')
                            ->get();
                            
                            
                    @endphp

                    <div class="header-button-item has-noti js-item-menu">
                        <i class="las la-bell"></i>
                        <div class="notifi-dropdown js-dropdown">

                            <div class="container">
                                @if(! $notifies->isEmpty() )
                                
                                <div class="row p-1 border">
                                    @foreach($notifies as $notify)

                                    <div class="col-12 p-2">
                                        <i class="las la-comment"></i>
                                        <a class="text-primary" href="{{ route('chat.show', ['chat' => $notify->sender_id, 'reciever_id'=> $auth->id ]) }}">
                                            {{$notify->user->username}}
                                        </a> {{$notify->SenderCount}} new messages
                                    </div>

                                    @endforeach
                                </div>
                                @endif

                                @if($auth->type == 'admin' && ! $property_notifies->isEmpty())
                                    <div class="row p-1 border">
                                    @foreach($property_notifies as $property_notify)    
                                        @if(isset($property_notify->property_user->username))
                                        <div class="col-12 p-2">
                                        <i class="las la-building"></i>
                                            <a class="text-primary" href="{{route('notify.edit',$property_notify->property_id)}}">            
                                                {{$property_notify->property_user->username}}
                                            </a> added new property
                                        </div>
                                        @endif
                                    @endforeach
                                    </div>
                                @endif

                                @if( ($property_notifies->isEmpty()) && $notifies->isEmpty() )
                                <div class="row p-2">
                                    <div class="col-12 text-center">
                                        Notifications
                                    </div>
                                </div>
                                @endif
                                
                            </div>

                        </div>
                    </div>

                    <div class="header-button-item js-sidebar-btn">

                    @php
 
                    $user = auth()->user();

                    @endphp

                    @if( file_exists(public_path() . '/images/users/'.$user->image) && $user->image != null)
                        <img loading="lazy" src="{{URL::asset('/images/users/'.$user->image)}}" alt="...">
                    @else
                        <img loading="lazy" src="{{URL::asset('images/users/agent_1.jpg')}}" alt="...">
                        <!-- <img loading="lazy" src="{{Auth()->user()->image}}" alt="..."> -->
                    @endif

                        <span>{{auth()->user()->username}} <i class="las la-caret-down"></i></span>

                    </div>

                    <div class="setting-menu js-right-sidebar d-none d-lg-block">

                        <div class="account-dropdown__body">

                            <div class="account-dropdown__item">

                                <a href="{{route('admin.users.index')}}">

                                    Profile</a>

                            </div>
                            {{--<div class="account-dropdown__item">--}}
                                {{--<a href="{{route('admin.change.password.index')}}">Change password</a>--}}
                            {{--</div>--}}

                            <div class="account-dropdown__item">

                                <a href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();">

                                    Logout</a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">

                                    @csrf

                                </form>

                            </div>

                        </div>

                    </div>

                </div>

            </div>

        </div>

    </div>

</header>
