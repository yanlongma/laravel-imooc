<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StudentTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('students')->insert([

            ['name' => 'sean', 'age' => 18],
            ['name' => 'immoc', 'age' => 20],
        ]);
    }
}
