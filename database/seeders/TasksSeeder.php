<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Task;

class TaskSeeder extends Seeder
{
    public function run(): void
    {
        Task::create([
            'task_name' => 'Finish Laravel Project',
            'description' => 'Complete the Task Manager project.',
            'due_date' => '2026-09-30',
            'status' => 'Pending',
        ]);

        Task::create([
            'task_name' => 'Study Java OOP',
            'description' => 'Review encapsulation and inheritance.',
            'due_date' => '2026-09-28',
            'status' => 'Pending',
        ]);

        Task::create([
            'task_name' => 'Submit Assignment',
            'description' => 'Submit the programming assignment.',
            'due_date' => '2026-09-27',
            'status' => 'Completed',
        ]);
    }
}