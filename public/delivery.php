<?php
	require_once("../resources/config.php");
	if(!$is_logged_in){
		redirect("login.php");
	}

	require('../resources/templates/front/header.php');
?>
</head>

<body>
    <!-- nav-bar  -->
    <div class="container">
        <header
            class="d-flex flex-wrap align-items-center justify-content-around justify-content-md-between py-3  border-bottom">
            <a href="/" class="d-flex align-items-left ">
                <img src="./assets/img/logo.png" class="d-block mx-lg-auto img-fluid" alt="yummy tummy" width="25" height="25"
                    loading="lazy">
            </a>


            <div class="col-md-3 text-end">
                <ul class="navbar-nav">
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle ms-2" href="#" role="button" data-bs-toggle="dropdown"
                            aria-expanded="false">
                            <i class="bi bi-person-fill"></i>
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end">
                            <li><a class="dropdown-item" href="#"><i class="bi bi-person"></i> Profile</a></li>

                            <hr>
                            <li>
                                <a class="dropdown-item" href="#"><i class="bi bi-box-arrow-right"></i> Log Out</a>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>
        </header>
    </div>


    <div class="container my-4">
        <h1>Available Jobs</h1>
        <div class="container d-lg-flex flex-lg-row d-sm-block " style="text-align:center;">



            <div class="flip-card mx-3">
                <div class="flip-card-inner">
                    <div class="flip-card-front">
                        <div class="card px-3" style="width: 18rem;">
                            <img src="./assets/img/nepali_thali_set.jpg" class="card-img-top" alt="..." width="200"
                                height="200">
                            <div class="card-body">
                                <h5 class="card-title">Nepali Thali Set</h5>
                                <p class="card-text"></p>
                                <p class="card-text">Location : Satdobato <br />
                                    Available between : <br />
                                    5 PM - 7 PM
                                </p>
                                <a class="btn btn-outline-success" data-bs-toggle="modal"
                                    data-bs-target="#ModalAlert">Take Order</a>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
            <br><br><br><br><br><br><br><br><br><br><br>

            <div class="flip-card mx-3">
                <div class="flip-card-inner">
                    <div class="flip-card-front">
                        <div class="card px-3" style="width: 18rem;">
                            <img src="./assets/img/nepali_thali_set.jpg" class="card-img-top" alt="..." width="200"
                                height="200">
                            <div class="card-body">
                                <h5 class="card-title">Nepali Thali Set</h5>
                                <p class="card-text"></p>
                                <p class="card-text">Location : Satdobato <br />
                                    Available between : <br />
                                    5 PM - 7 PM
                                </p>
                                <a class="btn btn-outline-success" data-bs-toggle="modal"
                                    data-bs-target="#ModalAlert">Take Order</a>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
            <br><br><br><br><br><br><br><br><br><br><br>

            <div class="flip-card mx-3">
                <div class="flip-card-inner">
                    <div class="flip-card-front">
                        <div class="card px-3" style="width: 18rem;">
                            <img src="./assets/img/nepali_thali_set.jpg" class="card-img-top" alt="..." width="200"
                                height="200">
                            <div class="card-body">
                                <h5 class="card-title">Nepali Thali Set</h5>
                                <p class="card-text"></p>
                                <p class="card-text">Location : Satdobato <br />
                                    Available between : <br />
                                    5 PM - 7 PM
                                </p>
                                <a class="btn btn-outline-success" data-bs-toggle="modal"
                                    data-bs-target="#ModalAlert">Take Order</a>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
            <br><br><br><br><br><br><br><br><br><br><br>


            <div class="flip-card mx-3">
                <div class="flip-card-inner">
                    <div class="flip-card-front">
                        <div class="card px-3" style="width: 18rem;">
                            <img src="./assets/img/nepali_thali_set.jpg" class="card-img-top" alt="..." width="200"
                                height="200">
                            <div class="card-body">
                                <h5 class="card-title">Nepali Thali Set</h5>
                                <p class="card-text"></p>
                                <p class="card-text">Location : Satdobato <br />
                                    Available between : <br />
                                    5 PM - 7 PM
                                </p>
                                <a class="btn btn-outline-success" data-bs-toggle="modal"
                                    data-bs-target="#ModalAlert">Take Order</a>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>

        <br><br><br><br><br><br><br><br><br><br><br><br><br>


        <!-- Button trigger modal -->
        <div class="col-md-12 my-2 mt-4" style="display: flex;" id="journalists">
            <h4>My Orders</h4>
            
        </div>

        <div class="accordion" id="accordionExample">
            <div class="accordion-item">
                <h2 class="accordion-header" id="headingOne">
                    <button class="accordion-button" type="button" data-bs-toggle="collapse"
                        data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                        Order #1
                    </button>
                </h2>
                <div id="collapseOne" class="accordion-collapse collapse hidden" aria-labelledby="headingOne"
                    data-bs-parent="#accordionExample">
                    <div class="accordion-body">
                        <div class="">
                            <h6>
                                <p>
                                <h5>Order Details </h5><br>
                                From : <br>
                                Location : _location_ <br>
                                Chef's Username : _username_ <br><br>
                                To : <br>
                                Location : _location_ <br>
                                Customer's Username : _username_ <br><br>
                                Date : _date_ <br><br>
                                Status : _pending_
                                </p>

                            </h6>
                        </div>
                    </div>
                </div>
            </div>
            <div class="accordion-item">
                <h2 class="accordion-header" id="headingTwo">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                        data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                        Order #2
                    </button>
                </h2>
                <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo"
                    data-bs-parent="#accordionExample">
                    <div class="accordion-body">
                        <div class="">
                            <h6>
                                <p>
                                <h5>Order Details </h5><br>
                                From : <br>
                                Location : _location_ <br>
                                Chef's Username : _username_ <br><br>
                                To : <br>
                                Location : _location_ <br>
                                Customer's Username : _username_ <br><br>
                                Date : _date_ <br><br>
                                Status : _pending_
                                </p>

                            </h6>
                        </div>
                    </div>
                </div>
            </div>
            <div class="accordion-item">
                <h2 class="accordion-header" id="headingThree">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                        data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                        Order #3
                    </button>
                </h2>
                <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree"
                    data-bs-parent="#accordionExample">
                    <div class="accordion-body">
                        <div class="">
                            <h6>
                                <p>
                                <h5>Order Details </h5><br>
                                From : <br>
                                Location : _location_ <br>
                                Chef's Username : _username_ <br><br>
                                To : <br>
                                Location : _location_ <br>
                                Customer's Username : _username_ <br><br>
                                Date : _date_ <br><br>
                                Status : _pending_

                                </p>

                            </h6>
                        </div>
                    </div>
                </div>
            </div>
        </div>



        <!-- ModalAlert -->
        <div class="modal fade" id="ModalAlert" tabindex="-1" aria-labelledby="ModalAlertLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="ModalAlertLabel">Confirm Order</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <p>
                        <h5>Order Details </h5><br>
                        From : <br>
                        Location : _location_ <br>
                        Chef's Username : _username_ <br><br>
                        To : <br>
                        Location : _location_ <br>
                        Customer's Username : _username_ <br><br>
                        Date : _date_ <br>


                        </p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-outline-success" data-bs-dismiss="modal">Confirm
                            Delivery</button>
                        <button type="button" class="btn btn-outline-danger" data-bs-dismiss="modal">Cancel</button>
                    </div>
                </div>
            </div>
        </div>

    </div>


    <!-- footer -->
    <div class="container">
        <footer class="row row-cols-1 row-cols-sm-2 row-cols-md-5 py-5 my-5 border-top">
            <div class="col mb-3 my-5">
                <a href="/" class="d-flex align-items-center col-md-3 mb-2 mb-md-0 text-dark text-decoration-none">
                    <img src="./assets/img/logo.png" class="d-block mx-lg-auto img-fluid" alt="yummy tummy" width="50"
                        height="50" loading="lazy">
                </a>
                <p class="text-muted my-4">Yummy Tummy</p>
            </div>

            <div class="col mb-3">

            </div>


            <div class="col mb-3">

                <h5>Kathmandu</h5>
                <ul class="nav flex-column">
                    <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted">Newroad</a></li>
                    <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted">Koteshor</a></li>
                    <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted">Bouddha</a></li>
                    <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted">Kalanki</a></li>
                    <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted">Thapathali</a></li>
                </ul>
            </div>

            <div class="col mb-3">
                <h5>Bhaktapur</h5>
                <ul class="nav flex-column">
                    <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted">Sipadol</a></li>
                    <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted">Thimi</a></li>
                    <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted">Bhatgaon</a></li>
                    <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted">Katunje</a></li>
                    <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted">Madhyapur</a></li>
                </ul>
            </div>

            <div class="col mb-3">
                <h5>Lalitpur</h5>
                <ul class="nav flex-column">
                    <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted">Satdobato</a></li>
                    <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted">Balkhu</a></li>
                    <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted">Balkumari</a></li>
                    <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted">Patan</a></li>
                    <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted">Lagankhel</a></li>
                </ul>
            </div>
        </footer>
    </div>

    <div class="container">
        <footer class="d-flex flex-wrap justify-content-between align-items-center py-3 my-4 border-top">
            <div class="col-md-4 d-flex align-items-center">

                <span class="mb-3 mb-md-0 text-muted">© 2023 Y-Engine</span>
            </div>

            <ul class="nav col-md-4 justify-content-end list-unstyled d-flex">
                <li class="ms-3"><a class="text-muted" href="#"><svg class="bi" width="24" height="24">
                            <use xlink:href="#twitter"></use>
                        </svg></a></li>
                <li class="ms-3"><a class="text-muted" href="#"><svg class="bi" width="24" height="24">
                            <use xlink:href="#instagram"></use>
                        </svg></a></li>
                <li class="ms-3"><a class="text-muted" href="#"><svg class="bi" width="24" height="24">
                            <use xlink:href="#facebook"></use>
                        </svg></a></li>
            </ul>
        </footer>
    </div>
    <!-- bootstrap script  -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN"
        crossorigin="anonymous"></script>

    <!-- script  -->
    <script src="./js/script.js"></script>
</body>

</html>