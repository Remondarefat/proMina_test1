<?php

// DatabaseSeeder.php

use Illuminate\Database\Seeder;
use App\Models\Admin;
use Database\Factories\AdminFactory;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // Call the Admin factory
        Admin::factory(3)->create();

        // Add other seeders if needed
    }
}
