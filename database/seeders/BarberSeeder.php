<?php

namespace Database\Seeders;

use App\Models\Barber;
use Illuminate\Database\Seeder;

class BarberSeeder extends Seeder
{
    public function run()
    {
        Barber::create(['name' => 'John Doe', 'email' => 'john@example.com', 'phone' => '123-456-7890']);
        Barber::create(['name' => 'Jane Smith', 'email' => 'jane@example.com', 'phone' => '987-654-3210']);
        Barber::create(['name' => 'Mike Johnson', 'email' => 'mike@example.com', 'phone' => '456-789-0123']);
    }
}
