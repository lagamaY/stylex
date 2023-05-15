@extends('layouts.layouts_client.app')

@section('title')
    Contact
@endsection

@section('content')


    <!-- Page Header Start -->
    <div class="container-fluid bg-secondary mb-5">
        <div class="d-flex flex-column align-items-center justify-content-center" style="min-height: 300px">
            <h1 class="font-weight-semi-bold text-uppercase mb-3">Nos Contacts</h1>
            <div class="d-inline-flex">
                <p class="m-0"><a href="{{route('accueil')}}">Accueil</a></p>
                <p class="m-0 px-2">-</p>
                <p class="m-0">Contact</p>
            </div>
        </div>
    </div>
    <!-- Page Header End -->

     <!-- Contact Start -->
     <div class="container-fluid pt-5">
        <!-- <div class="text-center mb-4">
            <h2 class="section-title px-5"><span class="px-2">Contact For Any Queries</span></h2>
        </div> -->
        
        <div class="text-center container text-center" >
           
            <div class="row mb-12"  style = "margin-bottom: 150px; margin-top: 50px ">
                

                <div class="d-flex flex-column" style = "margin-right: 25px; margin-left: 25px ">
                    <h5 class="font-weight-semi-bold mb-3">Angré</h5>
                    <p class="mb-2"><i class="fa fa-map-marker-alt text-primary mr-3"></i>Angré, 8ième tranche</p>
                    <p class="mb-0"><i class="fa fa-phone-alt text-primary mr-3"></i>+225 07 87 52 63 14</p>
                </div>

                <div class="d-flex flex-column" style = "margin-right: 25px">
                    <h5 class="font-weight-semi-bold mb-3">Yopougon</h5>
                    <p class="mb-2"><i class="fa fa-map-marker-alt text-primary mr-3"></i>Sigoci</p>
                    <p class="mb-2"><i class="fa fa-phone-alt text-primary mr-3"></i>+225 05 45 52 63 14</p>
                    <!-- <p class="mb-2"><i class="fa fa-envelope text-primary mr-3"></i>info@example.com</p> -->
                   
                </div>

                <div class="d-flex flex-column" style = "margin-right: 25px">
                    <h5 class="font-weight-semi-bold mb-3">Treichville</h5>
                    <p class="mb-2"><i class="fa fa-map-marker-alt text-primary mr-3"></i>Vers la gare de bassam</p>
                    <p class="mb-0"><i class="fa fa-phone-alt text-primary mr-3"></i>+225 07 87 52 63 14</p>
                  
                </div>

                <div class="d-flex flex-column">
                    <h5 class="font-weight-semi-bold mb-3">Bouaké</h5>
                    <p class="mb-2"><i class="fa fa-map-marker-alt text-primary mr-3"></i>Kennedy</p>
                    <p class="mb-0"><i class="fa fa-phone-alt text-primary mr-3"></i>+225 07 87 52 63 14</p>
                 
                </div>

            </div>
        </div>
    </div>
    <!-- Contact End -->

@endsection