<?php

namespace Database\Seeders;

use App\Models\Spending;
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
        Spending::factory()->count(10)->create();
    }
}
