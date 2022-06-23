<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            [
                'name' => 'admin',
                'username' => 'admin',
                'password' => Hash::make('admin'),
                'level' => 'Admin'
            ],[
                'name' => 'visitor',
                'username' => 'visitor',
                'password' => Hash::make('visitor'),
                'level' => 'Visitor'
            ]
        ]);
    }
}
