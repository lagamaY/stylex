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
                        <th>Nom du produit </th>
                        <th>Image</th>
                        <th>Prix</th>
                        <th>Actions</th>
                      </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">

                   

                      <tr>

                        <td><i class="fab fa-react fa-lg text-info me-3"></i> <strong>1</strong></td>

                        <!-- nom du produit -->

                        <td>Chemise bleu</td>

                        <!-- images du produit -->
                        <td>
                          <ul class="list-unstyled users-list m-0 avatar-group d-flex align-items-center">
                            <li
                              data-bs-toggle="tooltip"
                              data-popup="tooltip-custom"
                              data-bs-placement="top"
                              class="avatar avatar-xs pull-up"
                              title="Lilian Fuller"
                            >
                              <img src='' alt="nom du produit" class="rounded-circle"  />
                            </li>
                          </ul>
                        </td>

                        <!-- Prix du produit -->

                        <td>100 fr</td>

                        

                        <!-- Actions -->
                        <td>
                          <div class="dropdown">
                            <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                              <i class="bx bx-dots-vertical-rounded"></i>
                            </button>
                            <div class="dropdown-menu"> 
                              <a class="dropdown-item" href="  "
                                ><i class="bx bx-edit-alt me-2"></i> View</a
                              >
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

                    </tbody>
                  </table>
                </div>
              </div>
              <!--/ Basic Bootstrap Table -->


</x-app-layout>