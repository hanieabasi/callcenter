<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RoleUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('role_user')->insertOrIgnore([
            [
                'user_id' => rand(1,10),
                'role_id' => rand(1,3)
            ],
            [
                'user_id' => rand(1,10),
                'role_id' => rand(1,3)
            ],
            [
                'user_id' => rand(1,10),
                'role_id' => rand(1,3)
            ],
            [
                'user_id' => rand(1,10),
                'role_id' => rand(1,3)
            ],
            [
                'user_id' => rand(1,10),
                'role_id' => rand(1,3)
            ],
            [
                'user_id' => rand(1,10),
                'role_id' => rand(1,3)
            ],
            [
                'user_id' => rand(1,10),
                'role_id' => rand(1,3)
            ]
        ]);
    }
}
