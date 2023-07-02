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
                'main_group' => 1,
            ],
            [
                'name' => 'test',
                'email' => 'test@test.com',
                'password' => Hash::make('testtest'),
                'main_group' => 1,
            ],
            [
                'name' => 'osugi',
                'email' => 'osugi@osugi.com',
                'password' => Hash::make('osugiosugi'),
                'main_group' => 1,
            ],
            [
                'name' => 'rin',
                'email' => 'rin@rin.com',
                'password' => Hash::make('rinrin'),
                'main_group' => 1,
            ],
            [
                'name' => 'miki',
                'email' => 'miki@miki.com',
                'password' => Hash::make('mikimiki'),
                'main_group' => 1,
            ],
        ]);
    }
}
