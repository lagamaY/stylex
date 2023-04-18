<x-app-layout>


<!-- Content wrapper -->
<div class="content-wrapper">
            <!-- Content -->

            <div class="container-xxl flex-grow-1 container-p-y">
              <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Produits</span>  </h4>

              
              @if (session()->has('success'))
                    <div class="alert alert-success alert-dismissible" role="alert">
                           {!! session('success') !!}
                    </div>
               @endif


               @if (session()->has('erreur'))
                    <div class="alert alert-danger" role="alert">
                           {!! session('erreur') !!}
                    </div>
               @endif

               @if (session('error'))
                  <div class="alert alert-danger">
                      {{ session('error') }}
                  </div>
               @endif

              <div class="row">
             <!-- HTML5 Inputs -->
             <div class="card mb-4">
                    <h5 class="card-header">Modifiez un produit.</h5> <br/>
                    <div class="card-body">
                    <form method="POST" action="{{route('updateProduct', ['id'=> $Produit->id])}}" enctype="multipart/form-data">
                    @csrf
                    @method('POST')
                    <!-- Nom du produit -->
                      <div class="mb-3 row">
                        <label for="nom_produit"  class="col-md-2 col-form-label">Nom du produit</label>
                        <div class="col-md-10">
                          <input class="form-control" type="text"  id="nom_produit" name="nom_produit" value="{{$Produit->nom_produit}}" />
                        </div>
                      </div>
                      <!-- Prix du produit -->

                      <div class="mb-3 row">
                        <label for="prix_produit" class="col-md-2 col-form-label">Prix du produit</label>
                        <div class="col-md-10">
                          <input class="form-control" type="number" id="prix_produit" name="prix_produit" value="{{$Produit->prix_produit}}" />
                        </div>
                      </div>

                      <!-- Quantité du produit -->
                      <div class="mb-3 row">
                        <label for="quantite_produit" class="col-md-2 col-form-label">Quantité du produit</label>
                        <div class="col-md-10">
                          <input class="form-control" type="number"  id="quantite_produit" name="quantite_produit" value="{{$Produit->quantite_produit}}" />
                        </div>
                      </div>
                      
                      <!-- Tailles disponibles -->
                      <div class="mb-3 row">
                        <label for="tailles_produit" class="col-md-2 col-form-label">Tailles disponibles</label>
                        <div class="col-md-10">
                        <select
                          multiple
                          class="form-select"
                          id="tailles_produit"
                          name="tailles_produit[]"
                      
                        >
                          @foreach($Taille as $item )
                          <option value="{{$item->id}}">{{$item->taille}}</option>
                          @endforeach
                        </select>
                        </div>
                      </div>

                      <!-- Couleurs disponibles -->
                      <div class="mb-3 row">
                        <label for="couleurs_produit" class="col-md-2 col-form-label">Couleurs disponibles</label>
                        <div class="col-md-10">
                        <select
                          multiple
                          class="form-select"
                          id="couleurs_produit"
                          name="couleurs_produit[]"
                        >
                         
                          @foreach($Couleur as $item )
                          <option value="{{$item->id}}">{{$item->nomCouleur}}</option>
                          @endforeach
                        </select>
                        </div>
                      </div>

                      <!-- Short description -->
                      <div class="mb-3 row">
                        <label for="short_description" class="col-md-2 col-form-label">Short description</label>
                        <div class="col-md-10">
                        <textarea class="form-control" id="short_description" name="short_description" rows="3" value="">{{$Produit->short_description}}</textarea>
                        </div>
                      </div>

                      <!-- Long description -->
                      <div class="mb-3 row">
                        <label for="long_description" class="col-md-2 col-form-label">Long description</label>
                        <div class="col-md-10">
                        <textarea class="form-control" id="long_description" name="long_description" rows="5" value="">{{$Produit->long_description}}</textarea>
                        </div>
                      </div>


                       <!-- Catégories disponibles -->
                      <div class="mb-3 row">
                        <label for="categories" class="col-md-2 col-form-label">Catégories</label>
                        <div class="col-md-10">
                        <select
                          multiple
                          class="form-select"
                          id="categories"
                          name="categories[]"
                        >
                          @foreach($Categorie as $categorie )
                                <option value="{{ $categorie->id }}" {{ in_array($categorie->id, old('categories', [])) ? 'selected' : '' }} >
                                    {{ $categorie->categorie_name }}
                                </option>
                            @endforeach
                        </select>
                        </div>
                      </div>


                      <!-- Afficher les sous-catégories disponibles en fonction des catégories sélectionnées -->

                      <div class="mb-3 row">
                        <label for="sousCategories" class="col-md-2 col-form-label">Sous Catégories</label>
                        <div class="col-md-10">
                        <select
                          multiple
                          class="form-select"
                          id="sousCategories"
                          name="sousCategories[]"
                        >
                          @foreach($Souscategorie as $sousCategorie )
                                <option value="{{ $sousCategorie->id }}"  class="sous-categorie" {{ in_array($sousCategorie->id, old('sousCategories', [])) ? 'selected' : '' }} >
                                    {{ $sousCategorie->nomSousCategorie }}
                                </option>
                            @endforeach
                        </select>
                        </div>
                      </div>



                      <!-- Image du produit -->
                      <div class="mb-3 row">
                        <label for="image_produit" class="col-md-2 col-form-label">Image du produit</label>
                        <div class="col-md-10">
                        <input class="form-control" type="file" id="image_produit" name="image_produit" accept=" " />
                        </div>
                      </div>

                      <button type="submit" class="btn btn-primary">Enregistrer</button>


                    </form>


                    </div>

            <!-- / Content -->
            <div class="content-backdrop fade"></div>
          </div>

          <!-- JavaScript pour gérer la sélection des sous-catégories en fonction des catégories sélectionnées -->
          <script>
              $(document).ready(function() {
                  $('#categories').on('change', function() {
                      var selectedCategorieIds = $(this).val();

                      // Réinitialiser la sélection des sous-catégories
                      $('#sousCategories option').prop('selected', false);

                      // Afficher seulement les sous-catégories associées aux catégories sélectionnées
                      $('#sousCategories option').each(function() {
                          var categorieIds = JSON.parse($(this).data('categorie-ids'));

                          if (categorieIds.some(categorieId => selectedCategorieIds.includes(String(categorieId)))) {
                              $(this).prop('disabled', false);
                          } else {
                              $(this).prop('disabled', true);
                          }
                      });
                  });
              });
          </script>
          <!-- Content wrapper -->
</x-app-layout>