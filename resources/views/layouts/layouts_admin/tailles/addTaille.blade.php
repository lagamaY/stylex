<x-app-layout>


 <!-- Content wrapper -->
 <div class="content-wrapper">
            <!-- Content -->

            <div class="container-xxl flex-grow-1 container-p-y">
              <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Tailles</span>  </h4>

              
              @if (session()->has('success'))
                    <div class="alert alert-success alert-dismissible" role="alert">
                           {!! session('success') !!}
                    </div>
               @endif

              <div class="row">

              <!-- Custom file input -->
              <div class="row">
                <div class="col-12">
                  <div class="card">
                    <h5 class="card-header">Ajouter des tailles</h5>

                    <div class="card-body demo-vertical-spacing demo-only-element">

                    <form method="POST" action="{{route('saveTaille')}}" enctype="multipart/form-data">
                    @csrf
                    @method('POST')
                      <!-- <div class="input-group">
                        <input type="file" class="form-control" id="imageCategorie" name="imageCategorie" accept="image/jpeg, image/png, image/gif" />
                        <label class="input-group-text" for="imageCategorie">Charger</label>
                      </div> <br/>  -->

                      <div class="card-body">
                      <!-- <label for="nomTaille">Ajoutez des tailles</label> -->
                       <input
                          type="text"
                          class="form-control"
                          id="nomTaille"
                          name="nomTaille"
                          placeholder="S, M, L, 36, 40..."
                          aria-describedby="floatingInputHelp"
                        />
                        
                        <div id="nomTaille" class="form-text">
                        Vous pouvez entrer plusieurs tailles séparées par des virgules.
                        </div>
                      </div> <br/>

                      <button type="submit" class="btn btn-primary">Enregistrer</button>

                    </div>

                   

                  </div>
                </div>
              </div>
              </div> <br/><br/><br/><br/><br/><br/><br/>
              
            </form>

</x-app-layout>