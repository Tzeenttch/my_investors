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
        Schema::create('spendings', function (Blueprint $table) {
            $table->id();
            $table->date('date');
            $table->string('bank');
            $table->string('category');
            $table->double('amount');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Schema::table('spendings', function (Blueprint $table) {
        //     $table->dropForeign(['user_id']);  
        // });
        Schema::table('users', function (Blueprint $table) {
            $table->dropForeign(['spending_id']);
            $table->dropForeign(['income_id']);   
        });
        Schema::dropIfExists('spendings');
    }
};
