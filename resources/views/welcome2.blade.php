<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome | PPC</title>

    <!-- Bootstrap CSS CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

</head>

<body>

    <div id="wrapper">
        <!-- Header Area Start Here -->
        <header>
            <!-- Marquee Section -->
            <div class="bg-primary text-light py-2">
                <div class="container">
                    <marquee behavior="scroll" direction="left" onmouseover="this.stop()" onmouseout="this.start()"
                        class="small">
                        <strong>1. KIND ATTENTION TO ALL REGISTERED PHARMACIST:</strong> Attending the CPEP is
                        Compulsory for the Pharmacist having validity up to DEC-2024 for Renewal and Restoration.
                        <strong>ONLINE RENEWAL STARTS FROM 01.01.2025 TO 31.03.2025</strong> |
                        <strong>2. TO APPLY ONLINE FOR ALL SERVICES CONTACT REGISTRAR FOR USER ID AND PASSWORD (Except
                            Fresh Registration)</strong> |
                        <strong>3. For clarification in online services, contact Registrar: 9025589399, Landline:
                            0413-2910066 (Mon-Fri, 10:30AM - 5PM)</strong>
                    </marquee>
                </div>
            </div>

            <!-- Top Bar with Logo and Buttons -->
            <div class="bg-white py-3 border-bottom">
                <div class="container d-flex flex-column flex-md-row justify-content-between align-items-center">
                    <!-- Logo -->
                    <a href="index.php" class="d-block mb-3 mb-md-0">
                        <img src="{{asset('storage\images\PPC_council_image.png')}}" alt="PPC Logo" class="img-fluid" style="height: 100px;">
                    </a>

                    <!-- Buttons -->
                    <div class="text-end">

                      @auth
                        <a href="{{ url('/home') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">Home</a>
                    @else
                        <a href="{{ route('login') }}" class="btn btn-success me-2">Log in</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="btn btn-danger">Register</a>
                        @endif
                    @endauth




                        {{-- <a href="{{ route('login') }}" class="btn btn-success me-2">Login</a>
                        <a href="{{ route('register') }}" class="btn btn-danger" data-bs-toggle="modal"
                            data-bs-target="#myModal1">Register</a> --}}
                    </div>
                </div>
            </div>

            <!-- Navigation Menu (Retain original structure but styled using Bootstrap) -->
            <nav class="navbar navbar-expand-lg navbar-dark bg-dark sticky-top">
                <div class="container">
                    <a class="navbar-brand d-lg-none" href="index.php">Menu</a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                        data-bs-target="#mainNavbar">
                        <span class="navbar-toggler-icon"></span>
                    </button>

                    <div class="collapse navbar-collapse" id="mainNavbar">
                        <ul class="navbar-nav me-auto mb-2 mb-lg-0">

                            <!-- Home -->
                            <li class="nav-item"><a class="nav-link" href="index.php">Home</a></li>

                            <!-- About Us Dropdown -->
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown">About
                                    Us</a>
                                <ul class="dropdown-menu">
                                    <li><a class="dropdown-item" href="profile.php">Profile</a></li>
                                    <li><a class="dropdown-item" href="oath.php">Pharmacist Oath</a></li>
                                    <li><a class="dropdown-item" href="ppc_staff.php">PPC Staff</a></li>
                                </ul>
                            </li>

                            <!-- Act and Rules -->
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown">Act and
                                    Rules</a>
                                <ul class="dropdown-menu">
                                    <li><a class="dropdown-item" href="files/Pharamcy_act_1948.pdf"
                                            target="_blank">Pharmacy Act</a></li>
                                    <li><a class="dropdown-item" href="files/Regulations.pdf" target="_blank">Pharmacy
                                            Practice Regulations</a></li>
                                    <li><a class="dropdown-item" href="files/Rules_1972.pdf" target="_blank">PPC Rules
                                            1972</a></li>
                                </ul>
                            </li>

                            <!-- Inspector -->
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="inspector.php"
                                    data-bs-toggle="dropdown">Inspector</a>
                                <ul class="dropdown-menu">
                                    <li><a class="dropdown-item" href="job.php">Job Listing</a></li>
                                    <li><a class="dropdown-item" href="notifications.php">G.O & Notifications</a></li>
                                </ul>
                            </li>

                            <!-- Online Services -->
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown">Online
                                    Services</a>
                                <ul class="dropdown-menu">
                                    <li><a class="dropdown-item" href="new_register.php">Fresh Registrations-Online</a>
                                    </li>
                                    <li><a class="dropdown-item" href="login.php">Transfer from Pondy to Other state</a>
                                    </li>
                                    <li><a class="dropdown-item" href="otherstatetopondy.php">Transfer from Other State
                                            to Pondy</a></li>
                                    <li><a class="dropdown-item" href="renewal.php">Renewal</a></li>
                                    <li><a class="dropdown-item" href="restoration.php">Restoration</a></li>
                                    <li><a class="dropdown-item" href="name_change.php">Name Change</a></li>
                                    <li><a class="dropdown-item" href="duplicate_certificate.php">Duplicate
                                            Certificate</a></li>
                                    <li><a class="dropdown-item" href="duplicate_id.php">Duplicate ID Card</a></li>
                                    <li><a class="dropdown-item" href="additional.php">Additional Qualification</a>
                                    </li>
                                    <li><a class="dropdown-item" href="good.php">Good Standing Certificate</a></li>
                                    <li><a class="dropdown-item" href="donation.php">Donation</a></li>
                                </ul>
                            </li>

                            <!-- Static Links -->
                            <li class="nav-item"><a class="nav-link" href="affidavits.php">Affidavits</a></li>
                            <li class="nav-item"><a class="nav-link" href="instructions.php">Instructions</a></li>
                            <li class="nav-item"><a class="nav-link" href="cpe.php">CPE</a></li>
                            <li class="nav-item"><a class="nav-link" href="welfare.php">Welfare</a></li>
                            <li class="nav-item"><a class="nav-link" href="contact.php">Contact</a></li>

                            <!-- More Dropdown -->
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown">More</a>
                                <ul class="dropdown-menu">
                                    <li><a class="dropdown-item" href="gallery.php">Gallery</a></li>
                                    <li><a class="dropdown-item" href="enquiry.php">Enquiry</a></li>
                                </ul>
                            </li>

                        </ul>
                    </div>
                </div>
            </nav>
        </header>


    </div>


    <div id="">

        {{-- <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item">
                    <img class="d-block w-100" src="admin/images/99213_banner1.jpeg" alt="First slide">
                </div>
                <div class="carousel-item">
                    <img class="d-block w-100" src="admin/images/99456_PCI-6.jpeg" alt="First slide">
                </div>

                <div class="carousel-item active">
                    <img class="d-block w-100"
                        src="admin/images/99309_98867_WhatsApp Image 2022-05-04 at 7.56.37 PM.jpeg" alt="First slide">
                </div>
                <div class="carousel-item">
                    <img class="d-block w-100" src="admin/images/99396_99618_ppc-4may22-banner-cm-3b-900x643.jpeg"
                        alt="First slide">
                </div>
            </div>
            <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        </div> --}}

 
        <section class="service-layout1 s-space-custom2">
            <div class="container">
                <br>
                <div class="section-title-left-dark child-size-xl">
                    <h3 class="title-medium-light text-left  title-bar-left text-left size-lg">About</h3>
                </div>

                <div class="row">
                    <div class="col-lg-8 col-md-8 col-sm-12 col-12 text-justify">


                        <p class=""></p>
                        <p>Pondicherry Pharmacy Council (PPC) is a statutory body constituted by the Government of
                            Puducherry under the provisions of The Pharmacy Act of 1948. The council consists of six
                            members elected by Registered Pharmacists amongst themselves, five members nominated by
                            Government of Puducherry, one member elected by the State Medical Council and three
                            Ex-Officio members.<br>
                            &nbsp;</p>
                        <p></p>

                        <p class=""></p>
                        <p>The main objective of the Pondicherry Pharmacy Council is to regulate the profession of
                            pharmacy in the state of Puducherry. The prime function of the Pondicherry Pharmacy
                            Council is to grant registration to the eligible pharmacists possessing requisite
                            qualification as per the provisions of section 32 (2) of The Pharmacy Act and to enforce
                            the necessary provisions of The Pharmacy Act, 1948.</p>
                        <p></p>

                    </div>

                    {{-- <div class="col-lg-4 col-md-12 col-12">
                        <div class="sidebar-item-box">
                            <ul class="sidebar-more-option">
                                <li>
                                    <a href="login.php"><img src="img/banner/1.png" alt="more"
                                            style="height:40px; width:60px;" class="img-fluid">Track
                                        Application</a>
                                </li>
                                <li>
                                    <a href="login.php"><img src="img/banner/2.png" alt="more"
                                            style="height:40px; width:60px;" class="img-fluid">Continuing Pharmacy
                                        Education</a>
                                </li>
                                <li>
                                    <a href="announcements_home.php"><img src="img/banner/3.png" alt="more"
                                            style="height:40px; width:60px;" class="img-fluid">Announcements</a>
                                </li>
                            </ul>
                        </div>
                    </div> --}}



                </div>
            </div>
        </section>

        {{-- <section class="service-layout1 bg-light s-space-custom2">
            <div class="container">
                <br>
                <div class="section-title-left-dark child-size-xl">
                    <h3 class="title-medium-light text-left  title-bar-left text-left size-lg">Qucik Access</h3>
                </div>


                <div class="row">
                    <div class="col-lg-3 col-md-6 col-sm-6 col-12 item-mb">
                        <div class="service-box1 bg-body text-center">
                            <img src="img/product/regis.jpg" alt="service" class="img-fluid"
                                style="border-radius: 10px;"><br>
                            <h3 class="title-medium-dark mb-none p-2">
                                <a href="new_register.php">Fresh Registration</a>
                            </h3>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-6 col-12 item-mb">
                        <div class="service-box1 bg-body text-center">
                            <img src="img/product/renewal.jpg" alt="service" class="img-fluid"
                                style="border-radius: 10px;">
                            <h3 class="title-medium-dark mb-none p-2">
                                <a href="renewal.php">Online Renewal</a>
                            </h3>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-6 col-12 item-mb">
                        <div class="service-box1 bg-body text-center">
                            <img src="img/product/name.jpg" alt="service" class="img-fluid"
                                style="border-radius: 10px;">
                            <h3 class="title-medium-dark mb-none p-2">
                                <a href="name_change.php">Name Change</a>
                            </h3>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-6 col-12 item-mb">
                        <div class="service-box1 bg-body text-center">
                            <img src="img/product/dup.jpg" alt="service" class="img-fluid"
                                style="border-radius: 10px;">
                            <h3 class="title-medium-dark mb-none p-2">
                                <a href="duplicate_certificate.php">Duplicate Certificate</a>
                            </h3>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-6 col-12 item-mb">
                        <div class="service-box1 bg-body text-center">
                            <img src="img/product/good.jpg" alt="service" class="img-fluid"
                                style="border-radius: 10px;">
                            <h3 class="title-medium-dark mb-none p-2">
                                <a href="good.php">Good Standing Certificate</a>
                            </h3>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-6 col-12 item-mb">
                        <div class="service-box1 bg-body text-center">
                            <img src="img/product/res.jpg" alt="service" class="img-fluid"
                                style="border-radius: 10px;">
                            <h3 class="title-medium-dark mb-none p-2">
                                <a href="restoration.php">Restoration</a>
                            </h3>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-6 col-12 item-mb">
                        <div class="service-box1 bg-body text-center">
                            <img src="img/product/re.jpg" alt="service" class="img-fluid"
                                style="border-radius: 10px;">
                            <h3 class="title-medium-dark mb-none p-2">
                                <a href="new_register.php">Transfer Re-Registration</a>
                            </h3>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-6 col-12 item-mb">
                        <div class="service-box1 bg-body text-center">
                            <img src="img/product/trust.jpg" alt="service" class="img-fluid"
                                style="border-radius: 10px;">
                            <h3 class="title-medium-dark mb-none p-2">
                                <a href="trust.php">Pharmacist Welfare Trust</a>
                            </h3>
                        </div>
                    </div>



                </div>
            </div>
        </section> --}}
   
        {{-- <section class="bg-body my-3 ">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-1">

                    </div>

                    <div class="col-lg-7 col-md-7 col-sm-12">
                        <div class="section-title-left-dark child-size-xl">
                            <h3 class="title-medium-light title-bar-left size-lg">Announcements</h3>
                        </div>



                    </div>

                    <div class="col-lg-3 col-md-3 col-sm-12">



                        <div class="sidebar-item-box">
                            <div class="gradient-wrapper">
                                <div class=" main-menu-area bg-primary ">
                                    <h3 class="text-white p-2">Latest News</h3>
                                </div>


                                <marquee direction="up" scrollamount="3" height="300px" onmouseover="this.stop()"
                                    onmouseout="this.start()">
                                    <ul class="sidebar-sell-quickly mb-4">
                                    </ul>
                                </marquee>




                                <!---<a href="faq.html" style="float: right; color: #0a74c0; padding-right: 10px;">Read more</a> -->

                            </div>
                        </div>




                    </div>

                </div>
            </div>
        </section> --}}
    
     <footer class="bg-dark text-light pt-5">
    <div class="container">
        <div class="row">

            <!-- Contact Info -->
            <div class="col-lg-5 col-md-6 mb-4">
                <h5 class="fw-bold text-uppercase">Pondicherry Pharmacy Council</h5>
                <p class="text-white small">
                    Govt Pharmacy Campus,<br>
                    Indira Nagar, Gorimedu,<br>
                    Puducherry - 605006.
                </p>
                <p class="text-white small mb-1"><i class="fa fa-phone me-2"></i>+91-9025589399</p>
                <p class="text-white small mb-1"><i class="fa fa-phone me-2"></i>+91-9400127205</p>
                <p class="text-white small"><i class="fa fa-envelope me-2"></i>ponphacil@gmail.com</p>
            </div>

            <!-- Quick Links -->
            <div class="col-lg-4 col-md-6 mb-4">
                <h5 class="fw-bold text-uppercase">Quick Links</h5>
                <ul class="list-unstyled">
                    <li><a href="#/" class="text-decoration-none text-light small d-block py-1">Home</a></li>
                    <li><a href="#/profile.php" class="text-decoration-none text-light small d-block py-1">About Us</a></li>
                    <li><a href="#/enquiry.php" class="text-decoration-none text-light small d-block py-1">Enquiry</a></li>
                    <li><a href="#/contact.php" class="text-decoration-none text-light small d-block py-1">Contact Us</a></li>
                </ul>
                <div class="mt-3">
                    <a href="#"><img src="img/ppcqrcode-small.png" alt="QR Code" class="img-fluid" style="max-width: 120px;"></a>
                </div>
            </div>

            <!-- Social & Map -->
            <div class="col-lg-3 col-md-6 mb-4">
                <h5 class="fw-bold text-uppercase">Follow Us</h5>
                <div class="d-flex mb-3">
                    <a href="#" class="me-2">
                        <img src="img/footer/facebook.png" alt="Facebook" width="32">
                    </a>
                    <a href="#" class="me-2">
                        <img src="img/footer/twitter.png" alt="Twitter" width="32">
                    </a>
                    <a href="#" class="me-2">
                        <img src="img/footer/link.png" alt="LinkedIn" width="32">
                    </a>
                    <a href="https://api.whatsapp.com/send?phone=+91-9025589399" target="_blank" class="me-2">
                        <img src="img/footer/whatsapp.png" alt="WhatsApp" width="32">
                    </a>
                </div>
                <div class="ratio ratio-4x3">
                    <iframe
                        src="https://maps.google.com/maps?q=PONDICHERRY%20PHARMACY%20COUNCIL%20%20GOVT.%20PHARMACY%20CAMPUS,%20INDIRA%20NAGAR,%20GORIMEDU,%20PUDUCHERRY-605%20006.&amp;t=&amp;z=13&amp;ie=UTF8&amp;iwloc=&amp;output=embed"
                        style="border:0;" allowfullscreen="" loading="lazy"></iframe>
                </div>
            </div>

        </div>
    </div>

    <div class="bg-secondary text-center py-3 mt-4">
        <div class="container">
            <p class="mb-0 small">&copy; {{ date('Y') }} Pondicherry Pharmacy Council. All Rights Reserved.</p>
        </div>
    </div>
</footer>

       

    </div>
















    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- FontAwesome for icons -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">

    <!-- Bootstrap JS Bundle -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>
