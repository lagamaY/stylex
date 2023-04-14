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

              <div class="row">
             <!-- HTML5 Inputs -->
             <div class="card mb-4">
                    <h5 class="card-header">Ajoutez un nouveau produit.</h5> <br/>
                    <div class="card-body">
                    <form method="POST" action="" enctype="multipart/form-data">
                    @csrf
                    @method('POST')
                    <!-- Nom du produit -->
                      <div class="mb-3 row">
                        <label for="nom_produit" class="col-md-2 col-form-label">Nom du produit</label>
                        <div class="col-md-10">
                          <input class="form-control" type="text"  id="nom_produit" name="nom_produit" />
                        </div>
                      </div>
                      <!-- Prix du produit -->

                      <div class="mb-3 row">
                        <label for="prix_produit" class="col-md-2 col-form-label">Prix du produit</label>
                        <div class="col-md-10">
                          <input class="form-control" type="number" id="prix_produit" name="prix_produit"/>
                        </div>
                      </div>

                      <!-- Quantité du produit -->
                      <div class="mb-3 row">
                        <label for="quantite_produit" class="col-md-2 col-form-label">Quantité du produit</label>
                        <div class="col-md-10">
                          <input class="form-control" type="number"  id="quantite_produit" name="quantite_produit"/>
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
                          name="tailles_produit"
                      
                        >
                          <!-- <option selected>Open this select menu</option> -->
                          <option value="1">One</option>
                          <option value="2">Two</option>
                          <option value="3">Three</option>
                          <option value="1">One</option>
                          <option value="2">Two</option>
                          <option value="3">Three</option>
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
                          name="couleurs_produit"
                        >
                          <!-- <option selected>Open this select menu</option> -->
                          <option value="1">One</option>
                          <option value="2">Two</option>
                          <option value="3">Three</option>
                        </select>
                        </div>
                      </div>

                      <!-- Short description -->
                      <div class="mb-3 row">
                        <label for="short_description" class="col-md-2 col-form-label">Short description</label>
                        <div class="col-md-10">
                        <textarea class="form-control" id="short_description" name="short_description" rows="3" ></textarea>
                        </div>
                      </div>

                      <!-- Long description -->
                      <div class="mb-3 row">
                        <label for="long_description" class="col-md-2 col-form-label">Long description</label>
                        <div class="col-md-10">
                        <textarea class="form-control" id="long_description" name="long_description" rows="5"></textarea>
                        </div>
                      </div>

                      <!-- Catégorie du produit -->
                      <div class="mb-3 row">
                      <label for="categorie_produit" class="col-md-2 col-form-label">Catégorie du produit</label>
                      <div class="col-md-10">
                        <select class="form-select" class="form-control" id="categorie_produit" name="categorie_produit" aria-label="Default select example">
                          <option selected>Open this select menu</option>
                          <option value="1">One</option>
                          <option value="2">Two</option>
                          <option value="3">Three</option>
                        </select>
                        </div>
                      </div>

                      <!-- Sous catégorie du produit -->
                      <div class="mb-3 row">
                      <label for="sous_categorie_produit" class="col-md-2 col-form-label">Sous catégorie du produit</label>
                      <div class="col-md-10">
                        <select class="form-select" class="form-control" id="sous_categorie_produit" name="sous_categorie_produit"  aria-label="Default select example">
                          <option selected>Open this select menu</option>
                          <option value="1">One</option>
                          <option value="2">Two</option>
                          <option value="3">Three</option>
                        </select>
                        </div>
                      </div>

                      <!-- Image du produit -->
                      <div class="mb-3 row">
                        <label for="image_produit" class="col-md-2 col-form-label">Image du produit</label>
                        <div class="col-md-10">
                        <input class="form-control" type="file" id="image_produit" name="image_produit" />
                        </div>
                      </div>

                    </form>
                    </div>

            <!-- / Content -->
            <div class="content-backdrop fade"></div>
          </div>
          <!-- Content wrapper -->
</x-app-layout>