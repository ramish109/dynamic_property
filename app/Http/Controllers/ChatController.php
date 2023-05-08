<?php

namespace App\Http\Controllers; 

use App\Models\Chat;
use App\Models\notify;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\StoreChatRequest;
use App\Http\Requests\UpdateChatRequest;
use Illuminate\Http\Request;

class ChatController extends Controller
{ 
 
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        $auth = auth()->user();
        $chats = Chat::with('user')->where('reciever_id','=',$auth->id)->get()->unique('sender_id');
        $reciever_id = $auth->id;

        // if($auth->type == 'admin'){
        //     $chats = Chat::with('user')->get()->unique('sender_id');
        //     $reciever_id = $auth->id;
        // }

        return view('admin.chats.index', compact('chats','reciever_id'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {        
        $sender_id = $request->input('chat');
        $reciever_id = $request->input('reciever_id');

        $chat = new Chat(); 
        $chat->sender_id = $reciever_id;
        $chat->reciever_id = $sender_id;
        $chat->message = $request->message;
        $chat->status = 1;
        $chat->save();
        
        $notify = new notify();
        $notify->type = 'message';
        $notify->sender_id =  $reciever_id;
        $notify->reciever_id = $sender_id;
        $notify->status = 1;
        $notify->save();

        return redirect()->back()->with('success', 'Sent Successfully.');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreChatRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {   

        $chat = new Chat();
        $chat->sender_id = $request->user;
        $chat->reciever_id = $request->agent;
        $chat->message = $request->message;
        $chat->status = 1;
        $chat->save();

        $notify = new notify();
        $notify->type = 'message';
        $notify->sender_id = $request->user;
        $notify->reciever_id = $request->agent;
        $notify->status = 1;
        $notify->save();
        
        return redirect()->back()->with('success', 'Sent Successfully.');         
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Chat  $chat
     * @return \Illuminate\Http\Response
     */
    public function show($chat, Request $request)
    {
        $auth = auth()->user();
        $user = User::where('id',$chat)->get()->toArray();
        $username = $user[0]['username'];
        $userChats = Chat::whereIn('sender_id', [$chat,$request->reciever_id])->whereIn('reciever_id', [$chat,$request->reciever_id])->orderBy('created_at', 'asc')->get();
        $sender_id = $chat;
        $reciever_id = $request->reciever_id;

        $now = Carbon::now()->toDateTimeString();
        DB::table('notifies')
            ->where('sender_id', $chat)
            ->where('reciever_id', $request->reciever_id)
            ->update(['read_at' => $now]);

        return view('admin.chats.show', compact('userChats','sender_id','reciever_id', 'username'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Chat  $chat
     * @return \Illuminate\Http\Response
     */
    public function edit(Chat $chat)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateChatRequest  $request
     * @param  \App\Models\Chat  $chat
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateChatRequest $request, Chat $chat)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Chat  $chat
     * @return \Illuminate\Http\Response
     */
    public function destroy(Chat $chat)
    {
        //
    }
    
    
    public function getData(Request $request)
    {
        // Get the data from the server

        $chat = $request->input('chat');
        $reciever_id = $request->input('reciever_id');

        $auth = auth()->user();
        $user = User::where('id',$chat)->get()->toArray();
        $username = $user[0]['username'];
        $userChats = Chat::whereIn('sender_id', [$chat,$reciever_id])->whereIn('reciever_id', [$chat,$reciever_id])->orderBy('created_at', 'asc')->get();
        $sender_id = $chat;
        $reciever_id = $reciever_id;

        $chatting =[];

        foreach($userChats as $chat){
            if($chat->sender_id == $sender_id){

                $chatting[] ='<a class="card-title text-dark mb-0">'.$chat->user->username.'</a>
                <a class="card-subtitle text-muted" style="font-size:smaller"> '. 
                    $chat->created_at->diffForHumans()
                .'</a>'.
                '<p class="card-text mb-3">'.$chat->message.'</p>';
            
            }

            elseif($chat->sender_id == $reciever_id){

                $chatting[] ='<a class="card-title text-primary mb-0">'
                    .$chat->user->username.
                '</a><a class="card-subtitle text-muted" style="font-size:smaller"> '
                    .$chat->created_at->diffForHumans().
                '</a>
                <p class="card-text mb-3">'.$chat->message.'</p>';
            }      
            
        }
        
        $data = $chatting;

        // Return the data as an HTML response
        // return view('admin.chats.show')->with('data', $data);
        return $data;
    }

    
}
