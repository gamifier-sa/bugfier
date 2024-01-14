<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BugSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('bugs')->insert([
            'title'             => 'bug one',
            'description'       => 'ما هو "لوريم إيبسوم" ؟ لوريم إيبسوم(Lorem Ipsum) هو ببساطة نص شكلي (بمعنى أن الغاية هي الشكل وليس المحتوى) ويُستخدم في صناعات المطابع ودور النشر. كان لوريم',
            'point'             => 30,
            'created_by'        => 1,
            'responsible_admin' => 6,
            'project_id'        => 1,
            'status_id'         => 1,
            'images'            => 'a:1:{i:0;s:26:"tempelet_1704812418img.png";}',
            'created_at'        => Carbon::now(),
            'updated_at'        => Carbon::now()
        ]);


        DB::table('bugs')->insert([
            'title'             => 'bug two',
            'description'       => 'ما هو "لوريم إيبسوم" ؟ لوريم إيبسوم(Lorem Ipsum) هو ببساطة نص شكلي (بمعنى أن الغاية هي الشكل وليس المحتوى) ويُستخدم في صناعات المطابع ودور النشر. كان لوريم',
            'point'             => 20,
            'created_by'        => 1,
            'responsible_admin' => 5,
            'project_id'        => 1,
            'status_id'         => 1,
            'images'            => 'a:1:{i:0;s:26:"tempelet_1704812418img.png";}',
            'created_at'        => Carbon::now(),
            'updated_at'        => Carbon::now()
        ]);


        DB::table('bugs')->insert([
            'title'             => 'bug three',
            'description'       => 'ما هو "لوريم إيبسوم" ؟ لوريم إيبسوم(Lorem Ipsum) هو ببساطة نص شكلي (بمعنى أن الغاية هي الشكل وليس المحتوى) ويُستخدم في صناعات المطابع ودور النشر. كان لوريم',
            'point'             => 70,
            'created_by'        => 3,
            'responsible_admin' => 4,
            'project_id'        => 3,
            'status_id'         => 4,
            'images'            => 'a:1:{i:0;s:26:"tempelet_1704812418img.png";}',
            'created_at'        => Carbon::now(),
            'updated_at'        => Carbon::now()
        ]);


        DB::table('bugs')->insert([
            'title'             => 'bug four',
            'description'       => 'ما هو "لوريم إيبسوم" ؟ لوريم إيبسوم(Lorem Ipsum) هو ببساطة نص شكلي (بمعنى أن الغاية هي الشكل وليس المحتوى) ويُستخدم في صناعات المطابع ودور النشر. كان لوريم',
            'point'             => 217,
            'created_by'        => 4,
            'responsible_admin' => 3,
            'project_id'        => 3,
            'status_id'         => 4,
            'images'            => 'a:1:{i:0;s:26:"tempelet_1704812418img.png";}',
            'created_at'        => Carbon::now(),
            'updated_at'        => Carbon::now()
        ]);


        DB::table('bugs')->insert([
            'title'             => 'bug five',
            'description'       => 'ما هو "لوريم إيبسوم" ؟ لوريم إيبسوم(Lorem Ipsum) هو ببساطة نص شكلي (بمعنى أن الغاية هي الشكل وليس المحتوى) ويُستخدم في صناعات المطابع ودور النشر. كان لوريم',
            'point'             => 217,
            'created_by'        => 5,
            'responsible_admin' => 2,
            'project_id'        => 5,
            'status_id'         => 3,
            'images'            => 'a:1:{i:0;s:26:"tempelet_1704812418img.png";}',
            'created_at'        => Carbon::now(),
            'updated_at'        => Carbon::now()
        ]);

        DB::table('bugs')->insert([
            'title'             => 'bug six',
            'description'       => 'ما هو "لوريم إيبسوم" ؟ لوريم إيبسوم(Lorem Ipsum) هو ببساطة نص شكلي (بمعنى أن الغاية هي الشكل وليس المحتوى) ويُستخدم في صناعات المطابع ودور النشر. كان لوريم',
            'point'             => 217,
            'created_by'        => 6,
            'responsible_admin' => 1,
            'project_id'        => 6,
            'status_id'         => 3,
            'images'            => 'a:1:{i:0;s:26:"tempelet_1704812418img.png";}',
            'created_at'        => Carbon::now(),
            'updated_at'        => Carbon::now()
        ]);


        DB::table('bugs')->insert([
            'title'             => 'bug seven',
            'description'       => 'ما هو "لوريم إيبسوم" ؟ لوريم إيبسوم(Lorem Ipsum) هو ببساطة نص شكلي (بمعنى أن الغاية هي الشكل وليس المحتوى) ويُستخدم في صناعات المطابع ودور النشر. كان لوريم',
            'point'             => 30,
            'created_by'        => 1,
            'responsible_admin' => 6,
            'project_id'        => 2,
            'status_id'         => 2,
            'images'            => 'a:1:{i:0;s:26:"tempelet_1704812418img.png";}',
            'created_at'        => Carbon::now(),
            'updated_at'        => Carbon::now()
        ]);


        DB::table('bugs')->insert([
            'title'             => 'bug eight',
            'description'       => 'ما هو "لوريم إيبسوم" ؟ لوريم إيبسوم(Lorem Ipsum) هو ببساطة نص شكلي (بمعنى أن الغاية هي الشكل وليس المحتوى) ويُستخدم في صناعات المطابع ودور النشر. كان لوريم',
            'point'             => 20,
            'created_by'        => 1,
            'responsible_admin' => 5,
            'project_id'        => 4,
            'status_id'         => 5,
            'images'            => 'a:1:{i:0;s:26:"tempelet_1704812418img.png";}',
            'created_at'        => Carbon::now(),
            'updated_at'        => Carbon::now()
        ]);


        DB::table('bugs')->insert([
            'title'             => 'bug nine',
            'description'       => 'ما هو "لوريم إيبسوم" ؟ لوريم إيبسوم(Lorem Ipsum) هو ببساطة نص شكلي (بمعنى أن الغاية هي الشكل وليس المحتوى) ويُستخدم في صناعات المطابع ودور النشر. كان لوريم',
            'point'             => 70,
            'created_by'        => 3,
            'responsible_admin' => 4,
            'project_id'        => 3,
            'status_id'         => 4,
            'images'            => 'a:1:{i:0;s:26:"tempelet_1704812418img.png";}',
            'created_at'        => Carbon::now(),
            'updated_at'        => Carbon::now()
        ]);


        DB::table('bugs')->insert([
            'title'             => 'bug ten',
            'description'       => 'ما هو "لوريم إيبسوم" ؟ لوريم إيبسوم(Lorem Ipsum) هو ببساطة نص شكلي (بمعنى أن الغاية هي الشكل وليس المحتوى) ويُستخدم في صناعات المطابع ودور النشر. كان لوريم',
            'point'             => 217,
            'created_by'        => 4,
            'responsible_admin' => 3,
            'project_id'        => 4,
            'status_id'         => 3,
            'images'            => 'a:1:{i:0;s:26:"tempelet_1704812418img.png";}',
            'created_at'        => Carbon::now(),
            'updated_at'        => Carbon::now()
        ]);


        DB::table('bugs')->insert([
            'title'             => 'bug 11',
            'description'       => 'ما هو "لوريم إيبسوم" ؟ لوريم إيبسوم(Lorem Ipsum) هو ببساطة نص شكلي (بمعنى أن الغاية هي الشكل وليس المحتوى) ويُستخدم في صناعات المطابع ودور النشر. كان لوريم',
            'point'             => 217,
            'created_by'        => 5,
            'responsible_admin' => 2,
            'project_id'        => 5,
            'status_id'         => 3,
            'images'            => 'a:1:{i:0;s:26:"tempelet_1704812418img.png";}',
            'created_at'        => Carbon::now(),
            'updated_at'        => Carbon::now()
        ]);

        DB::table('bugs')->insert([
            'title'             => 'bug 12',
            'description'       => 'ما هو "لوريم إيبسوم" ؟ لوريم إيبسوم(Lorem Ipsum) هو ببساطة نص شكلي (بمعنى أن الغاية هي الشكل وليس المحتوى) ويُستخدم في صناعات المطابع ودور النشر. كان لوريم',
            'point'             => 217,
            'created_by'        => 6,
            'responsible_admin' => 1,
            'project_id'        => 6,
            'status_id'         => 3,
            'images'            => 'a:1:{i:0;s:26:"tempelet_1704812418img.png";}',
            'created_at'        => Carbon::now(),
            'updated_at'        => Carbon::now()
        ]);



        DB::table('bugs')->insert([
            'title'             => 'bug 13',
            'description'       => 'ما هو "لوريم إيبسوم" ؟ لوريم إيبسوم(Lorem Ipsum) هو ببساطة نص شكلي (بمعنى أن الغاية هي الشكل وليس المحتوى) ويُستخدم في صناعات المطابع ودور النشر. كان لوريم',
            'point'             => 30,
            'created_by'        => 1,
            'responsible_admin' => 6,
            'project_id'        => 1,
            'status_id'         => 1,
            'images'            => 'a:1:{i:0;s:26:"tempelet_1704812418img.png";}',
            'created_at'        => Carbon::now(),
            'updated_at'        => Carbon::now()
        ]);


        DB::table('bugs')->insert([
            'title'             => 'bug 14',
            'description'       => 'ما هو "لوريم إيبسوم" ؟ لوريم إيبسوم(Lorem Ipsum) هو ببساطة نص شكلي (بمعنى أن الغاية هي الشكل وليس المحتوى) ويُستخدم في صناعات المطابع ودور النشر. كان لوريم',
            'point'             => 20,
            'created_by'        => 1,
            'responsible_admin' => 5,
            'project_id'        => 2,
            'status_id'         => 2,
            'images'            => 'a:1:{i:0;s:26:"tempelet_1704812418img.png";}',
            'created_at'        => Carbon::now(),
            'updated_at'        => Carbon::now()
        ]);


        DB::table('bugs')->insert([
            'title'             => 'bug 15',
            'description'       => 'ما هو "لوريم إيبسوم" ؟ لوريم إيبسوم(Lorem Ipsum) هو ببساطة نص شكلي (بمعنى أن الغاية هي الشكل وليس المحتوى) ويُستخدم في صناعات المطابع ودور النشر. كان لوريم',
            'point'             => 70,
            'created_by'        => 3,
            'responsible_admin' => 4,
            'project_id'        => 2,
            'status_id'         => 2,
            'images'            => 'a:1:{i:0;s:26:"tempelet_1704812418img.png";}',
            'created_at'        => Carbon::now(),
            'updated_at'        => Carbon::now()
        ]);


        DB::table('bugs')->insert([
            'title'             => 'bug 16',
            'description'       => 'ما هو "لوريم إيبسوم" ؟ لوريم إيبسوم(Lorem Ipsum) هو ببساطة نص شكلي (بمعنى أن الغاية هي الشكل وليس المحتوى) ويُستخدم في صناعات المطابع ودور النشر. كان لوريم',
            'point'             => 217,
            'created_by'        => 4,
            'responsible_admin' => 3,
            'project_id'        => 2,
            'status_id'         => 3,
            'images'            => 'a:1:{i:0;s:26:"tempelet_1704812418img.png";}',
            'created_at'        => Carbon::now(),
            'updated_at'        => Carbon::now()
        ]);


        DB::table('bugs')->insert([
            'title'             => 'bug 17',
            'description'       => 'ما هو "لوريم إيبسوم" ؟ لوريم إيبسوم(Lorem Ipsum) هو ببساطة نص شكلي (بمعنى أن الغاية هي الشكل وليس المحتوى) ويُستخدم في صناعات المطابع ودور النشر. كان لوريم',
            'point'             => 217,
            'created_by'        => 5,
            'responsible_admin' => 2,
            'project_id'        => 5,
            'status_id'         => 3,
            'images'            => 'a:1:{i:0;s:26:"tempelet_1704812418img.png";}',
            'created_at'        => Carbon::now(),
            'updated_at'        => Carbon::now()
        ]);

        DB::table('bugs')->insert([
            'title'             => 'bug 18',
            'description'       => 'ما هو "لوريم إيبسوم" ؟ لوريم إيبسوم(Lorem Ipsum) هو ببساطة نص شكلي (بمعنى أن الغاية هي الشكل وليس المحتوى) ويُستخدم في صناعات المطابع ودور النشر. كان لوريم',
            'point'             => 217,
            'created_by'        => 6,
            'responsible_admin' => 1,
            'project_id'        => 6,
            'status_id'         => 3,
            'images'            => 'a:1:{i:0;s:26:"tempelet_1704812418img.png";}',
            'created_at'        => Carbon::now(),
            'updated_at'        => Carbon::now()
        ]);



        DB::table('bugs')->insert([
            'title'             => 'bug 19',
            'description'       => 'ما هو "لوريم إيبسوم" ؟ لوريم إيبسوم(Lorem Ipsum) هو ببساطة نص شكلي (بمعنى أن الغاية هي الشكل وليس المحتوى) ويُستخدم في صناعات المطابع ودور النشر. كان لوريم',
            'point'             => 30,
            'created_by'        => 1,
            'responsible_admin' => 6,
            'project_id'        => 1,
            'status_id'         => 1,
            'images'            => 'a:1:{i:0;s:26:"tempelet_1704812418img.png";}',
            'created_at'        => Carbon::now(),
            'updated_at'        => Carbon::now()
        ]);


        DB::table('bugs')->insert([
            'title'             => 'bug 20',
            'description'       => 'ما هو "لوريم إيبسوم" ؟ لوريم إيبسوم(Lorem Ipsum) هو ببساطة نص شكلي (بمعنى أن الغاية هي الشكل وليس المحتوى) ويُستخدم في صناعات المطابع ودور النشر. كان لوريم',
            'point'             => 20,
            'created_by'        => 1,
            'responsible_admin' => 5,
            'project_id'        => 2,
            'status_id'         => 2,
            'images'            => 'a:1:{i:0;s:26:"tempelet_1704812418img.png";}',
            'created_at'        => Carbon::now(),
            'updated_at'        => Carbon::now()
        ]);


        DB::table('bugs')->insert([
            'title'             => 'bug 21',
            'description'       => 'ما هو "لوريم إيبسوم" ؟ لوريم إيبسوم(Lorem Ipsum) هو ببساطة نص شكلي (بمعنى أن الغاية هي الشكل وليس المحتوى) ويُستخدم في صناعات المطابع ودور النشر. كان لوريم',
            'point'             => 70,
            'created_by'        => 3,
            'responsible_admin' => 4,
            'project_id'        => 3,
            'status_id'         => 4,
            'images'            => 'a:1:{i:0;s:26:"tempelet_1704812418img.png";}',
            'created_at'        => Carbon::now(),
            'updated_at'        => Carbon::now()
        ]);


        DB::table('bugs')->insert([
            'title'             => 'bug 22',
            'description'       => 'ما هو "لوريم إيبسوم" ؟ لوريم إيبسوم(Lorem Ipsum) هو ببساطة نص شكلي (بمعنى أن الغاية هي الشكل وليس المحتوى) ويُستخدم في صناعات المطابع ودور النشر. كان لوريم',
            'point'             => 217,
            'created_by'        => 4,
            'responsible_admin' => 3,
            'project_id'        => 4,
            'status_id'         => 3,
            'images'            => 'a:1:{i:0;s:26:"tempelet_1704812418img.png";}',
            'created_at'        => Carbon::now(),
            'updated_at'        => Carbon::now()
        ]);


        DB::table('bugs')->insert([
            'title'             => 'bug 23',
            'description'       => 'ما هو "لوريم إيبسوم" ؟ لوريم إيبسوم(Lorem Ipsum) هو ببساطة نص شكلي (بمعنى أن الغاية هي الشكل وليس المحتوى) ويُستخدم في صناعات المطابع ودور النشر. كان لوريم',
            'point'             => 217,
            'created_by'        => 5,
            'responsible_admin' => 2,
            'project_id'        => 5,
            'status_id'         => 3,
            'images'            => 'a:1:{i:0;s:26:"tempelet_1704812418img.png";}',
            'created_at'        => Carbon::now(),
            'updated_at'        => Carbon::now()
        ]);

        DB::table('bugs')->insert([
            'title'             => 'bug 24',
            'description'       => 'ما هو "لوريم إيبسوم" ؟ لوريم إيبسوم(Lorem Ipsum) هو ببساطة نص شكلي (بمعنى أن الغاية هي الشكل وليس المحتوى) ويُستخدم في صناعات المطابع ودور النشر. كان لوريم',
            'point'             => 217,
            'created_by'        => 6,
            'responsible_admin' => 1,
            'project_id'        => 6,
            'status_id'         => 3,
            'images'            => 'a:1:{i:0;s:26:"tempelet_1704812418img.png";}',
            'created_at'        => Carbon::now(),
            'updated_at'        => Carbon::now()
        ]);
    }
}
