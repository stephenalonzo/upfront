<?php

namespace Database\Seeders;

use App\Models\RoleUser;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RoleUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $users = [
            [
                'role_id'   => 1,
                'user_id'   => 1
            ],
            [
                'role_id'   => 1,
                'user_id'   => 2
            ],
            [
                'role_id'   => 1,
                'user_id'   => 3
            ],
            [
                'role_id'   => 2,
                'user_id'   => 4
            ],
        ];

        foreach ($users as $user)
        {

            RoleUser::create([
                'role_id' => $user['role_id'],
                'user_id' => $user['user_id']
            ]);

        }

    }

}
