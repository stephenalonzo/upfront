<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {

        \App\Models\User::factory(1)->create([
            'name'      => 'Steve Rogers',
            'email'     => 'captainamerica@avengers.com',
            'password'  => bcrypt('icandothisallday')
        ]);
        
        \App\Models\User::factory(1)->create([
            'name'      => 'Tony Stark',
            'email'     => 'ironman@avengers.com',
            'password'  => bcrypt('iloveyou3000')
        ]);

        \App\Models\User::factory(1)->create([
            'name'      => 'Bruce Banner',
            'email'     => 'thehulk@avengers.com',
            'password'  => bcrypt('hulksmash')
        ]);

        \App\Models\User::factory(1)->create([
            'name'      => 'John Cena',
            'email'     => 'ucantseeme@wwe.com',
            'password'  => bcrypt('ucantseeme')
        ]);

        \App\Models\Ticket::factory(1)->create([
            'name'          => 'John Cena',
            'email'         => 'ucantseeme@wwe.com',
            'subject'       => 'Test',
            'description'   => 'Test',
            'agent_id'      => '1'
        ]);

        $this->call([
            AgentsSeeder::class,
            AgentTicketSeeder::class,
            CategoriesSeeder::class,
            CategoryTicketSeeder::class,
            PrioritiesSeeder::class,
            PriorityTicketSeeder::class,
            RolesSeeder::class,
            RoleUserSeeder::class,
            StatusesSeeder::class,
            StatusTicketSeeder::class
        ]);
        
    }
}
