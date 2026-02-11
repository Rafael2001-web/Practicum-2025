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
        Schema::table('actividad_auditorias', function (Blueprint $table) {
            $table->dropForeign(['actividad_id']);
        });

        Schema::table('actividad_auditorias', function (Blueprint $table) {
            $table->unsignedBigInteger('actividad_id')->nullable()->change();
            $table->enum('accion', ['CREAR', 'ACTUALIZAR', 'ELIMINAR', 'INDEX', 'SHOW'])->change();
            $table->string('modulo', 50)->default('ACTIVIDADES')->after('accion');
            $table->string('ruta')->nullable()->after('detalle');
            $table->string('metodo', 10)->nullable()->after('ruta');
            $table->string('ip', 45)->nullable()->after('metodo');
            $table->string('user_agent')->nullable()->after('ip');
        });

        Schema::table('actividad_auditorias', function (Blueprint $table) {
            $table->foreign('actividad_id')->references('id')->on('actividades')->nullOnDelete();
            $table->index('modulo');
            $table->index('ruta');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('actividad_auditorias', function (Blueprint $table) {
            $table->dropForeign(['actividad_id']);
            $table->dropIndex(['modulo']);
            $table->dropIndex(['ruta']);
            $table->dropColumn(['modulo', 'ruta', 'metodo', 'ip', 'user_agent']);
        });

        Schema::table('actividad_auditorias', function (Blueprint $table) {
            $table->unsignedBigInteger('actividad_id')->nullable(false)->change();
            $table->enum('accion', ['CREAR', 'ACTUALIZAR', 'ELIMINAR'])->change();
            $table->foreign('actividad_id')->references('id')->on('actividades')->onDelete('cascade');
        });
    }
};
