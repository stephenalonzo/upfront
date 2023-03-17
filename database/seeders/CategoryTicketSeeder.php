<?php

namespace Database\Seeders;

use App\Models\CategoryTicket;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategoryTicketSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $categories = [
            [
                'category_id'           => 1,
                'ticket_id'             => 1
            ]
        ];

        foreach ($categories as $category)
        {

            CategoryTicket::create([
                'category_id'   => $category['category_id'],
                'ticket_id'     => $category['ticket_id']
            ]);

        }
        
    }

}
