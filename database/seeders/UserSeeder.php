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
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            [
                'name' => 'hoge',
                'email' => 'hoge@hoge.com',
                'password' => Hash::make('hogehoge'),
            ],
            [
                'name' => 'test',
                'email' => 'test@test.com',
                'password' => Hash::make('testtest'),
            ],
            [
                'name' => 'osugi',
                'email' => 'osugi@osugi.com',
                'password' => Hash::make('osugiosugi'),
            ],
            [
                'name' => 'rin',
                'email' => 'rin@rin.com',
                'password' => Hash::make('rinrin'),
            ],
            [
                'name' => 'miki',
                'email' => 'miki@miki.com',
                'password' => Hash::make('mikimiki'),
            ],
        ]);
    }
}
