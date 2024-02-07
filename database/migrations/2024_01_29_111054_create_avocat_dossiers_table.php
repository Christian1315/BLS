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
        Schema::create('avocat_dossiers', function (Blueprint $table) {
            $table->id();
            $table->foreignId("dossier_id")
            ->constrained('dossiers', 'id')
            ->onUpdate('CASCADE')
            ->onDelete('CASCADE');

            $table->foreignId("avocat_id")
            ->constrained('avocats', 'id')
            ->onUpdate('CASCADE')
            ->onDelete('CASCADE');
            $table->timestamps();
            $table->boolean("visible")->default(true);

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('avocat_dossiers');
    }
};
