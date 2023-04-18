<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Souscategorie extends Model
{
    use HasFactory;


    public function categorie()
    {
        return $this->belongsTo(Categorie::class, 'id_categorie');
    }

        // Relation Many-to-Many avec Produit
    public function produits()
    {
        return $this->belongsToMany(Produit::class, 'sous_categorie_produit', 'sous_categorie_id','produit_id');
    }
}
