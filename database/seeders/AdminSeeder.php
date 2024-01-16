<?php

namespace Database\Seeders;

use App\Models\Admin;
use Illuminate\Database\Seeder;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() : void
    {
        Admin::create([
            'name_ar' => 'ادمن',
            'name_en' => 'Admin',
            'email' => 'admin@app.com',
            'password' => 123123,
            'phone' => '1234567891',
            'status' => 'active'
        ]);

        Admin::create([
            'name_ar' => 'البراء',
            'name_en' => 'Baraa',
            'email' => 'baraa@app.com',
            'password' => 123123,
            'phone' => '1234567890',
            'status' => 'active'
        ]);

        Admin::create([
            'name_ar' => 'آيه',
            'name_en' => 'Aya',
            'email' => 'aya@app.com',
            'password' => 123123,
            'phone' => '1234567893',
            'status' => 'active'
        ]);

        Admin::create([
            'name_ar' => 'أحمد',
            'name_en' => 'Ahmed',
            'email' => 'ahmed@app.com',
            'password' => 123123,
            'phone' => '1234567894',
            'status' => 'active'
        ]);

        Admin::create([
            'name_ar' => 'محمد',
            'name_en' => 'Mohamed',
            'email' => 'mohamed@app.com',
            'password' => 123123,
            'phone' => '1234567895',
            'status' => 'active'
        ]);

        Admin::create([
            'name_ar' => 'حسام',
            'name_en' => 'Hossam',
            'email' => 'hossam@app.com',
            'password' => 123123,
            'phone' => '1234567896',
            'status' => 'active'
        ]);

    }
}
