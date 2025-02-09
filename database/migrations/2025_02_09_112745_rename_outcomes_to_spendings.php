<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::rename('outcomes', 'spendings'); // Renombrar la tabla en la base de datos
    }

    public function down()
    {
        Schema::rename('spendings', 'outcomes'); // Permite revertir el cambio si es necesario
    }
};

