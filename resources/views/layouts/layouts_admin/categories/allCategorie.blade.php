<x-app-layout>


 <!-- Content wrapper -->
 <div class="content-wrapper">
            <!-- Content -->

            <div class="container-xxl flex-grow-1 container-p-y">
              <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Categories</span></h4>

               <!-- Basic Bootstrap Table -->
               <div class="card">
                <h5 class="card-header">Catégories disponibles</h5>
                <div class="table-responsive text-nowrap">
                  <table class="table">
                    <thead>
                      <tr>
                        <th>Id</th>
                        <th>Noms</th>
                        <th>Images</th>
                        <th>Actions</th>
                      </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">

                    @foreach($Categorie as $item)

                      <tr>

                        <td><i class="fab fa-react fa-lg text-info me-3"></i> <strong>{{$item->id}}</strong></td>

                        <td>{{$item->categorie_name}}</td>

                        <td>
                          <ul class="list-unstyled users-list m-0 avatar-group d-flex align-items-center">
                            <li
                              data-bs-toggle="tooltip"
                              data-popup="tooltip-custom"
                              data-bs-placement="top"
                              class="avatar avatar-xs pull-up"
                              title="Lilian Fuller"
                            >
                              <img src='{{ asset("images/categories/$item->categorie_image") }}' alt="categorie name" class="rounded-circle"  />
                            </li>
                          </ul>
                        </td>


                        <td>
                          <div class="dropdown">
                            <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                              <i class="bx bx-dots-vertical-rounded"></i>
                            </button>
                            <div class="dropdown-menu">
                              <a class="dropdown-item" href="javascript:void(0);"
                                ><i class="bx bx-edit-alt me-2"></i> Edit</a
                              >
                              <a class="dropdown-item" href="javascript:void(0);"
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