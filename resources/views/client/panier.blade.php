@extends('layouts.layouts_client.app')

@section('title')
    Resume du panier
@endsection

@section('content')

    <!-- Page Header Start -->
    <!-- <div class="container-fluid bg-secondary mb-5">
        <div class="d-flex flex-column align-items-center justify-content-center" style="min-height: 300px">
            <h1 class="font-weight-semi-bold text-uppercase mb-3">Shopping Cart</h1>
            <div class="d-inline-flex">
                <p class="m-0"><a href="">Home</a></p>
                <p class="m-0 px-2">-</p>
                <p class="m-0">Shopping Cart</p>
            </div>
        </div>
    </div> -->
    <!-- Page Header End -->


    <!-- Cart Start -->
    <div class="container-fluid pt-5">
        <div class="row px-xl-5">
            <div class="col-lg-8 table-responsive mb-5">
            @if (Session::has('success'))

            @endif
                <table class="table table-bordered text-ceter mb-0">
                    <thead class="bg-secondary text-dark">
                        <tr>
                            <th>Produits</th>
                            <th>Prix</th>
                            <th>Quantité</th>
                            <th>Total</th>
                            <th>Supprimer</th>
                        </tr>
                    </thead>
                    <tbody class="align-middle">


                @if (Session::has('cart'))
                    @foreach (Session::get('cart')->items as $resultat)
                        <tr>
                            <td class="align-middle"><img src="{{asset('images/produits/'.$resultat['product_image'])}}" alt="" style="width: 50px;"> {{$resultat['product_name']}}</td>
                            <td class="align-middle">{{$resultat['product_price']}} fr</td>
                            <td class="align-middle">
                               
                                <input type="hidden" class="form-control bg-secondary text-center" name="quantite_max"  id="quantite_max" value="{{$resultat['quantite_max']}}" required>
                                <div class="input-group quantity mr-3" style="width: 130px;">

                                    <div class="input-group-btn">
                                        <button type='button' class="btn btn-primary btn-minus" >
                                        <i class="fa fa-minus"></i>
                                        </button>
                                    </div>

                                    <input style="width:40px" type="text" readonly class="form-control bg-secondary text-center" name="quantite_produit" value="{{$resultat['product_quantite']}}" required>

                                    <div class="input-group-btn">
                                        <button type='button' class="btn btn-primary btn-plus">
                                            <i class="fa fa-plus"></i>
                                        </button>
                                    </div>
                                </div>
                            </td>

                            <td class="align-middle"> {{$resultat['product_price'] * $resultat['product_quantite']}} fr</td>
                                                        <!-- SUPPRESSION -->
                                                    
                            <!-- <td class="align-middle"><button class="btn btn-sm btn-primary"><i class="fa fa-times"></i></button></td> -->
                            <td class="align-middle">
                            
                                <form action="{{route('remove_produit', ['id'=> $resultat['product_id'] ] )}}" method="POST">
                                @csrf
                                @method('DELETE')
                                
                                    <button type="submit" class="btn btn-sm btn-primary">
                                            <i class="fa fa-times"></i>
                                    </button>
                                
                                </form>
                            </td>
                       
                        </tr>
                    @endforeach
                 @else

                 @endif
                    </tbody>
                </table>
            </div>
            <div class="col-lg-4">
                <form class="mb-5" action="">
                    <div class="input-group">
                        <input type="text" class="form-control p-4" placeholder="Entrez votre code de réduction">
                        <div class="input-group-append">
                            <button class="btn btn-primary">Appliquer</button>
                        </div>
                    </div>
                </form>
                <div class="card border-secondary mb-5">
                    <div class="card-header bg-secondary border-0">
                        <h4 class="font-weight-semi-bold m-0">Résumé du panier</h4>
                    </div>
                    <div class="card-body">
                        <div class="d-flex justify-content-between mb-3 pt-1">
                            <h6 class="font-weight-medium">Total article</h6>
                            <h6 class="font-weight-medium">150 fr</h6>
                        </div>
                        <div class="d-flex justify-content-between">
                            <h6 class="font-weight-medium">Frais de livraison</h6>
                            <h6 class="font-weight-medium">10 fr</h6>
                        </div>
                    </div>
                    <div class="card-footer border-secondary bg-transparent">
                        <div class="d-flex justify-content-between mt-2">
                            <h5 class="font-weight-bold">Total</h5>
                            <h5 class="font-weight-bold">160 fr</h5>
                        </div>
                        <button class="btn btn-block btn-primary my-3 py-3">Procéder au paiement</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Cart End -->

@endsection