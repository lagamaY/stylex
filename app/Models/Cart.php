<?php

namespace App\Models;

    class Cart{

        public $items = null;
        public $totalQty = 0;
        public $totalPrice = 0;


        public function __construct($oldCart){

            if ($oldCart) {
                # code...
                $this->items = $oldCart->items;
                $this->totalQty = $oldCart->totalQty;
                $this->totalPrice = $oldCart->totalPrice;
            }
        }

        public function add($id,$nom_produit,$image_produit,$prix_produit,$quantite_produit,$taille_produit,$couleur_produit, $quantite_max){
            $storedItem = [
                'qty' => 0,
                // 'product_id' => $id.$taille_produit.$couleur_produit,
                'product_id' => $id,
                'product_name' => $nom_produit,
                'product_price' => $prix_produit,
                'product_image' => $image_produit,
                'product_taille' => $taille_produit ,
                'product_quantite' => $quantite_produit,
                'quantite_max' => $quantite_max,
                'product_couleur' => $couleur_produit,
                
            ];

            // if ($this->items) {
                
            //     if (array_key_exists($id.$taille_produit.$couleur_produit, $this->items)) {
                    
            //         $storedItem = $this->items[$id.$taille_produit.$couleur_produit];
            //     }
            // }

            
            if ($this->items) {
                
                if (array_key_exists($id, $this->items)) {
                    
                    $storedItem = $this->items[$id];
                }
            }

            $storedItem['qty']++;
            // $storedItem['product_id'] = $id.$taille_produit.$couleur_produit;
            $storedItem['product_id'] = $id;
            $storedItem['product_name'] = $nom_produit;
            $storedItem['product_price'] = $prix_produit;
            $storedItem['product_image'] = $image_produit;
            $storedItem['product_taille'] = $taille_produit;
            $storedItem['product_quantite'] = $quantite_produit;
            $storedItem['quantite_max'] = $quantite_max;
            $storedItem['product_couleur'] = $couleur_produit;

            $this->totalQty++;

            

    
            $this->totalPrice += $prix_produit;
            $this->items[$id] = $storedItem;

            
        }

        // public function updateQty($id, $qty){

        //     $this->totalQty -= $this->items[$id]['qty'];
        //     $this->totalPrice -= $this->items[$id]['product_price'] * $this->items[$id]['qty'];
        //     $this->items[$id]['qty'] = $qty;
        //     $this->totalQty += $qty;
        //     $this->totalPrice += $this->items[$id]['product_price'] * $qty;
        // }

        public function removeItem($id){

            
            $this->totalQty -= $this->items[$id]['qty'];
            

            $this->totalPrice -= $this->items[$id]['product_price'] * $this->items[$id]['qty'];
            // dd( $this->totalPrice);
            unset($this->items[$id]);
        }
    }