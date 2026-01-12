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
        Schema::create('prix_partenaires', function (Blueprint $table) {
            $table->id();
            $table->string('prix');
            $table->string('condition_technique');
            $table->foreignId('partenaire_id')->constrained()->onDelete('cascade');
            $table->string('categorie')->nullable();
            $table->string('description')->nullable();
            $table->string('nom_produit')->nullable();
            $table->string('prix_remise')->nullable();
            $table->string('pourcentage_remise')->nullable();
            $table->string('type_prix')->nullable();
            $table->date('date_debut')->nullable();
            $table->date('date_fin')->nullable();
            $table->boolean('est_actif')->default(true);
            $table->timestamps();
        });
    }

     /* Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('prix_partenaires');
    }
};
