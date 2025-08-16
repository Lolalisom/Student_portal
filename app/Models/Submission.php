<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Submission extends Model
{
    protected $fillable = [
        'assignment_id','student_id','title','message','file_path','status','grade','feedback','graded_by'
    ];

    public function assignment(){ return $this->belongsTo(Assignment::class); }
    public function student(){ return $this->belongsTo(User::class, 'student_id'); }
    public function grader(){ return $this->belongsTo(User::class, 'graded_by'); }
}
