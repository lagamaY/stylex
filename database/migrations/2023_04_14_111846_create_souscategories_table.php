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
        Schema::create('souscategories', function (Blueprint $table) {
            $table->id();
            $table->string('nomSousCategorie');
            $table->string('slug');
           
            $table->unsignedBigInteger('id_categorie'); // clé étrangère
            $table->foreign('id_categorie')->references('id')->on('categories')
                                                            ->constrained()
                                                            ->onUpdate('cascade')
                                                            ->onDelete('cascade');

            $table->integer('nb_produit')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('souscategories');
    }
};
