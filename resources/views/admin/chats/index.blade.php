@extends('admin.main')
@section('content')
    <div class="dash-content">
        <div class="container-fluid">
            <div class="row"> 
                <div class="col-md-12">
                    <div class="inbox-wrap">
                        <div class="act-title">
                            <h5>Inbox</h5>
                        </div> 
                        <div class="au-inbox-wrap js-inbox-wrap">
                            <div class="au-message js-list-load">
                                <div class="au-message-list">

                                    @foreach($chats as $chat)
                                        @php  $auth = auth::user();  @endphp
                                        <a href="{{ route('chat.show', ['chat' => $chat->sender_id, 'reciever_id'=> $reciever_id]) }}">
                                            <!-- <div class="au-message__item unread"> -->
                                                <div class="au-message__item-inner">
                                                    <div class="au-message__item-text">
                                                        <div class="avatar-wrap">
                                                            <div class="avatar">
                                                                <!--<img loading="lazy" src="{{asset('images/agents/agent_1.jpg')}}" alt="No Image">-->
                                                                @if( file_exists(public_path() . '/images/users/'.$chat->user->image) && $chat->user->image != null)
                                                                    <img loading="lazy" src="{{URL::asset('/images/users/'.$chat->user->image)}}" alt="...">
                                                                @else
                                                                    <img loading="lazy" src="{{URL::asset('images/users/agent_1.jpg')}}" alt="...">
                                                                    <!-- <img loading="lazy" src="{{Auth()->user()->image}}" alt="..."> -->
                                                                @endif
                                                                
                                                            </div>
                                                        </div>
                                                        <div class="text">
                                                            <h5 class="name">{{$chat->user->username }} 
                                                                
                                                                {{-- @if($auth->type == 'admin') --}}
                                                                    <span class="badge badge-warning">
                                                                        @if($chat->user->type == 'user')
                                                                            Agent
                                                                        @else
                                                                            {{$chat->user->type}}
                                                                        @endif
                                                                    </span>
                                                                {{-- @endif --}}    

                                                            </h5>
                                                            <p>{{$chat->message}}</p>
                                                        </div>
                                                    </div>
                                                    <div class="au-message__item-time">
                                                        <span>{{$chat->created_at->diffForHumans()}}</span>
                                                    </div>
                                                </div>
                                            <!-- </div> -->
                                        </a>
                                    @endforeach

                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
