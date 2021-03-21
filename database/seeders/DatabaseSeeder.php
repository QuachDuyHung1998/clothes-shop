<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        DB::table('users')->insert([
            [
                'name' => 'Admin',
                'email' => 'admin@gmail.com',
                'password' => bcrypt('123456'),
                'level' => 1,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ]
        ]);

        // DB::table('categories')->insert([
        //     [
        //         'name' => 'Nữ',
        //         'slug' => 'nu',
        //         'is_children' => 0,
        //         'level' => 1,
        //         'status' => 1,
        //         'created_at' => date('Y-m-d H:i:s'),
        //         'updated_at' => date('Y-m-d H:i:s')
        //     ],
        //     [
        //         'name' => 'Nam',
        //         'slug' => 'nam',
        //         'is_children' => 0,
        //         'level' => 1,
        //         'status' => 1,
        //         'created_at' => date('Y-m-d H:i:s'),
        //         'updated_at' => date('Y-m-d H:i:s')
        //     ],
        //     [
        //         'name' => 'Trẻ em',
        //         'slug' => 'tre-em',
        //         'is_children' => 0,
        //         'level' => 1,
        //         'status' => 1,
        //         'created_at' => date('Y-m-d H:i:s'),
        //         'updated_at' => date('Y-m-d H:i:s')
        //     ]
        // ]);
    }
}