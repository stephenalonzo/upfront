<?php

namespace Database\Seeders;

use App\Models\AgentTicket;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AgentTicketSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $agents = [
            [
                'agent_id'          => 1,
                'ticket_id'         => 1
            ]
        ];

        foreach ($agents as $agent)
        {

            AgentTicket::create([
                'agent_id'  => $agent['agent_id'],
                'ticket_id' => $agent['ticket_id']
            ]);

        }
        
    }
}
