<?php

namespace Database\Seeders;

use App\Models\Status;
use Illuminate\Database\Seeder;

class StatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Status::create([
            'title_ar'      => 'تو دو',
            'title_en'      => 'To Do',
            'is_default' => 1
        ]);

        Status::create([
            'title_ar'      => 'تحت العمل',
            'title_en'      => 'In Progress',
            'is_default' => 0
        ]);

        Status::create([
            'title_ar'      => 'تحت المراجعة',
            'title_en'      => 'In Review',
            'is_default' => 0
        ]);

        Status::create([
            'title_ar'      => 'مغلق',
            'title_en'      => 'Closed',
            'is_default' => 0
        ]);

        Status::create([
            'title_ar'      => 'عاد فتحة',
            'title_en'      => 'Reopen',
            'is_default' => 0
        ]);

        Status::create([
            'title_ar'      => 'اكتمل',
            'title_en'      => 'Completed',
            'is_default' => 0
        ]);
    }
}
