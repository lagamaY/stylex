<x-app-layout>


 <!-- Content wrapper -->
 <div class="content-wrapper">
            <!-- Content -->

            <div class="container-xxl flex-grow-1 container-p-y">
              <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Sous Categories disponibles</span></h4>

              @if (session()->has('success'))
                    <div class="alert alert-success alert-dismissible" role="alert">
                           {!! session('success') !!}
                    </div>
               @endif
               
               <!-- Basic Bootstrap Table -->
               <div class="card">
                <!-- <h5 class="card-header">Sous Catégories disponibles</h5> -->
                <div class="table-responsive text-nowrap">
                  <table class="table">
                    <thead>
                      <tr>
                        <th>Id</th>
                        <th>Nom de la sous catégorie </th>
                        <th>Catégirie liée</th>
                        <th>Nb_produit</th>
                        <th>Actions</th>
                      </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">

                   
                    @foreach($Souscategorie as $item)
                      <tr>
                     
                        <td><i class="fab fa-react fa-lg text-info me-3"></i> <strong>{{$item->id}}</strong></td>

                        <td>{{$item->nomSousCategorie}}</td>

                        <td>{{$item->Categorie->categorie_name}}</td>

                        <td>{{$item->nb_produit}}</td>

                      

                        <!-- Actions -->
                        <td>
                          <div class="dropdown">
                            <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                              <i class="bx bx-dots-vertical-rounded"></i>
                            </button>
                            <div class="dropdown-menu"> 
                              <a class="dropdown-item" href="  "
                                ><i class="bx bx-edit-alt me-2"></i> Edit</a
                              >
                              <a class="dropdown-item" href="  "
                                ><i class="bx bx-trash me-2"></i> Delete</a
                              >
                            </div>
                          </div>
                        </td>


                      </tr>
                      @endforeach
                    </tbody>
                  </table>
                </div>
              </div>
              <!--/ Basic Bootstrap Table -->


</x-app-layout>