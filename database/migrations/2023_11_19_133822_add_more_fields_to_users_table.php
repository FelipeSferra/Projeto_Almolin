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
        Schema::table('users', function (Blueprint $table) {
            $table->unique('name');
            $table->string('email')->nullable()->change();
            $table->renameColumn('name', 'username');
            $table->string('nome',40);
            $table->integer('level')->default(1);
            $table->string('cargo',40);
            $table->unsignedBigInteger('id_emp');
            $table->foreign('id_emp')->references('id')->on('empresa')->onDelete('cascade')->onUpdate('cascade');
            $table->integer('dump')->default('0');
            $table->dropColumn('email_verified_at');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            //
        });
    }
};
