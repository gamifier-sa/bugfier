<?php

namespace Database\Seeders;

use App\Models\Status;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class StatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Status::create([
            'title'      => 'To Do',
            'is_default' => 1
        ]);

        Status::create([
            'title'      => 'In Progress',
            'is_default' => 0
        ]);

        Status::create([
            'title'      => 'In Review',
            'is_default' => 0
        ]);

        Status::create([
            'title'      => 'Closed',
            'is_default' => 0
        ]);

        Status::create([
            'title'      => 'Reopen',
            'is_default' => 0
        ]);

        Status::create([
            'title'      => 'Completed',
            'is_default' => 0
        ]);
    }
}
