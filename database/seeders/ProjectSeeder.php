<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Project;

class ProjectSeeder extends Seeder
{
    public function run()
    {
        Project::create([
            'name' => 'Project Alpha',
            'department' => 'Development',
            'start_date' => '2024-01-01',
            'end_date' => '2024-12-31',
            'status' => 'pending',
        ]);

        Project::create([
            'name' => 'Project Beta',
            'department' => 'Marketing',
            'start_date' => '2024-02-01',
            'end_date' => '2024-09-30',
            'status' => 'in_progress',
        ]);
    }
}
