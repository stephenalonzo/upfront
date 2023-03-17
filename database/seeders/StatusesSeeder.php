<?php

namespace Database\Seeders;

use App\Models\Status;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class StatusesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Declare priorities variable and assign array with priorities
        $statuses = [
            [
                'title' => 'New',
                'color' => '#70e000'
            ],
            [
                'title' => 'In Progress',
                'color' => '#00a5cf'
            ],
            [
                'title' => 'Closed',
                'color' => '#000000'
            ]
        ];
        
        foreach ($statuses as $status)
        {

            Status::create([
                'title' => $status['title'],
                'color' => $status['color']
            ]);

        }

    }
}
