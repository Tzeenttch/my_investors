<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        //Should of update the table users with these new fields
        Schema::table('users', function (Blueprint $table) {
            $table->unsignedBigInteger('income_id')->nullable();
            $table->unsignedBigInteger('spending_id')->nullable();

            $table->foreign('income_id')->references('id')->on('incomes');
            $table->foreign('spending_id')->references('id')->on('spendings');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            //
        });
    }
};
