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
        Schema::create('factures', function (Blueprint $table) {
            $table->id();
            $table->foreignId('client_id')->constrained('clients')->onDelete('cascade');
            $table->foreignId('payement_id')->constrained('payements')->onDelete('cascade');
            $table->string('numero_facture')->unique()->comment('Numéro de la facture');
            $table->decimal('montant_total', 10, 2)->comment('Montant total de la facture');
            $table->json('produit_info')->comment('Informations du produit (nom, prix, quantité)');
            $table->string('status')->default('draft')->comment('Statut de la facture');
            $table->text('notes')->nullable()->comment('Notes supplémentaires sur la facture');
            $table->string('date_facture')->default(now())->comment('Date de facturation');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('factures');
    }
};
