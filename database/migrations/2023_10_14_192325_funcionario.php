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
        Schema::create('funcionario', function (Blueprint $table) {
            $table->id();
            $table->string('nome',40);
            $table->unsignedBigInteger('id_emp');
            $table->foreign('id_emp')->references('id')->on('empresa')->onDelete('cascade')->onUpdate('cascade');
            $table->string('cargo',40);
            $table->integer('nivel');
            $table->integer('dump')->default('0');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
