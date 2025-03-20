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
        Schema::create('regisztraciok', function (Blueprint $table) {
            $table->id('regisztracioID');
            $table->string('email')->unique();
            $table->string('jelszo');
            $table->string('felhasznaloNev')->unique();
            $table->double('testsuly');
            $table->integer('testmagassag');
            $table->integer('eletkor');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('regisztraciok');
    }
};
