<?php
namespace App\Http\Controllers;

use App\Models\{Assignment, Submission, Result, Message};

class DashboardController extends Controller
{
    public function student(){
        $user = auth()->user();
        return view('student.dashboard',[
            'assignments' => Assignment::latest()->get(),
            'submissions' => $user->submissions()->with('assignment')->latest()->get(),
            'results'     => $user->results()->latest('published_at')->get(),
            'unread'      => $user->messagesReceived()->where('is_read', false)->count(),
        ]);
    }

    public function admin(){
        return view('admin.dashboard',[
            'assignments' => Assignment::withCount('submissions')->latest()->get(),
            'submissions' => Submission::with(['student','assignment'])->latest()->take(10)->get(),
            'messages'    => Message::with(['from','to'])->latest()->take(10)->get(),
        ]);
    }
}
