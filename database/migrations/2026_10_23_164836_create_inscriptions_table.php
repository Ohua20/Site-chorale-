<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Crée la table des inscriptions.
     */
    public function up(): void
    {
        Schema::create('inscriptions', function (Blueprint $table) {
            $table->id();

            // Informations personnelles
            $table->string('nom', 100);
            $table->string('prenoms', 150);
            $table->string('telephone', 20);
            $table->string('whatsapp', 20)->nullable();
            $table->string('quartier', 150);

            // Expérience en chorale
            $table->boolean('deja_chorale');

            // Voix musicale
            $table->enum('voix', [
                'soprano',
                'alto',
                'tenor',
                'basse',
            ])->nullable();

            // Ancienneté dans une chorale
            $table->enum('experience', [
                'aucune',
                'moins-1-an',
                '1-3-ans',
                '3-5-ans',
                'plus-5-ans',
            ])->nullable();

            // Motivation du candidat
            $table->string('motivation', 300)->nullable();

            // Dates de création et de modification
            $table->timestamps();
        });
    }

    /**
     * Supprime la table lors du retour arrière.
     */
    public function down(): void
    {
        Schema::dropIfExists('inscriptions');
    }
};
