<?php
namespace App\Http\Controllers;

use App\Models\{Message, User};
use Illuminate\Http\Request;

class MessageController extends Controller
{
    public function inbox(){
        $user = auth()->user();
        $msgs = $user->messagesReceived()->with('from')->latest()->paginate(10);
        return view('messages.inbox', compact('msgs'));
    }
    public function sendForm(){
        $recipients = User::orderBy('name')->get();
        return view('messages.compose', compact('recipients'));
    }
    public function send(Request $r){
        $data = $r->validate([
            'to_user_id'=>'required|exists:users,id',
            'subject'=>'required|string|max:255',
            'body'=>'required|string'
        ]);
        Message::create([
            'from_user_id'=>auth()->id(),
            'to_user_id'=>$data['to_user_id'],
            'subject'=>$data['subject'],
            'body'=>$data['body']
        ]);
        return redirect()->route('messages.inbox')->with('success','Message sent');
    }
    public function reply(Request $r, Message $message){
        $r->validate(['body'=>'required|string']);
        Message::create([
            'from_user_id'=>auth()->id(),
            'to_user_id'=>$message->from_user_id,
            'subject'=>'Re: '.$message->subject,
            'body'=>$r->body,
            'replied_message_id'=>$message->id
        ]);
        $message->update(['is_read'=>true]);
        return back()->with('success','Replied');
    }
}
