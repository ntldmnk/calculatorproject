<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('etkezesiNaplok', function (Blueprint $table) {
            $table->id('etkezesiNaploID');
            $table->string('etkezesiNaploNev') -> default('Névtelen');
            $table->foreignId('felhasznaloForeignID') -> references('regisztracioID') -> on('regisztraciok');
            $table->foreignId('etelekForeignId')-> references('etelID') -> on('etelek'); 
            $table->foreignId('koretekForeignId')-> references('koretID') -> on('koretek'); 
            $table->date('naplozasiDatum') -> default(DB::raw('CURRENT_TIMESTAMP'));    
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('etkezesiNaplok');
    }
};
