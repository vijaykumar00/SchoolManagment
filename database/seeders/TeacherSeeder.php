<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class TeacherSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    DB::table('teachers')->insert([[
        'name'=>'priyanka',
        'user_id'=>1
    ],
    [
        'name'=>'hitesh',
         'user_id'=>2
    ]
    ]);
    }
}
