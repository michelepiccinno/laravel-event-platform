<?php

namespace Database\Seeders;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;


class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        if (User::where("email", "")) {
            $users = [
                [
                    'name' => 'Michele',
                    'email' => 'michele@mail.it',
                    'password' => '$2y$10$UKvEM1eeN4408996l7OlWOTmA7jDbjYGqGGupmLOMIcefUp0364Mm'
                ]
            ];
            foreach ($users as $user) {
                $newUser = new User();
                $newUser->fill($user);
                $newUser->save();
            }
        }
    }
}
