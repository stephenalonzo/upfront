<?php

namespace Database\Seeders;

use App\Models\StatusTicket;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class StatusTicketSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $statuses = [
            [
                'status_id'     => 1,
                'ticket_id'     => 1
            ]
        ];

        foreach ($statuses as $status)
        {

            StatusTicket::create([
                'status_id' => $status['status_id'],
                'ticket_id' => $status['ticket_id']
            ]);

        }
        
    }

}
