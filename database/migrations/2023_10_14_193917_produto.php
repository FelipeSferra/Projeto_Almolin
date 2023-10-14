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
        Schema::create('produto', function (Blueprint $table) {
            $table->id();
            $table->string('desc',40);
            $table->double('custo',10,2);
            $table->integer('qtd');
            $table->unsignedBigInteger('id_cat');
            $table->foreign('id_cat')->references('id')->on('categoria')->onUpdate('cascade')->onDelete('cascade');
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
        Schema::dropIfExists('produto');
    }
};
