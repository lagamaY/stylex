@extends('layouts.layouts_client.app')

@section('title')
    description du produit
@endsection

@section('content')
    
<!-- Shop Detail Start -->
<div class="container-fluid py-5">
        <div class="row px-xl-5">
            <div class="col-lg-5 pb-5">
                <div id="product-carousel" class="carousel slide" data-ride="carousel">
                    <div class="carousel-inner border">
                   
                        <!-- affichage de l'image du produit -->
                        <div class="carousel-item active">
                            <img class="w-100 h-100" src='{{asset("images/produits/$Produit->image_produit")}}' alt="Image">
                        </div>
                    </div>
                    <a class="carousel-control-prev" href="#product-carousel" data-slide="prev">
                        <i class="fa fa-2x fa-angle-left text-dark"></i>
                    </a>
                    <a class="carousel-control-next" href="#product-carousel" data-slide="next">
                        <i class="fa fa-2x fa-angle-right text-dark"></i>
                    </a>
                </div>
            </div>

            <div class="col-lg-7 pb-5">
                <!-- affichage du nom du produit -->
                <h3 class="font-weight-semi-bold">{{$Produit->nom_produit}}</h3>
                <div class="d-flex mb-3">
                    <div class="text-primary mr-2">
                        <small class="fas fa-star"></small>
                        <small class="fas fa-star"></small>
                        <small class="fas fa-star"></small>
                        <small class="fas fa-star-half-alt"></small>
                        <small class="far fa-star"></small>
                    </div>
                    <!-- <small class="pt-1">(50 Avis vérifiés)</small> -->
                </div>
                <!-- affichage du prix et de la description -->
                <h3 class="font-weight-semi-bold mb-4">{{$Produit->prix_produit}} <span>fcfa</span></h3>
                <p class="mb-4">{{$Produit->short_description}}</p>
                <form action="{{url('/addToCart',[$Produit->id])}}" method="post" >
                @method('PUT')
                @csrf
                <!-- affichage tailles -->
                <div class="d-flex mb-3">
                    <p class="text-dark font-weight-medium mb-0 mr-3">Tailles:</p>
                    
                        @foreach($Produit->tailles as $tailles)
                        <div class="custom-control custom-radio custom-control-inline">
                            <input type="radio" class="custom-control-input" id="t{{$tailles->id}}" name="taille_produit" required>
                            <label class="custom-control-label" for="t{{$tailles->id}}">{{$tailles->taille}}</label>
                        </div>
                        @endforeach
                </div>
                <!-- Affichage des couleurs  -->
                <div class="d-flex mb-4">
                    <p class="text-dark font-weight-medium mb-0 mr-3">Couleurs:</p>
                    
                    @foreach($Produit->couleurs as $couleurs)
                        <div class="custom-control custom-radio custom-control-inline">
                            <input type="radio" class="custom-control-input" id="c{{$couleurs->id}}" name="couleur_produit" required>
                            <label class="custom-control-label" for="c{{$couleurs->id}}">{{$couleurs->nomCouleur}}</label>
                        </div>
                    @endforeach
                
                </div>
                <!-- ajout au panier -->
                <div class="d-flex align-items-center mb-4 pt-2">
                    <input type="hidden" class="form-control bg-secondary text-center" name="quantite_max"  id="quantite_max" value="{{$Produit->quantite_produit}}" required>
                    <div class="input-group quantity mr-3" style="width: 130px;">

                        <div class="input-group-btn">
                            <button type='button' class="btn btn-primary btn-minus" >
                            <i class="fa fa-minus"></i>
                            </button>
                        </div>

                        <input style="width:40px" type="text" readonly class="form-control bg-secondary text-center" name="quantite_produit" value="1" required>

                        <div class="input-group-btn">
                            <button type='button' class="btn btn-primary btn-plus">
                                <i class="fa fa-plus"></i>
                            </button>
                        </div>
                    </div>

                    <input type="hidden" name="image_produit" value="{{$Produit->image_produit}}" >
                    <input type="hidden" name="nom_produit" value="{{$Produit->nom_produit}}" >
                    <input type="hidden" name="prix_produit" value="{{$Produit->prix_produit}}" >
                    <!-- <input type="hidden" name="quantite_produit" value="{{$Produit->quantite_produit}}" > -->
                    <button type="submit" class="btn btn-primary px-3"><i class="fa fa-shopping-cart mr-1"></i> Ajout au panier</button>
                </form>
                </div>



                <div class="d-flex pt-2">
                    <p class="text-dark font-weight-medium mb-0 mr-2">Share on:</p>
                    <div class="d-inline-flex">
                        <a class="text-dark px-2" href="">
                            <i class="fab fa-facebook-f"></i>
                        </a>
                        <a class="text-dark px-2" href="">
                            <i class="fab fa-twitter"></i>
                        </a>
                        <a class="text-dark px-2" href="">
                            <i class="fab fa-linkedin-in"></i>
                        </a>
                        <a class="text-dark px-2" href="">
                            <i class="fab fa-pinterest"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <div class="row px-xl-5">
            <div class="col">
                <div class="nav nav-tabs justify-content-center border-secondary mb-4">
                    <a class="nav-item nav-link active" data-toggle="tab" href="#tab-pane-1">Description</a>
                </div>
                <div class="tab-content">

                    <div class="tab-pane fade show active" id="tab-pane-1">
                        <h4 class="mb-3"> Description du produit</h4>
                        <p>{{$Produit->long_description}}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Shop Detail End -->


    <!-- Products Start -->
    <div class="container-fluid py-5">
        <div class="text-center mb-4">
            <h2 class="section-title px-5"><span class="px-2">Vous pourrez aussi aimer</span></h2>
        </div>
        <div class="row px-xl-5">
            <div class="col">
                <div class="owl-carousel related-carousel">
                    @foreach($produits_de_meme_categorie as $produit)
                    <div class="card product-item border-0">
                        <div class="card-header product-img position-relative overflow-hidden bg-transparent border p-0">
                            <img class="img-fluid w-100" src="{{asset('images/produits/$produit->image_produit')}}" alt="">
                        </div>
                        <div class="card-body border-left border-right text-center p-0 pt-4 pb-3">
                            <h6 class="text-truncate mb-3">{{$produit->nom_produit}}</h6>
                            <div class="d-flex justify-content-center">
                                <h6>{{$produit->prix_produit}}</h6>
                                <!-- <h6 class="text-muted ml-2"><del>$123.00</del></h6> -->
                            </div>
                        </div>
                        <div class="card-footer d-flex justify-content-between bg-light border">
                            <a href="{{route('detailProduit', [$produit->id] )}}" class="btn btn-sm text-dark p-0"><i class="fas fa-eye text-primary mr-1"></i>Voir l'article</a>
                            <a href="" class="btn btn-sm text-dark p-0"><i class="fas fa-shopping-cart text-primary mr-1"></i>Ajout au panier</a>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
    <!-- Products End -->

    @endsection