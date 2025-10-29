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
        Schema::create('jocs', function (Blueprint $table) {
            $table->id();
            $table->string('nom');
            $table->string('estudi');
            $table->date('data_publicacio');
            $table->string('genere');
            //Número total de números 3, amb 1 decimal
            $table->decimal('puntuacio',3,1);
            $table->string('fotografia');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('jocs');
    }
};
