<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AuthorTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        for ($i = 0; $i < 10; $i++){
            DB::table('book')
                ->insert([
                    'name' => str_random(10),
            ]);
        }

        for ($i = 0; $i < 10; $i++){
            DB::table('author')
                ->insert([
                    'name' => str_random(15),
                ]);
        }

    }
}
