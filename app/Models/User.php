<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens; // Correct import for HasApiTokens

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;
    protected $fillable = [
        'first_name',
        'last_name',
        'date_of_birth',
        'gender',
        'email',
        'password',
    ];

    // A user can be assigned to many projects
    public function projects()
    {
        return $this->belongsToMany(Project::class);
    }

    // A user can log many timesheets
    public function timesheets()
    {
        return $this->hasMany(Timesheet::class);
    }
}

