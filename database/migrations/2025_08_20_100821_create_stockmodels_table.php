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

        Schema::create('stockmodels', function (Blueprint $table) {
            $table->id();
            $table->foreignId('produitmodel_id')->constrained('produitmodels')->onDelete('cascade');
            $table->integer('quantity');
            $table->decimal('price', 50, 15  )->comment('Price per unit at the time of stock entry');
            $table->date('expiry_date')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('stockmodels');
    }
};
