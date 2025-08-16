<?php
namespace App\Http\Controllers;

use App\Models\Assignment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AssignmentController extends Controller
{
    public function index(){
        return view('assignments.index', ['assignments'=>Assignment::latest()->paginate(10)]);
    }
    public function create(){ return view('assignments.create'); }
    public function store(Request $r){
        $data = $r->validate([
            'title'=>'required|string|max:255',
            'description'=>'required|string',
            'attachment'=>'nullable|file|max:10240',
            'due_at'=>'nullable|date'
        ]);
        $path = $r->hasFile('attachment') ? $r->file('attachment')->store('assignments','public') : null;
        Assignment::create([
            'title'=>$data['title'],
            'description'=>$data['description'],
            'attachment_path'=>$path,
            'due_at'=>$data['due_at'] ?? null,
            'created_by'=>auth()->id()
        ]);
        return redirect()->route('assignments.index')->with('success','Assignment created');
    }
    public function show(Assignment $assignment){
        return view('assignments.show', compact('assignment'));
    }
    public function edit(Assignment $assignment){ return view('assignments.edit', compact('assignment')); }
    public function update(Request $r, Assignment $assignment){
        $data = $r->validate([
            'title'=>'required', 'description'=>'required', 'attachment'=>'nullable|file|max:10240', 'due_at'=>'nullable|date'
        ]);
        if($r->hasFile('attachment')){
            if($assignment->attachment_path) Storage::disk('public')->delete($assignment->attachment_path);
            $assignment->attachment_path = $r->file('attachment')->store('assignments','public');
        }
        $assignment->fill($data)->save();
        return back()->with('success','Updated');
    }
    public function destroy(Assignment $assignment){
        $assignment->delete();
        return redirect()->route('assignments.index')->with('success','Deleted');
    }
}
