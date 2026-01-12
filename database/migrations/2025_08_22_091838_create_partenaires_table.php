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
        Schema::create('partenaires', function (Blueprint $table) {
            $table->id();
            $table->string('nom')->comment('Nom du partenaire');
            $table->string('email')->unique()->comment('Email du partenaire');
            $table->string('telephone')->nullable()->comment('Numéro de téléphone du partenaire');
            $table->text('adresse')->nullable()->comment('Adresse du partenaire');
            $table->string('site_web')->nullable()->comment('Site web du partenaire');
            $table->string('logo')->nullable()->comment('Logo du partenaire');
            $table->string('status')->default('active')->comment('Statut du partenaire (active, inactive)');
            $table->text('note')->nullable()->comment('Notes supplémentaires sur le partenaire');
            $table->string('type')->default('standard')->comment('Type de partenaire');
            $table->string('name')->nullable()->comment('Nom du contact principal');
            $table->string('fonction')->nullable()->comment('Fonction du contact principal');
            $table->text('signature')->nullable()->comment('Signature du partenaire');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('partenaires');
    }
};
