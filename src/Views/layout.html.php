<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Mon superbe blog - <?= $pageTitle ?></title>
    <!-- Bootstrap Core CSS -->
    <link href="../../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <!-- Theme CSS -->
    <link href="../../public/css/freelancer.css" rel="stylesheet">
    <!-- Custom Fonts -->
    <script src="https://kit.fontawesome.com/34c6cb5b88.js" crossorigin="anonymous"></script>
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Lato:400,700,400italic,700italic" rel="stylesheet"
          type="text/css">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>


<body id="page-top" class="index">
<!-- NAVIGATION -->
<nav id="mainNav" class="navbar navbar-default navbar-fixed-top navbar-custom">
    <div class="container">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header page-scroll">
            <button type="button" class="navbar-toggle" data-toggle="collapse"
                    data-target="#bs-example-navbar-collapse-1">
                <span class="sr-only">Toggle navigation</span> Menu <i class="fa fa-bars"></i>
            </button>
            <a class="navbar-brand" href="index.php?controller=home&task=home">Farid TANGI.</a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav navbar-right">
                <li class="hidden">
                    <a href="index.php?controller=home&task=home"></a>
                </li>
                <li class="page-scroll">
                    <a href="index.php?controller=article&task=blog">Blog</a>
                </li>
                <li class="page-scroll">
                    <a href="index.php?controller=home&task=about">About</a>
                </li>
                <li class="page-scroll">
                    <a href="index.php?controller=home&task=contact">Contact</a>
                </li>
                <?php
                if (isset($_SESSION['auth']) && $_SESSION['auth'] == 1) {
                    ?>
                    <li class="page-scroll">
                        <a href="index.php?controller=user&task=dashboard">Dashboard</a>
                    </li>
                    <li class="page-scroll">
                        <a href="index.php?controller=user&task=logout">Déconnexion</a>
                    </li>
                    <?php
                } else {
                    if (isset($_SESSION['auth']) && $_SESSION['auth'] == 0) {
                        ?>
                        <li class="page-scroll">
                            <a href="index.php?controller=user&task=logout">Déconnexion</a>
                        </li>
                        <?php
                    }
                }
                ?>
                <li class="page-scroll">
                    <a href="index.php?controller=user&task=login">Connexion/Inscription</a>
                </li>
            </ul>
        </div>
        <!-- /.navbar-collapse -->
    </div>
    <!-- /.container-fluid -->
</nav>

<?= $pageContent ?>

<!-- FOOTER -->
<footer class="text-center">
    <div class="footer-above">
        <div class="container">
            <div class="row">
                <div class="footer-col col-md-4">
                    <h3>Navigation</h3>
                    <p>login</p>
                    <p>contact</p>
                </div>
                <div class="footer-col col-md-4">
                    <h3>Around the Web</h3>
                    <ul class="list-inline">
                        <li>
                            <a href="#" class="btn-social btn-outline"><i class="fa fa-fw fa-facebook-f"></i></a>
                        </li>
                        <li>
                            <a href="#" class="btn-social btn-outline"><i class="fa fa-fw fa-instagram"></i></a>
                        </li>
                        <li>
                            <a href="#" class="btn-social btn-outline"><i class="fa fa-fw fa-twitter"></i></a>
                        </li>
                        <li>
                            <a href="#" class="btn-social btn-outline"><i class="fa fa-fw fa-linkedin"></i></a>
                        </li>
                    </ul>
                </div>
                <div class="footer-col col-md-4">
                    <h3>About me</h3>
                    <p>Junior PHP/SYMFONY developer to serve you</p>
                </div>
            </div>
        </div>
    </div>
    <div class="footer-below">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    Copyright &copy; Farid TANGI 2022
                </div>
            </div>
        </div>
    </div>
</footer>
<!-- jQuery -->
<script src="../../vendor/jquery/jquery.min.js"></script>
<!-- Bootstrap Core JavaScript -->
<script src="../../vendor/bootstrap/js/bootstrap.min.js"></script>
<!-- Plugin JavaScript -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.3/jquery.easing.min.js"></script>
<!-- Contact Form JavaScript -->
<script src="../../public/js/jqBootstrapValidation.js"></script>
<script src="../../public/js/contact_me.js"></script>
<!-- Theme JavaScript -->
<script src="../../public/js/freelancer.min.js"></script>
</body>
</html>