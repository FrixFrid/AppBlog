<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>TANGI Farid - <?= $pageTitle ?></title>
    <meta name="robots" content="noindex, follow"/>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="/img/favicon.png"/>
    <!-- CSS
    ============================================ -->
    <!-- Vendor CSS (Contain Bootstrap, Icon Fonts) -->
    <link rel="stylesheet" href="/css/vendor/bootstrap.min.css"/>
    <link rel="stylesheet" href="/css/vendor/icofont.min.css"/>
    <!-- Plugin CSS (Global Plugins Files) -->
    <link rel="stylesheet" href="/css/plugins/animate.css">
    <link rel="stylesheet" href="/css/plugins/swiper-bundle.min.css">
    <link rel="stylesheet" href="/css/plugins/venobox.min.css"/>
    <!-- Style CSS -->
    <link rel="stylesheet" href="/css/style.css">
    <!-- Minify Version -->
    <!-- <link rel="stylesheet" href="assets/css/vendor/vendor.min.css">
    <link rel="stylesheet" href="assets/css/plugins/plugins.min.css">
    <link rel="stylesheet" href="assets/css/style.min.css"> -->
</head>
<body>
<main class="main-wrapper">
    <!-- .....:::::: Start Header Section :::::.... -->
    <header class="header-section sticky-header d-none d-lg-block">
        <div class="header-wrapper">
            <div class="container">
                <div class="row justify-content-between align-items-center">
                    <div class="col">
                        <!-- Start Header Logo -->
                        <a href="/" class="header-logo">
                            <img style="width: 100px" src="/img/IFXlogo.png" alt="">
                        </a>
                        <!-- End Header Logo -->
                    </div>
                    <div class="col-auto">
                        <!-- Start Header Menu -->
                        <ul class="header-nav">
                            <li><a href="/">Accueil</a></li>
                            <li class="header-nav">
                                <a href="/about">A propos</a>
                            </li>
                            <li class="header-nav">
                                <a href="/blog">Blog</a>
                            </li>
                            <li class="header-nav">
                                <a href="/contact">Contact</a>
                            </li>
                            <?php
                            if (isset($_SESSION['user']) && $_SESSION['user']->getIsAdmin()) {
                                ?>
                                <li class="header-nav">
                                    <a href="/dashboard">Dashboard</a>
                                </li>
                                <li class="header-nav">
                                    <a href="/logout"">Déconnexion</a>
                                </li>
                                <?php
                            } elseif (isset($_SESSION['user'])) {
                                ?>
                                <li class="header-nav">
                                    <a href="/logout">Déconnexion</a>
                                </li>
                                <?php
                            } else {
                                ?>
                                <li class="header-nav">
                                    <a href="/login">Connexion/Inscription</a>
                                </li>
                            <?php }
                            ?>
                        </ul>
                        <!-- End Header Menu -->
                    </div>
                </div>
            </div>
    </header>
    <!-- .....:::::: End Header Section :::::.... -->
    <!-- .....:::::: Start Mobile Header Section :::::.... -->
    <div class="mobile-header d-block d-lg-none">
        <div class="container">
            <div class="row align-items-center justify-content-between">
                <div class="col">
                    <div class="mobile-logo">
                        <a href="/"><img src="/img/favicon.png" alt=""></a>
                    </div>
                </div>
                <div class="col">
                    <div class="mobile-action-link text-end">
                        <a href="#mobile-menu-offcanvas" class="offcanvas-toggle offside-menu"><i
                                    class="icofont-navigation-menu"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- .....:::::: Start MobileHeader Section :::::.... -->
    <!--  Start Offcanvas Mobile Menu Section -->
    <div id="mobile-menu-offcanvas" class="offcanvas offcanvas-rightside offcanvas-mobile-menu-section">
        <!-- Start Offcanvas Header -->
        <div class="offcanvas-header text-end">
            <button class="offcanvas-close"><i class="icofont-close-line"></i></button>
        </div> <!-- End Offcanvas Header -->
        <!-- Start Offcanvas Mobile Menu Wrapper -->
        <div class="offcanvas-mobile-menu-wrapper">
            <!-- Start Mobile Menu  -->
            <div class="mobile-menu-bottom">
                <!-- Start Mobile Menu Nav -->
                <div class="offcanvas-menu">
                    <ul>
                        <li>
                            <a href="/"><span>Accueil</span></a>
                        </li>
                        <li class="header-nav">
                            <a href="/about">A propos</a>
                        </li>
                        <li class="header-nav">
                            <a href="/blog">Blog</a>
                        </li>
                        <li class="header-nav">
                            <a href="/contact">Contact</a>
                        </li>
                        <?php
                        if (isset($_SESSION['user']) && $_SESSION['user']->getIsAdmin()) {
                            ?>
                            <li class="header-nav">
                                <a href="/dashboard">Dashboard</a>
                            </li>
                            <li class="header-nav">
                                <a href="/logout"">Déconnexion</a>
                            </li>
                            <?php
                        } elseif (isset($_SESSION['user'])) {
                            ?>
                            <li class="header-nav">
                                <a href="/logout"">Déconnexion</a>
                            </li>
                            <?php
                        }
                        ?>
                        <li class="header-nav">
                            <a href="/login"">Connexion/Inscription</a>
                        </li>
                    </ul>
                </div> <!-- End Mobile Menu Nav -->
            </div> <!-- End Mobile Menu -->
            <!-- Start Mobile contact Info -->
            <div class="mobile-contact-info text-center">
                <ul class="social-link">
                    <li><a target="_blank" href="https://www.facebook.com/ifxmysetup/"><i class="icofont-facebook"></i></a>
                    </li>
                    <li><a target="_blank" href="https://twitter.com/ifxmysetup"><i class="icofont-twitter"></i></a>
                    </li>
                    <li><a target="_blank" href="https://www.instagram.com/ifxmysetup/"><i
                                    class="icofont-instagram"></i></a></li>
                    <li><a target="_blank" href="https://github.com/FrixFrid"><i class="icofont-github"></i></a></li>
                    <li><a target="_blank" href="https://fr.linkedin.com/in/farid-tangi"><i
                                    class="icofont-linkedin"></i></a></li>
                </ul>
            </div>
            <!-- End Mobile contact Info -->
        </div> <!-- End Offcanvas Mobile Menu Wrapper -->
    </div>
    <!-- ...:::: End Offcanvas Mobile Menu Section:::... -->
    <?= $pageContent ?>
    <!-- FOOTER -->
    <footer class="footer-section section-bg overflow-hidden pos-relative">
        <div class="footer-inner-shape-top-left"></div>
        <div class="footer-inner-shape-top-right"></div>
        <div class="footer-section-top section-gap-t-165">
        </div>
        <div class="footer-center section-gap-tb-165">
            <div class="container">
                <div class="row justify-content-between align-items-center mb-n5">
                    <div class="col-auto mb-5">
                        <!-- Start Single Footer Info -->
                        <div class="footer-single-info">
                            <a href="tel:+33667985149" class="info-box">
                                <span class="icon"><i class="icofont-phone"></i></span>
                                <span class="text">0667985149</span>
                            </a>
                        </div>
                        <!-- Start Single Footer Info -->
                    </div>
                    <div class="col-auto mb-5">
                        <!-- Start Single Footer Info -->
                        <div class="footer-single-info">
                            <a href="mailto:hello@ifxmysetup.com" class="info-box">
                                <span class="icon"><i class="icofont-envelope-open"></i></span>
                                <span class="text">hello@ifxmysetup.com</span>
                            </a>
                        </div>
                        <!-- Start Single Footer Info -->
                    </div>
                    <div class="col-auto mb-5">
                        <!-- Start Single Footer Info -->
                        <div class="footer-single-info">
                            <ul class="social-link">
                                <li><a href="https://www.facebook.com/ifxmysetup/" target="_blank"><i
                                                class="icofont-facebook"></i></a></li>
                                <li><a target="_blank" href="https://twitter.com/ifxmysetup"><i
                                                class="icofont-twitter"></i></a></li>
                                <li><a href="https://www.instagram.com/ifxmysetup/" target="_blank"><i
                                                class="icofont-instagram"></i></a></li>
                                <li><a href="https://github.com/FrixFrid" target="_blank"><i class="icofont-github"></i></a>
                                </li>
                                <li><a href="https://fr.linkedin.com/in/farid-tangi" target="_blank"><i
                                                class="icofont-linkedin"></i></a></li>
                            </ul>
                        </div>
                        <!-- Start Single Footer Info -->
                    </div>
                </div>
            </div>
        </div>
        <div class="footer-bottom">
            <div class="container">
                <div class="row justify-content-center justify-content-md-between align-items-center flex-column-reverse flex-md-row">
                    <div class="col-auto">
                        <div class="footer-copyright">
                            <p class="copyright-text">&copy; 2023 <a href="/">Farid Tangi</a> Made with <i
                                        class="icofont-heart"></i></p>
                        </div>
                    </div>
                    <div class="col-auto">
                        <a href="/" class="footer-logo">
                            <div class="logo">
                                <img src="/img/favicon.png" alt="">
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- ...::: End Footer Section :::... -->
    <!-- material-scrolltop button -->
    <button class="material-scrolltop" type="button"><i class="icofont-long-arrow-up icofont-2x"></i></button>
