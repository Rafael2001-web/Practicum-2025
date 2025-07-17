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
        Schema::create('objestrategicos', function (Blueprint $table) {
            $table->id('idobjEstrategicos');
            $table->string('descripcion');
            $table->string('estado');
            $table->date('fechaRegistro');
            
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('objEstrategicos');
    }
};
