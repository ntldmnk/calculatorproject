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
        Schema::create('etelek', function (Blueprint $table) {
            $table->id('etelID');
            $table->string('etelNev')->unique();
            $table->double('etelEnergia');
            $table->double('etelFeherje');
            $table->double('etelZsir');
            $table->double('etelSzenhidrat');
            $table->boolean('etelVegan');   
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('etelek');
    }
};
