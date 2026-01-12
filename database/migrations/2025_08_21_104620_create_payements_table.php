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
        Schema::create('payements', function (Blueprint $table) {
            $table->id();
            $table->foreignId('client_id')->constrained('clients')->onDelete('cascade');
            $table->decimal('total', 10, 2);
            $table->string('payment_method'); // e.g., 'credit_card', 'paypal
            $table->foreignId('produitmodel_id')->constrained('produitmodels')->onDelete('cascade');
            $table->string('quantity')->nullable()->comment('Quantity of the product purchased');
            $table->date('payment_date')->nullable()->comment('Date of the payment');
            $table->integer('stock_disponible')->nullable()->comment('Stock available at the time of payment');
            $table->decimal('prix_unitaire', 10, 2)->nullable()->comment('Unit price of the product at the time of payment');
            $table->enum('status', ['pending', 'paid', 'failed', 'refunded'])->default('pending')->comment('Status of the payment');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('payements');
    }
};
