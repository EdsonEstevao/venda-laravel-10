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
        Schema::create('servidores', function (Blueprint $table) {
            $table->id();
            $table->foreignId('secretaria_id')->constrained('secretarias')->onDelete('CASCADE');
            $table->string('lotacao')->nullable();
            $table->string('cargo')->nullable();
            $table->string('matricula')->nullable();
            $table->string('nome');
            $table->string('situacao')->nullable();
            $table->string('complemento')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('servidores');
    }
};
