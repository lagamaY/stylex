<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\Produit;
use App\Models\Souscategorie;

class Categorie extends Model
{
    use HasFactory;


        // Relation "belongsto" avec le modèle SousCategorie
        public function sousCategorie()
        {
            return $this->hasMany(Souscategorie::class, 'id_categorie', 'id');
        }
    
        // Relation "belongstomany" avec le modèle Produit
        public function produits()
        {
            return $this->belongsToMany(Produit::class, 'categorie_produit', 'produit_id', 'categorie_id');

            
        }






}
