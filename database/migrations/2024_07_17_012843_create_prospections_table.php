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
        Schema::create('prospections', function (Blueprint $table) {
            $table->id();
            $table->string('titre');
            $table->string('description');
            $table->unsignedBigInteger('prospect_id'); // Utiliser unsignedBigInteger pour les clés étrangères
            $table->foreign('prospect_id')  
                     ->references('id') 
                     ->on('prospects'); 
            $table->boolean('is_active');
            $table->date('date');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('prospections');
    }
};
