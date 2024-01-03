<!DOCTYPE html>
<html class="no-js" lang="en_AU" />

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <title>E-commerce Site</title>
    <meta name="description" content="" />
    <meta name="viewport"
        content="width=device-width, initial-scale=1, shrink-to-fit=no, maximum-scale=1, user-scalable=no" />

    <link rel="stylesheet" type="text/css" href="{{ asset('front-assets/css/slick.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('front-assets/css/slick-theme.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('front-assets/css/style.css') }}" />

    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Poppins:wght@200;500&family=Raleway:ital,wght@0,400;0,600;0,800;1,200&family=Roboto+Condensed:wght@400;700&family=Roboto:wght@300;400;700;900&display=swap"
        rel="stylesheet">
    <link rel="shortcut icon" type="image/x-icon" href="#" />

    <style>
        body {
            font-size: 18px;
        }

        .bg-custom {
            background-color: #001f3f;
        }

        .text-custom {
            color: #fff;
        }

        h2,
        h3,
        h4,
        h5,
        h6,
        p,
        a {
            font-size: 14px;
        }

        li a {
            font-size: 14px;
        }

        .product-card {
            width: 80%;
            margin: auto;
            margin-bottom: 20px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            /* Adjust the values as needed */
            transition: box-shadow 0.3s ease;
            /* Add a transition for a smooth effect */
        }

        .product-card:hover {
            box-shadow: 0 0 5px rgba(0, 0, 0, 0.1);
            /* Adjust the values for the hover effect */
        }

        .footer-column {
            display: flex;
            justify-content: center;
        }

        @media (max-width: 768px) {
            .footer-column {
                flex: 0 0 100%;
            }
        }

        #navtext {
            font-size: 17px;
        }

        .hr-header {
            border-bottom: 1px solid #001f3f;
            margin: 0;
            shodow box-shadow: 0px 5px 10px rgba(0, 0, 0, 0.1);
        }

        .hr-header {
            border-bottom: 1px solid #001f3f;
            margin: 0;
            /* Corrected typo here */
            box-shadow: 0px 5px 10px rgba(0, 0, 0, 0.1);
        }
        #style-price{
            font-size: smaller;
        }
    </style>
</head>

<body data-instant-intensity="mousedown">

    <header class="bg-dark">
        <div class="bg-light top-header">
            <div class="container">
                <div class="row align-items-center py-3 d-none d-lg-flex justify-content-between">
                    <div class="col-lg-4 logo">
                        <a href="index.php" class="text-decoration-none">
                            <span class="h1 text-uppercase"
                                style="color: #001f3f; text-shadow: 1px 1px 1px #001f3f;">ZenCart</span>
                        </a>
                    </div>
                    <div class="col-lg-8 col-6 text-right d-flex justify-content-end align-items-center mr-3">
                        <a href="account.php" class="nav-link text-dark mr-3" id="navtext">Home</a>
                        <a href="account.php" class="nav-link text-dark mr-3" id="navtext">Shop</a>
                        <a href="account.php" class="nav-link text-dark mr-3" id="navtext">About Us</a>
                        <a href="account.php" class="nav-link text-dark mr-3" id="navtext">Contact</a>

                        <!-- Cart icon here -->
                        <div class="cart-icon">
                            <i class="fa fa-shopping-cart" style="font-size: 20px; color: #001f3f;"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <hr class="hr-header">
    </header>


    <main>
        @yield('content')
    </main>

    <footer class="bg-custom mt-5">
        <div class="container pb-5 pt-3">
            <div class="row">
                <div class="col-md-4 footer-column">
                    <div class="footer-card text-white">
                        <h3>Get In Touch</h3>
                        <p>No dolore ipsum accusam no lorem. <br>
                            123 Street, New York, USA <br>
                            exampl@example.com <br>
                            000 000 0000</p>
                    </div>
                </div>

                <div class="col-md-4 footer-column">
                    <div class="footer-card text-white">
                        <h3>Important Links</h3>
                        <ul>
                            <li><a href="about-us.php" title="About">About</a></li>
                            <li><a href="contact-us.php" title="Contact Us">Contact Us</a></li>
                            <li><a href="#" title="Privacy">Privacy</a></li>
                            <li><a href="#" title="Privacy">Terms & Conditions</a></li>
                            <li><a href="#" title="Privacy">Refund Policy</a></li>
                        </ul>
                    </div>
                </div>

                <div class="col-md-4 footer-column">
                    <div class="footer-card text-white">
                        <h3>My Account</h3>
                        <ul>
                            <li><a href="#" title="Sell">Login</a></li>
                            <li><a href="#" title="Advertise">Register</a></li>
                            <li><a href="#" title="Contact Us">My Orders</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="copyright-area">
            <div class="container">
                <div class="row">
                    <div class="col-12 mt-3">
                        <div class="copy-right text-center text-white">
                            <p>© Copyright 2022 Amazing Shop. All Rights Reserved</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>



    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="{{ asset('front-assets/js/bootstrap.bundle.5.1.3.min.js') }}"></script>
    <script src="{{ asset('front-assets/js/instantpages.5.1.0.min.js') }}"></script>
    <script src="{{ asset('front-assets/js/lazyload.17.6.0.min.js') }}"></script>
    <script src="{{ asset('front-assets/js/slick.min.js') }}"></script>
    <script src="{{ asset('front-assets/js/custom.js') }}"></script>

    <script>
        if (window.jQuery) {
            jQuery(document).ready(function() {
                window.onscroll = function() {
                    myFunction();
                };

                var navbar = document.getElementById("navbar");
                var sticky = navbar.offsetTop;

                function myFunction() {
                    if (window.pageYOffset >= sticky) {
                        navbar.classList.add("sticky");
                    } else {
                        navbar.classList.remove("sticky");
                    }
                };
            });
            else {
                // jQuery is not loaded
                console.error('jQuery is not loaded!');
            }
        }
    </script>

</body>

</html>
