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
        Schema::create('documents', function (Blueprint $table) {
            $table->id(); 
            $table->string('titre');
            $table->string('auteur');
            // $table->unsignedBigInteger('categories_id'); // Utiliser unsignedBigInteger pour les clés étrangères
            // $table->foreign('categories_id')->references('id')->on('categories'); // Définir category_id comme clé étrangère
            $table->string('fichier');
            $table->date('date');
            $table->string('description');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('documents');
    }
};
