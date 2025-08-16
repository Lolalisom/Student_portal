<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    /**
     * Get the messages received by the user.
     */
    public function messagesReceived()
    {
        return $this->hasMany(Message::class, 'to_user_id');
    }

    /**
     * Get the messages sent by the user.
     */
    public function messagesSent()
    {
        return $this->hasMany(Message::class, 'from_user_id');
    }
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable, HasRoles;
    /**
     * Get the results for the user (as student).
     */
    public function results()
    {
        return $this->hasMany(Result::class, 'student_id');
    }
    /**
     * Get the submissions for the user (as student).
     */
    public function submissions()
    {
        return $this->hasMany(Submission::class, 'student_id');
    }
    /**
     * Check if the user is an admin.
     *
     * @return bool
     */
    public function isAdmin(): bool
    {
        // Adjust this logic if you use a different way to determine admin
        return $this->role === 'admin';
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }
}
