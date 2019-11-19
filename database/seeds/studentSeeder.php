<?php

use App\student;
use App\User;
use Illuminate\Database\Seeder;

class studentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */

    public function run()
    {
        $faker = Faker\Factory::create();

        $user = User::all();
        foreach ($user as $val) {
            if (!$val['isAdmin']) {
                student::create(
                    [
                        'user_id' => $val['uid'],
                        'studentID' => $faker->unique()->numberBetween(600510400,600510900)
                    ]
                );
            }
        }
    }
}
