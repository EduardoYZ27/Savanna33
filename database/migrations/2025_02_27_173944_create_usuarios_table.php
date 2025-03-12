<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::create('usuario', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            $table->string('apellido_paterno');
            $table->string('apellido_materno')->nullable();
            $table->string('numero_empleado')->unique();
            $table->string('password');
            $table->string('rol')->default('empleado'); // Puede ser 'admin' o 'empleado'
        });
    }

    public function down()
    {
        Schema::dropIfExists('usuario');
    }
};
