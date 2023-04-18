<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produit extends Model
{
    use HasFactory;


    // Gérer la relation many to many entre la table produit et toutes les autres tables
    public function categories()
    {
        return $this->belongsToMany(Categorie::class, 'categorie_produit', 'produit_id', 'categorie_id');
    }

    public function souscategories()
    {
        return $this->belongsToMany(Souscategorie::class, 'sous_categorie_produit', 'produit_id', 'sous_categorie_id');
    }

    public function tailles()
    {
        return $this->belongsToMany(Taille::class, 'taille_produit', 'produit_id', 'taille_id');
    }

    public function couleurs()
    {
        return $this->belongsToMany(Couleur::class, 'couleur_produit', 'produit_id', 'couleur_id');
    }



}
