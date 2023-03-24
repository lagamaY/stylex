<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <title>Stylex - Bootstrap Shop Template</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="Free HTML Templates" name="keywords">
    <meta content="Free HTML Templates" name="description">

    <!-- Favicon -->
    <link href="{{asset('eshopper/img/favicon.ico')}}" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet"> 

    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="{{asset('eshopper/lib/owlcarousel/assets/owl.carousel.min.css')}}" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="{{asset('eshopper/css/style.css')}}" rel="stylesheet">
</head>

<body>
    @include('layouts.layouts_espace_client.topbar')

    <!-- Navbar Start -->
<div class="container-fluid mb-5">
        <div class="row border-top px-xl-5">
            <div class="col-lg-3 d-none d-lg-block">
                <a class="btn shadow-none d-flex align-items-center justify-content-between bg-primary text-white w-100" data-toggle="collapse" href="#navbar-vertical" style="height: 65px; margin-top: -1px; padding: 0 30px;">
                    <h6 class="m-0">Categories</h6>
                    <!-- <i class="fa fa-angle-down text-dark"></i> -->
                </a>
                <nav class="collapse show navbar navbar-vertical navbar-light align-items-start p-0 border border-top-0 border-bottom-0" id="navbar-vertical">
                    <div class="navbar-nav w-100 overflow-hidden" style="height: 410px">
                        <!-- <div class="nav-item dropdown">
                            <a href="#" class="nav-link" data-toggle="dropdown">Dresses <i class="fa fa-angle-down float-right mt-1"></i></a>
                            <div class="dropdown-menu position-absolute bg-secondary border-0 rounded-0 w-100 m-0">
                                <a href="" class="dropdown-item">Men's Dresses</a>
                                <a href="" class="dropdown-item">Women's Dresses</a>
                                <a href="" class="dropdown-item">Baby's Dresses</a>
                            </div>
                        </div> -->
						<a href="" class="nav-item nav-link">Dresses</a>
                        <a href="" class="nav-item nav-link">Shirts</a>
                        <a href="" class="nav-item nav-link">Jeans</a>
                        <a href="" class="nav-item nav-link">Swimwear</a>
                        <a href="" class="nav-item nav-link">Sleepwear</a>
                        <a href="" class="nav-item nav-link">Sportswear</a>
                        <a href="" class="nav-item nav-link">Jumpsuits</a>
                        <a href="" class="nav-item nav-link">Blazers</a>
                        <a href="" class="nav-item nav-link">Jackets</a>
                        <a href="" class="nav-item nav-link">Shoes</a>
                    </div>
                </nav>
            </div>
            <div class="col-lg-9">
                <nav class="navbar navbar-expand-lg bg-light navbar-light py-3 py-lg-0 px-0">
                    <a href="" class="text-decoration-none d-block d-lg-none">
                        <h1 class="m-0 display-5 font-weight-semi-bold"><span class="text-primary font-weight-bold border px-3 mr-1">E</span>Shopper</h1>
                    </a>
                    <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    
                </nav>
             @yield('content')
            </div>
        </div>
    </div>
    <!-- Navbar End -->

   

    <!-- Featured Start -->
		<!-- <div class="container-fluid pt-5">
			<div class="row px-xl-5 pb-3">
				<div class="col-lg-3 col-md-6 col-sm-12 pb-1">
					<div class="d-flex align-items-center border mb-4" style="padding: 30px;">
						<h1 class="fa fa-check text-primary m-0 mr-3"></h1>
						<h5 class="font-weight-semi-bold m-0">Quality Product</h5>
					</div>
				</div>
				<div class="col-lg-3 col-md-6 col-sm-12 pb-1">
					<div class="d-flex align-items-center border mb-4" style="padding: 30px;">
						<h1 class="fa fa-shipping-fast text-primary m-0 mr-2"></h1>
						<h5 class="font-weight-semi-bold m-0">Free Shipping</h5>
					</div>
				</div>
				<div class="col-lg-3 col-md-6 col-sm-12 pb-1">
					<div class="d-flex align-items-center border mb-4" style="padding: 30px;">
						<h1 class="fas fa-exchange-alt text-primary m-0 mr-3"></h1>
						<h5 class="font-weight-semi-bold m-0">14-Day Return</h5>
					</div>
				</div>
				<div class="col-lg-3 col-md-6 col-sm-12 pb-1">
					<div class="d-flex align-items-center border mb-4" style="padding: 30px;">
						<h1 class="fa fa-phone-volume text-primary m-0 mr-3"></h1>
						<h5 class="font-weight-semi-bold m-0">24/7 Support</h5>
					</div>
				</div>
			</div>
		</div> -->
    <!-- Featured End -->


    <!-- Categories Start -->
		<!-- <div class="container-fluid pt-5">
			<div class="row px-xl-5 pb-3">
				<div class="col-lg-4 col-md-6 pb-1">
					<div class="cat-item d-flex flex-column border mb-4" style="padding: 30px;">
						<p class="text-right">15 Products</p>
						<a href="" class="cat-img position-relative overflow-hidden mb-3">
							<img class="img-fluid" src="{{asset('eshopper/img/cat-1.jpg')}}" alt="">
						</a>
						<h5 class="font-weight-semi-bold m-0">Men's dresses</h5>
					</div>
				</div>
				<div class="col-lg-4 col-md-6 pb-1">
					<div class="cat-item d-flex flex-column border mb-4" style="padding: 30px;">
						<p class="text-right">15 Products</p>
						<a href="" class="cat-img position-relative overflow-hidden mb-3">
							<img class="img-fluid" src="{{asset('eshopper/img/cat-2.jpg')}}" alt="">
						</a>
						<h5 class="font-weight-semi-bold m-0">Women's dresses</h5>
					</div>
				</div>
				<div class="col-lg-4 col-md-6 pb-1">
					<div class="cat-item d-flex flex-column border mb-4" style="padding: 30px;">
						<p class="text-right">15 Products</p>
						<a href="" class="cat-img position-relative overflow-hidden mb-3">
							<img class="img-fluid" src="{{asset('eshopper/img/cat-3.jpg')}}" alt="">
						</a>
						<h5 class="font-weight-semi-bold m-0">Baby's dresses</h5>
					</div>
				</div>
				<div class="col-lg-4 col-md-6 pb-1">
					<div class="cat-item d-flex flex-column border mb-4" style="padding: 30px;">
						<p class="text-right">15 Products</p>
						<a href="" class="cat-img position-relative overflow-hidden mb-3">
							<img class="img-fluid" src="{{asset('eshopper/img/cat-4.jpg')}}" alt="">
						</a>
						<h5 class="font-weight-semi-bold m-0">Accerssories</h5>
					</div>
				</div>
				<div class="col-lg-4 col-md-6 pb-1">
					<div class="cat-item d-flex flex-column border mb-4" style="padding: 30px;">
						<p class="text-right">15 Products</p>
						<a href="" class="cat-img position-relative overflow-hidden mb-3">
							<img class="img-fluid" src="{{asset('eshopper/img/cat-5.jpg')}}" alt="">
						</a>
						<h5 class="font-weight-semi-bold m-0">Bags</h5>
					</div>
				</div>
				<div class="col-lg-4 col-md-6 pb-1">
					<div class="cat-item d-flex flex-column border mb-4" style="padding: 30px;">
						<p class="text-right">15 Products</p>
						<a href="" class="cat-img position-relative overflow-hidden mb-3">
							<img class="img-fluid" src="{{asset('eshopper/img/cat-6.jpg')}}" alt="">
						</a>
						<h5 class="font-weight-semi-bold m-0">Shoes</h5>
					</div>
				</div>
			</div>
		</div> -->
    <!-- Categories End -->


    <!-- Offer Start -->
    <!-- <div class="container-fluid offer pt-5">
        <div class="row px-xl-5">
            <div class="col-md-6 pb-4">
                <div class="position-relative bg-secondary text-center text-md-right text-white mb-2 py-5 px-5">
                    <img src="{{asset('eshopper/img/offer-1.png')}}" alt="">
                    <div class="position-relative" style="z-index: 1;">
                        <h5 class="text-uppercase text-primary mb-3">20% off the all order</h5>
                        <h1 class="mb-4 font-weight-semi-bold">Spring Collection</h1>
                        <a href="" class="btn btn-outline-primary py-md-2 px-md-3">Shop Now</a>
                    </div>
                </div>
            </div>
            <div class="col-md-6 pb-4">
                <div class="position-relative bg-secondary text-center text-md-left text-white mb-2 py-5 px-5">
                    <img src="{{asset('eshopper/img/offer-2.png')}}" alt="">
                    <div class="position-relative" style="z-index: 1;">
                        <h5 class="text-uppercase text-primary mb-3">20% off the all order</h5>
                        <h1 class="mb-4 font-weight-semi-bold">Winter Collection</h1>
                        <a href="" class="btn btn-outline-primary py-md-2 px-md-3">Shop Now</a>
                    </div>
                </div>
            </div>
        </div>
    </div> -->
    <!-- Offer End -->

	@include('layouts.layouts_espace_client.products.Trandy_Products')
   


    <!-- Subscribe Start -->
    <!-- <div class="container-fluid bg-secondary my-5">
        <div class="row justify-content-md-center py-5 px-xl-5">
            <div class="col-md-6 col-12 py-5">
                <div class="text-center mb-2 pb-2">
                    <h2 class="section-title px-5 mb-3"><span class="bg-secondary px-2">Stay Updated</span></h2>
                    <p>Amet lorem at rebum amet dolores. Elitr lorem dolor sed amet diam labore at justo ipsum eirmod duo labore labore.</p>
                </div>
                <form action="">
                    <div class="input-group">
                        <input type="text" class="form-control border-white p-4" placeholder="Email Goes Here">
                        <div class="input-group-append">
                            <button class="btn btn-primary px-4">Subscribe</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div> -->
    <!-- Subscribe End -->
	@include('layouts.layouts_espace_client.products.Just_Arrived')

    


    <!-- Vendor Start -->
    <!-- <div class="container-fluid py-5">
        <div class="row px-xl-5">
            <div class="col">
                <div class="owl-carousel vendor-carousel">
                    <div class="vendor-item border p-4">
                        <img src="{{asset('eshopper/img/vendor-1.jpg')}}" alt="">
                    </div>
                    <div class="vendor-item border p-4">
                        <img src="{{asset('eshopper/img/vendor-2.jpg')}}" alt="">
                    </div>
                    <div class="vendor-item border p-4">
                        <img src="{{asset('eshopper/img/vendor-3.jpg')}}" alt="">
                    </div>
                    <div class="vendor-item border p-4">
                        <img src="{{asset('eshopper/img/vendor-4.jpg')}}" alt="">
                    </div>
                    <div class="vendor-item border p-4">
                        <img src="{{asset('eshopper/img/vendor-5.jpg')}}" alt="">
                    </div>
                    <div class="vendor-item border p-4">
                        <img src="{{asset('eshopper/img/vendor-6.jpg')}}" alt="">
                    </div>
                    <div class="vendor-item border p-4">
                        <img src="{{asset('eshopper/img/vendor-7.jpg')}}" alt="">
                    </div>
                    <div class="vendor-item border p-4">
                        <img src="{{asset('eshopper/img/vendor-8.jpg')}}" alt="">
                    </div>
                </div>
            </div>
        </div>
    </div> -->
    <!-- Vendor End -->

	@include('layouts.layouts_espace_client.footer')
    <!-- Footer Start -->
    
    <!-- Footer End -->


    <!-- Back to Top -->
    <a href="#" class="btn btn-primary back-to-top"><i class="fa fa-angle-double-up"></i></a>


    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
    <script src="{{asset('eshopper/lib/easing/easing.min.js')}}"></script>
    <script src="{{asset('eshopper/lib/owlcarousel/owl.carousel.min.js')}}"></script>

    <!-- Contact Javascript File -->
    <script src="{{asset('eshopper/mail/jqBootstrapValidation.min.js')}}"></script>
    <script src="{{asset('eshopper/mail/contact.js')}}"></script>

    <!-- Template Javascript -->
    <script src="{{asset('eshopper/js/main.js')}}"></script>
</body>

</html>