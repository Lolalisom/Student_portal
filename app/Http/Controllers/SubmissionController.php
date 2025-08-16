<?php
namespace App\Http\Controllers;

use App\Models\{Assignment, Submission};
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SubmissionController extends Controller
{
    public function create(Assignment $assignment){
        return view('submissions.create', compact('assignment'));
    }
    public function store(Request $r, Assignment $assignment){
        $data = $r->validate([
            'title'=>'required|string|max:255',
            'message'=>'nullable|string',
            'file'=>'required|file|max:20480'
        ]);
        $path = $r->file('file')->store('submissions','public');
        Submission::create([
            'assignment_id'=>$assignment->id,
            'student_id'=>auth()->id(),
            'title'=>$data['title'],
            'message'=>$data['message'] ?? null,
            'file_path'=>$path,
        ]);
        return redirect()->route('dashboard.student')->with('success','Submitted');
    }
    public function index(){
        $subs = Submission::with(['student','assignment'])->latest()->paginate(15);
        return view('submissions.index', compact('subs'));
    }
    public function gradeForm(Submission $submission){
        return view('submissions.grade', compact('submission'));
    }
    public function grade(Request $r, Submission $submission){
        $data = $r->validate([ 'grade'=>'required|string|max:10', 'feedback'=>'nullable|string' ]);
        $submission->update([
            'grade'=>$data['grade'],
            'feedback'=>$data['feedback'] ?? null,
            'status'=>'graded',
            'graded_by'=>auth()->id()
        ]);
        return redirect()->route('submissions.index')->with('success','Graded');
    }
}
