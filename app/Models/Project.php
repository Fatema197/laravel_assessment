<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'department',
        'start_date',
        'end_date',
        'status',
    ];

    // A project can have many users
    public function users()
    {
        return $this->belongsToMany(User::class);
    }

    // A project can have many timesheets
    public function timesheets()
    {
        return $this->hasMany(Timesheet::class);
    }
}

