<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Dr. OTUYO AISHAT</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="keywords" content="">
    <meta name="description" content="">

    <!-- Favicons -->
    <link rel="icon" href="logo.jpg">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Heebo:wght@400;500;600&family=Inter:wght@600&family=Lobster+Two:wght@700&display=swap" rel="stylesheet">

    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="lib/animate/animate.min.css" rel="stylesheet">
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="bootstrap.min.css" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="aishat.css" rel="stylesheet">

    <style>
        /* CSS for the mobile menu button and hiding the navigation menu */
        .mobile-menu-button {
            display: none;
            background: transparent;
            border: none;
            color: #000;
            font-size: 20px;
            cursor: pointer;
        }

        @media (max-width: 768px) {
            .nav-menu {
                display: none;
            }

            .mobile-menu-button {
                display: block;
            }
        }
    </style>
</head>

<body>
    <!-- Top Header Start -->
    <section class="top-header">
        <div class="container text-center">
            <div class="row">
                <div class="col-md-12">
                    <h1><a href="index.html">Dr. Aishat Otuyo</a></h1>
                </div>
            </div>
        </div>
    </section>
    <!-- Top Header End -->

    <!-- Header Start -->
    <header id="header">
        <div class="container">
            <button class="mobile-menu-button">
                <i class="bi bi-list"></i> Menu
            </button>
            <nav id="nav-menu-container">
                <ul class="nav-menu">
                    <li class="menu-active"><a href="aishat.php">Home</a></li>
                    <li><a href="about.html">About</a></li>
                    <li><a href="service.html">Services</a></li>
                    <li><a href="ai_booking.php">Booking</a></li>
                    <li class="menu-has-children"><a href="#">Pages</a>
                        <ul>
                            <li><a href="ai_login.php">Login</a></li>
                            <li class="menu-has-children"><a href="#">Drop Down</a>
                                <ul>
                                    <li><a href="#">Drop Down 1</a></li>
                                    <li><a href="#">Drop Down 2</a></li>
                                </ul>
                            </li>
                        </ul>
                    </li>
                    <li><a href="contact.html">Contact</a></li>
                    <li><a href="ai_login.php">Login</a></li>
                    <li><a href="ai_signup.php" class="btn rounded-pill px-3 d-none d-lg-block">Sign up <i class="fa fa-arrow-right ms-3"></i></a></li>
                </ul>
            </nav>
        </div>
    </header>
    <!-- Header End -->
    <script>
        $(document).ready(function () {
            // Toggle the navigation menu when the mobile menu button is clicked
            $(".mobile-menu-button").click(function () {
                $(".nav-menu").slideToggle();
            });

            // Close the navigation menu when a menu item is clicked
            $(".nav-menu li a").click(function () {
                if ($(window).width() <= 768) {
                    $(".nav-menu").slideUp();
                }
            });

            // Ensure the menu is visible when the screen size changes from mobile to desktop view
            $(window).resize(function () {
                if ($(window).width() > 768) {
                    $(".nav-menu").css("display", "block");
                } else {
                    $(".nav-menu").css("display", "none");
                }
            });
        });
    </script>

  
</body>
</html>