</main>
<!-- Global Vendor, plugins JS -->
<!-- JS Files
============================================ -->
<!-- Global Vendor, plugins JS -->
<!-- Vendor JS -->
<script src="/js/vendor/modernizr-3.11.2.min.js"></script>
<script src="/js/vendor/jquery-3.6.0.min.js"></script>
<script src="/js/vendor/jquery-migrate-3.3.2.min.js"></script>
<script src="/js/vendor/bootstrap.bundle.min.js"></script>
<!--Plugins JS-->
<script src="/js/plugins/swiper-bundle.min.js"></script>
<script src="/js/plugins/jquery.appear.min.js"></script>
<script src="/js/plugins/venobox.min.js"></script>
<script src="/js/plugins/jquery.waypoints.js"></script>
<script src="/js/plugins/images-loaded.min.js"></script>
<script src="/js/plugins/isotope.pkgd.min.js"></script>
<script src="/js/plugins/counter.js"></script>
<script src="/js/plugins/ajax-mail.js"></script>
<script src="/js/plugins/material-scrolltop.js"></script>
<!-- Minify Version -->
<!-- <script src="assets/js/vendor.min.js"></script>
<script src="assets/js/plugins.min.js"></script> -->
<!--Main JS (Common Activation Codes)-->
<script src="/js/main.js"></script>
</body>
</html>