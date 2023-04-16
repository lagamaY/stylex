<x-app-layout>


 <!-- Content wrapper -->
 <div class="content-wrapper">
            <!-- Content -->

            <div class="container-xxl flex-grow-1 container-p-y">
              <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Slide de la page d'accueil</span>  </h4>

              
              @if (session()->has('success'))
                    <div class="alert alert-success alert-dismissible" role="alert">
                           {!! session('success') !!}
                    </div>
               @endif

               @if (session()->has('alerte'))
                    <div class="alert alert-warning" role="alert">
                           {!! session('alerte') !!}
                    </div>
               @endif

              <div class="row">

              <!-- Custom file input -->
              <div class="row">
                <div class="col-12">
                  <div class="card">
                    <h5 class="card-header">Ajouter une slide</h5>

                    <div class="card-body demo-vertical-spacing demo-only-element">

                    <form method="POST" action="{{route('saveSlide')}}" enctype="multipart/form-data">
                    @csrf
                    @method('POST')
                   

                      <div class="input-group">
                        <input type="file" class="form-control" id="imageSlide" name="imageSlide" accept="image/jpeg, image/png, image/gif" />
                        <label class="input-group-text" for="imageSlide">Charger</label>
                      </div> <br/>

                      <div class="input-group">
                       <input
                          type="text"
                          class="form-control"
                          id="urlSlide"
                          name="urlSlide"
                          placeholder="Entrez l'url de redirection de la slide ajoutée"
                          aria-describedby="floatingInputHelp"
                        />
                        <label for="urlSlide"></label>
                      </div> <br/>

                      <button type="submit" class="btn btn-primary">Enregistrer</button>
                    
                    </form>
                    

                   

                  </div>
                </div>
              </div>
              </div> <br/><br/><br/><br/><br/><br/><br/>
              
            

</x-app-layout>