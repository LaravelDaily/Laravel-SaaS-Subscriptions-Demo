<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use LucasDotVin\Soulbscription\Models\Plan;

class UsersTableSeeder extends Seeder
{
    public function run()
    {
        $users = [
            [
                'id'             => 1,
                'name'           => 'Admin',
                'email'          => 'admin@admin.com',
                'password'       => bcrypt('password'),
                'remember_token' => null,
                'locale'         => '',
            ],
        ];

        User::insert($users);

        User::find(1)->subscribeTo(Plan::where('name', 'Trial')->first());
    }
}
