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
        Schema::create('dossiers', function (Blueprint $table) {
            $table->id();

            $table->foreignId("user")
            ->nullable()
            ->constrained("users", "id")
            ->onUpdate("CASCADE")
            ->onDelete("CASCADE");

            $table->foreignId("category")
            ->nullable()
            ->constrained("categorie_dossiers", "id")
            ->onUpdate("CASCADE")
            ->onDelete("CASCADE");

            
            $table->foreignId("statut")
            ->nullable()
            ->constrained("statuts", "id")
            ->onUpdate("CASCADE")
            ->onDelete("CASCADE");

            $table->string('name');
            $table->string('num');
            $table->string('reference');
            $table->string('amount');


            $table->string('date_create');
            $table->text('commentaire');
            $table->boolean("visible")->default(true);
            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('dossiers');
    }
};
