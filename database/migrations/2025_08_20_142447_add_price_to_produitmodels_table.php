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
        Schema::table('produitmodels', function (Blueprint $table) {
            $table->decimal('price', 8, 2)->after('description')->nullable()->comment('Price of the product');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('produitmodels', function (Blueprint $table) {
            //
        });
    }
};
