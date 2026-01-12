<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('produitmodels', function (Blueprint $table) {
            $table->string('slug', 60)->nullable()->after('name'); 
            // ->nullable() si tu veux autoriser vide
            // ->unique() si tu veux forcer l’unicité
        });
    }

    public function down(): void
    {
        Schema::table('produitmodels', function (Blueprint $table) {
            $table->dropColumn('slug');
        });
    }
};
