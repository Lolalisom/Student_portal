<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    protected $fillable = ['from_user_id','to_user_id','subject','body','is_read','replied_message_id'];

    public function from(){ return $this->belongsTo(User::class, 'from_user_id'); }
    public function to(){ return $this->belongsTo(User::class, 'to_user_id'); }
    public function parent(){ return $this->belongsTo(Message::class, 'replied_message_id'); }
}
