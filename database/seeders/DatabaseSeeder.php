<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;


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
        DB::table('admin')->insert([
            'admin_name' => 'huydv04',
            'admin_email' => 'huydv@gmail.com',
            'admin_phone' =>'123456788',
            'role' => '1',  
            'admin_password' => Hash::make(123456),
        ]);
    }
}
