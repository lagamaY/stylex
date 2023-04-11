<x-app-layout>


 <!-- Content wrapper -->
 <div class="content-wrapper">
            <!-- Content -->

            <div class="container-xxl flex-grow-1 container-p-y">
              <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Couleurs</span>  </h4>

              
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
                    <h5 class="card-header">Modifier la couleur saisie</h5>

                    <div class="card-body demo-vertical-spacing demo-only-element">

                    <form method="POST" action="{{route('updateCouleur', ['id'=> $Couleur->id] )}}" enctype="multipart/form-data">
                    @csrf
                    @method('POST')

                      <div class="input-group">
                       <input
                          type="text"
                          class="form-control"
                          id="nomCouleur"
                          name="nomCouleur"
                          value = "{{$Couleur->nomCouleur}}"
                          placeholder="Vous pouvez entrer plusieurs couleurs séparées par des virgules."
                          aria-describedby="floatingInputHelp"
                        />
                        <label for="nomCouleur"></label>
                      </div> <br/>

                      <button type="submit" class="btn btn-primary">Enregistrer</button>

                    </div>

                   

                  </div>
                </div>
              </div>
              </div> <br/><br/><br/><br/><br/><br/><br/>
              
            </form>

</x-app-layout>