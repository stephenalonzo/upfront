<?php

namespace Database\Seeders;

use App\Models\Priority;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PrioritiesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Declare priorities variable and assign array with priorities
        $priorities = [
            [
                'title' => 'Low',
                'color' => '#faa307'
            ],
            [
                'title' => 'Medium',
                'color' => '#e85d04'
            ],
            [
                'title' => 'High',
                'color' => '#d00000'
            ]
        ];
        
        foreach ($priorities as $priority)
        {

            Priority::create([
                'title' => $priority['title'],
                'color' => $priority['color']
            ]);

        }

    }
}
