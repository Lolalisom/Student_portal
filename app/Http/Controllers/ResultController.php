<?php
namespace App\Http\Controllers;

use App\Models\{Result, User};
use Illuminate\Http\Request;

class ResultController extends Controller
{
    public function index(){
        $user = auth()->user();
        if($user->isAdmin()){
            return view('results.manage', ['students'=>User::where('role','student')->orderBy('name')->get()]);
        }
        return view('results.index', ['results'=>$user->results()->latest('published_at')->get()]);
    }
    public function store(Request $r){
        $data = $r->validate([
            'student_id'=>'required|exists:users,id',
            'subject'=>'required|string|max:255',
            'score'=>'required|string|max:20',
            'term'=>'nullable|string|max:50'
        ]);
        Result::create([
            'student_id'=>$data['student_id'],
            'subject'=>$data['subject'],
            'score'=>$data['score'],
            'term'=>$data['term'] ?? null,
            'published_at' => now(),
            'uploaded_by'  => auth()->id()
        ]);
        return back()->with('success','Result published');
    }
}
