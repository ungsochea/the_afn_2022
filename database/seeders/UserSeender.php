<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserSeender extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            ['name'=>'Super Admin','email'=>'superadmin@gmail.com','username'=>'superAdmin','role'=>'superAdmin','is_activated'=>'1','password' => bcrypt('123456789')],
            ['name'=>'Admin','email'=>'admin@gmail.com','username'=>'admin','role'=>'admin','is_activated'=>'1','password' => bcrypt('123456789')],
            ['name'=>'Editor','email'=>'editor@gmail.com','username'=>'editor','role'=>'editor','is_activated'=>'1','password' => bcrypt('123456789')],
            ['name'=>'Media','email'=>'media@gmail.com','username'=>'media','role'=>'media','is_activated'=>'1','password' => bcrypt('123456789')],
        ]);
    }
}
