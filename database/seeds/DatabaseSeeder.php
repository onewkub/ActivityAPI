<?php

use App\student;
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
        $this->call([
            // ArticleSeeder::class,
            // UserSeeder::class,
            // studentSeeder::class
        ]);
    }
}
