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
        Schema::create('transacao', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_func');
            $table->foreign('id_func')->references('id')->on('users')->onUpdate('cascade')->onDelete('cascade');
            $table->unsignedBigInteger('id_emp');
            $table->foreign('id_emp')->references('id')->on('empresa')->onUpdate('cascade')->onDelete('cascade');
            $table->unsignedBigInteger('id_itm');
            $table->foreign('id_itm')->references('id')->on('produto')->onUpdate('cascade')->onDelete('cascade');
            $table->Double('qtd', 10,2);
            $table->unsignedBigInteger('id_arm');
            $table->foreign('id_arm')->references('id')->on('armazem')->onUpdate('cascade')->onDelete('cascade');
            $table->integer('dump')->default('0');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transacao');
    }
};
