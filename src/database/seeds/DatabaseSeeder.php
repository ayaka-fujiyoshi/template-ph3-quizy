<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        // $this->call(PeopleTableSeeder::class);
        $this->call(RestdataTableSeeder::class);
        // $this->call(QuizTableSeeder::class);  //QuizTableSeeder がシード実行時に呼び出される
    }
}
