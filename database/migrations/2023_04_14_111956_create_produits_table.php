<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('produits', function (Blueprint $table) {
            $table->id();
            $table->string('nom_produit');
            $table->string('prix_produit');
            $table->string('quantite_produit');
            $table->string('short_description')->nullable();
            $table->string('long_description')->nullable();
            $table->string('image_produit');
            
            $table->timestamps();
        });

        // table pivaut pour les tables categorie et produit
        Schema::create('categorie_produit', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('categorie_id');
            $table->unsignedBigInteger('produit_id');
            $table->timestamps();

            // Définir les clés étrangères
            $table->foreign('categorie_id')->references('id')->on('categories');
            $table->foreign('produit_id')->references('id')->on('produits');
        });

        // table pivaut pour les tables sous categorie et produit
        Schema::create('sous_categorie_produit', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('sous_categorie_id')->default(0);
            $table->unsignedBigInteger('produit_id');
            $table->timestamps();

            // Définir les clés étrangères
            $table->foreign('sous_categorie_id')->references('id')->on('souscategories');
            $table->foreign('produit_id')->references('id')->on('produits');
        });


       // table pivaut pour les tables taille et produit
        Schema::create('taille_produit', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('taille_id')->default(0);
            $table->unsignedBigInteger('produit_id');
            $table->timestamps();

            // Définir les clés étrangères
            $table->foreign('taille_id')->references('id')->on('tailles')
                                                            ->constrained();
            $table->foreign('produit_id')->references('id')->on('produits');
        });


        // table pivaut pour les tables couleur et produit
        Schema::create('couleur_produit', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('couleur_id')->default(0);
            $table->unsignedBigInteger('produit_id');
            $table->timestamps();

            // Définir les clés étrangères
            $table->foreign('couleur_id')->references('id')->on('couleurs')
                                                            ->constrained();
            $table->foreign('produit_id')->references('id')->on('produits');

        });


    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sous_categorie_produit');
        Schema::dropIfExists('categorie_produit');
        Schema::dropIfExists('taille_produit');
        Schema::dropIfExists('couleur_produit');
        
        Schema::dropIfExists('produits');
    }
};
