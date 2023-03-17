<?php

namespace Database\Seeders;

use App\Models\PriorityTicket;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PriorityTicketSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $priorities = [
            [
                'priority_id'   => 1,
                'ticket_id'     => 1
            ]
        ];

        foreach ($priorities as $priority)
        {

            PriorityTicket::create([
                'priority_id'   => $priority['priority_id'],
                'ticket_id'     => $priority['ticket_id']
            ]);

        }
        
    }
    
}
