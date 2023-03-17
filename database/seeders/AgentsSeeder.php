<?php

namespace Database\Seeders;

use App\Models\Agent;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AgentsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $agents = ['Steve Rogers', 'Tony Stark', 'Bruce Banner'];

        foreach ($agents as $agent)
        {

            Agent::create([
                'name' => $agent,
            ]);

        }
    }
}
