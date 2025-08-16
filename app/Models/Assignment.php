<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Assignment extends Model
{
    use HasFactory;
    protected $fillable = ['title','description','attachment_path','due_at','created_by'];

    public function creator(){ return $this->belongsTo(User::class, 'created_by'); }
    public function submissions(){ return $this->hasMany(Submission::class); }
}
