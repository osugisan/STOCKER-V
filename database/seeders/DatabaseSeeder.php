<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Group;
use App\Models\Tag;
use App\Models\User;
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
        $this->call([
            UserSeeder::class,
        ]);

        $users = User::all();

        Group::factory(10)->create()
            ->each(function (Group $group) use ($users) {
                $userIds = $users->random(rand(1, 5))->pluck('id')->toArray();
                $owners[] = ['owner' => true];

                for ($i = 1; $i < count($userIds); $i++) {
                    $owners[] = ['owner' => false];
                }
                
                $group->users()->attach( array_combine($userIds, $owners) );
            });

        foreach ($users as $user) {
            $groupIds = DB::table('group_user')->select('group_id')
                ->where('user_id', $user->id)
                ->get();

            $user->main_group = $groupIds[0]->group_id;
            $user->save();
        }
        
        Tag::factory(50)->create();
            
            // \App\Models\User::factory(10)->create();
            
            // \App\Models\User::factory()->create([
            //     'name' => 'Test User',
            //     'email' => 'test@example.com',
            // ]);
    }
}
    