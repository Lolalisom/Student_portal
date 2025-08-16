<?php
namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class StudentController extends Controller
{
    public function index(){
        $students = User::where('role','student')->paginate(15);
        return view('admin.students.index', compact('students'));
    }
    public function create(){ return view('admin.students.create'); }
    public function store(Request $r){
        $data = $r->validate([
            'name'=>'required',
            'email'=>'required|email|unique:users,email',
            'password'=>'required|min:6'
        ]);
        User::create([
            'name'=>$data['name'],
            'email'=>$data['email'],
            'password'=>Hash::make($data['password']),
            'role'=>'student'
        ]);
        return redirect()->route('admin.students.index')->with('success','Student created');
    }
    public function edit(User $student){ return view('admin.students.edit', compact('student')); }
    public function update(Request $r, User $student){
        $data = $r->validate([
            'name'=>'required',
            'email'=>'required|email|unique:users,email,'.$student->id,
            'phone'=>'nullable',
            'bio'=>'nullable',
        ]);
        $student->update($data);
        return back()->with('success','Updated');
    }
    public function destroy(User $student){
        $student->delete();
        return back()->with('success','Deleted');
    }
}
