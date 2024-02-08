<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Event;
use App\Models\User;
use Faker\Generator as Faker;

class EventSeeder extends Seeder
{
    /**
     * Run the database seeds.
     * Se chiamato singolarmente questo seeder genera 9 eventi, collegati a 0 utenti
     *
     * @return void
     */

    public function run(Faker $faker, $num_eventi = 9)
    {
        for ($i = 0; $i < $num_eventi; $i++) {
            $newEvent = new Event();

            $newEvent->name = $faker->sentence(3);
            $newEvent->date = $faker->date();
            $newEvent->available_tickets = $faker->randomNumber(3, false);
            $newEvent->user_id = $faker->randomElement($this->getUtentiID());

            $newEvent->save();
        }
    }

    private function getUtentiID()
    {
        return User::all()->pluck('id');
    }
}