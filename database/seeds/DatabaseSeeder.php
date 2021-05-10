<?php

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
         $this->call(ZodiacsTableSeeder::class);
         $this->command->info('Zodiacs table seeded!');
    }
}
