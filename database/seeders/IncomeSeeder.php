<?php

namespace Database\Seeders;

use App\Models\Income;
use Database\Factories\IncomeFactory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class IncomeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Income::factory()->count(10)->create();
    }
}