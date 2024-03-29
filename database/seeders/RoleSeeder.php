<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('roles')->insert([
            [
                'title' => 'manager',
                'priority' => 3
            ],
            [
                'title' => 'supervisor',
                'priority' => 2
            ],
            [
                'title' => 'responder',
                'priority' => 1
            ]
        ]);
    }
}
