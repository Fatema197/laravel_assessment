<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Timesheet;

class TimesheetSeeder extends Seeder
{
    public function run()
    {
        Timesheet::create([
            'task_name' => 'Develop Feature A',
            'date' => '2024-04-01',
            'hours' => 5,
            'user_id' => 1, // Link to the user with ID 1
            'project_id' => 1, // Link to the project with ID 1
        ]);

        Timesheet::create([
            'task_name' => 'Test Feature B',
            'date' => '2024-04-02',
            'hours' => 3,
            'user_id' => 2, // Link to the user with ID 2
            'project_id' => 2, // Link to the project with ID 2
        ]);
    }
}
