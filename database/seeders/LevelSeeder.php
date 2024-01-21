<?php

namespace Database\Seeders;

use App\Models\Level;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class LevelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Level::create([
            'name_ar'      => 'المستوي الأول',
            'name_en'      => 'Level one',
            'exp'          => 100
        ]);

        Level::create([
            'name_ar'      => 'المستوي الثاني',
            'name_en'      => 'Second Level',
            'exp'          => 200
        ]);

        Level::create([
            'name_ar'      => 'المستوي الثالث',
            'name_en'      => 'Third level',
            'exp'          => 300
        ]);

        Level::create([
            'name_ar'      => 'المستوي الرابع',
            'name_en'      => 'Fourth Level',
            'exp'          => 400
        ]);

        Level::create([
            'name_ar'      => 'المستوي الخامس',
            'name_en'      => 'Level five',
            'exp'          => 500
        ]);

        Level::create([
            'name_ar'      => 'المستوي السادس',
            'name_en'      => 'Sixth Level',
            'exp'          => 600
        ]);

        Level::create([
            'name_ar'      => 'المستوي السابع',
            'name_en'      => 'Seventh level',
            'exp'          => 700
        ]);

        Level::create([
            'name_ar'      => 'المستوي الثامن',
            'name_en'      => 'Eighth level',
            'exp'          => 800
        ]);

        Level::create([
            'name_ar'      => 'المستوي التاسع',
            'name_en'      => 'Ninth level',
            'exp'          => 900
        ]);

        Level::create([
            'name_ar'      => 'المستوي العاشر',
            'name_en'      => 'Tenth level',
            'exp'          => 100
        ]);
    }
}
