<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('hotels', function (Blueprint $table) {
            $table->id();
            $table->text('nom_hotel');
            $table->longText('dèscription');
            $table->text('nom_chambre');
            $table->integer('prix');
            $table->integer('nombre_lits');
            $table->integer('max_adultes');
            $table->integer('max_enfants');
            $table->enum('statut', ['disponible', 'non_disponible', 'reserve']);
            $table->string('image_path');
            $table->unsignedBigInteger('category_id')->nullable();
            $table->foreign('category_id')->references('id')->on('categories')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('hotels');
    }
};

