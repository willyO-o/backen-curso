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
        Schema::create('establecimiento', function (Blueprint $table) {
            $table->id();
            $table->string('nombre',250);
            $table->text('descripcion');
            $table->string('direccion',250);
            $table->string('imagen');
            $table->string('telefono',20);
            $table->string('email',250)->nullable();
            $table->string('website',250)->nullable();
            $table->string('horario_apertura',250);
            $table->string('horario_cierre',250);
            $table->string('latitud',150);
            $table->string('longitud',150);
            $table->enum('estado',['ACTIVO','INACTIVO'])->default('ACTIVO');
            $table->foreignId('categoria_id')->constrained('categoria')->onDelete('restrict');
            $table->foreignId('user_id')->constrained('users')->onDelete('restrict');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('establecimiento');
    }
};
