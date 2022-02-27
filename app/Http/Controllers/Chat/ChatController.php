<?php

namespace App\Http\Controllers\Chat;

use App\Events\GetMessage;
use App\Events\NewMessage;
use App\Http\Controllers\Controller;
use App\Models\ChildMessage;
use App\Models\Message;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;
use App\Models\User;
class ChatController extends Controller
{
    public function homeChat()
    {
        $data = [
            'chat' => Message::with(['fromUser', 'childMessage', 'toUser'])->whereToId(Auth::id())->orWhere('from_id', Auth::id())->get(),
        ];
        // dd($data['chat']);
        // event(new GetMessage($data, Auth::user()));
        return Inertia::render('Chat/Index', $data);
    }


    public function sendMessage(Request $request)
    {
        try {
            $message = Message::find($request->message_id);

            if(is_null($message)){
                $message = Message::create([
                    'to_id' => $request->message_id,
                    'from_id' => Auth::id(),
                    'created_at' => now()
                ]);
            }

            ChildMessage::insert([
                'message_id' => $message->id,
                'body' => $request->body,
                'sender_id' => Auth::id(),
                'created_at' => now(),
            ]);
            $data['chat'] = Message::with(['fromUser', 'childMessage', 'toUser'])->whereToId(Auth::id())->orWhere('from_id', Auth::id())->get();
            event(new GetMessage($data, $message->id));
            event(new NewMessage($data, $message->to_id));
            return response()->json([
                'data' => $data,
            ]);
        } catch (\Throwable $th) {
            return response()->json([
                'data' => [],
                'message' => $th->getMessage(),
            ]);
        }
        
    }

    public function searchUser(Request $request)
    {
        $user = User::where('name', 'LIKE', '%'.$request->search.'%')->where('id','!=', Auth::id())->get();
        return response()->json([
            'data' => $user ?? [],
            'message' => $user == [] ? 'User not found' : "User found",
            'input' => $request->search,
            'chat' => Message::with(['fromUser', 'childMessage', 'toUser'])->whereToId(Auth::id())->orWhere('from_id', Auth::id())->get(),
        ]);
    }
}
