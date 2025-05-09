<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            'name'=>'Suardi',
            'email'=>'SuardiAxelion@gmail.com',
            'password'=>bcrypt('Suardi1234'),
            'role'=>'admin',
            'updated_at'=>now(),
            'created_at'=>now()
        ]);
    }
}
