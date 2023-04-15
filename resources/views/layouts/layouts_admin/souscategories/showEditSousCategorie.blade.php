<x-app-layout>


 <!-- Content wrapper -->
 <div class="content-wrapper">
            <!-- Content -->

            <div class="container-xxl flex-grow-1 container-p-y">
              <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Sous Categories</span>  </h4>

              
              @if (session()->has('success'))
                    <div class="alert alert-success alert-dismissible" role="alert">
                           {!! session('success') !!}
                    </div>
               @endif


               @if (session()->has('erreur'))
                    <div class="alert alert-danger">
                           {!! session('erreur') !!}
                    </div>
               @endif


              <div class="row">

              <!-- Custom file input -->
              <div class="row">
                <div class="col-12">
                  <div class="card">
                    <h5 class="card-header">Ajouter vos sous catégories</h5>

                    <div class="card-body demo-vertical-spacing demo-only-element">

                    

                    <form method="POST" action="{{route('updateSousCategorie', ['id'=> $Souscategorie->id])}}" enctype="multipart/form-data">
                    @csrf
                    @method('POST')
                      <!-- <div class="input-group">
                        <input type="file" class="form-control" id="imageCategorie" name="imageCategorie" accept="image/jpeg, image/png, image/gif" />
                        <label class="input-group-text" for="imageCategorie">Charger</label>
                      </div> <br/>  -->

                      <div class="mb-3 row">
                        <label for="nomSousCategorie" class="col-md-2 col-form-label">Nom sous categorie</label>
                        <div class="col-md-10">
                        <input
                            type="text"
                            class="form-control"
                            id="nomSousCategorie"
                            name="nomSousCategorie"
                            value="{{$Souscategorie->nomSousCategorie}}"
                            placeholder="Entrez le nom de la catégorie"
                            aria-describedby="floatingInputHelp"
                            />
                            
                            <div id="nomSousCategorie" class="form-text">
                            Vous pouvez entrer plusieurs tailles séparées par des virgules.
                            </div>
                            </div>
                      </div>
                        <!-- Select categorie -->
                        <div class="mb-3 row">
                        <label for="sousCategorie_categorie_id" class="col-md-2 col-form-label">Liste des catégories</label>
                        <div class="col-md-10">

                       
                        <select class="form-select" id="sousCategorie_categorie_id" name = "sousCategorie_categorie_id" aria-label="Default select example">
                          <option selected style="color:white;">Sélectionnez la catégorie à laquelle appartient vos sous catégories.</option>
                          @foreach($Categorie as $item)
                          <option value="{{$item->id}}">{{$item->categorie_name}}</option>
                          @endforeach

                        </select>

                        
                      </div>
                      </div>

                      <button type="submit" class="btn btn-primary">Enregistrer</button>

                    </div>

                   

                  </div>
                </div>
              </div>
              </div> <br/><br/><br/><br/><br/><br/><br/>
              
            </form>

</x-app-layout>