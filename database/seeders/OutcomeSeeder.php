<?php

namespace Database\Seeders;

use App\Models\Outcome;
use Database\Factories\IncomeFactory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class OutcomeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Outcome::factory()->count(50)->create();
    }
}
