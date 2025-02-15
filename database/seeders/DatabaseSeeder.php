<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Database\Seeders\IncomeSeeder;
use Database\Seeders\OutcomeSeeder;


class DatabaseSeeder extends Seeder
{
    
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        ini_set('memory_limit', '1G');
        $this->call([
            IncomeSeeder::class,
            OutcomeSeeder::class
        ]);
    }
}
