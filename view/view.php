
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <!-- Favicon-->
        <link rel="shortcut icon" type="image/x-icon" href="./images/Logo.png" />
        <!-- Bootstrap Core CSS -->
        <link href="./css/bootstrap.min.css" rel="stylesheet">
        <link href="./css/bootstrap.css" rel="stylesheet">

        <script src="./js/Copo.js" type="text/javascript"></script>


        <!-- Custom CSS -->
        <link href="./css/CopoReno.css" rel="stylesheet">

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800" rel="stylesheet" type="text/css">
        <link href="https://fonts.googleapis.com/css?family=Josefin+Slab:100,300,400,600,700,100italic,300italic,400italic,600italic,700italic" rel="stylesheet" type="text/css">



        <title><?php echo $pagetitle; ?></title>
    </head>
    <body>


        <a href="index.php">
            <div>
                <img class="logo" src="./images/Logo.jpg" alt="LogoEntreprise">

            </div>


        </a>



        <!--<div class="brand">Copo Construction inc</div>-->


        <!-- Navigation -->
        <nav class="navbar navbar-default" role="navigation">
            <div class="container">
                <!-- Brand and toggle get grouped for better mobile display -->


                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                        <span class="sr-only">Menu Burger</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>

                    </button>
                    <!-- navbar-brand is hidden on larger screens, but visible when the menu is collapsed -->
                    <a class="navbar-brand" href="index.html">CopoConstruction</a>
                </div>
                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                    <ul class="nav navbar-nav navigation">
                        <li>
                            <a href="index.php">Accueil</a>
                        </li>
                        <li>
                            <a href="index.php?action=copo">À Propos</a>
                        </li>

                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" title="Nos différentes réalisations">Nos Réalisations<b class="caret"></b></a>
                            <ul class="dropdown-menu dropdown-menu-right">
                                <li>
                                    <a href="index.php?action=Realisation&p=Commercial">Commercial</a>
                                </li>
                                <li>
                                    <a href="index.php?action=Realisation&p=Neuf">Neuf</a>
                                </li>

                                <li>
                                    <a href="index.php?action=Realisation&p=Solarium">Solarium</a>
                                </li>
                                <li>
                                    <a href="index.php?action=Realisation&p=Agrandissement">Agrandissement</a>
                                </li>


                                <li>
                                    <a href="index.php?action=Realisation&p=Terrasse-Balcon">Terrasse-Balcon</a>
                                </li>


                                <li>
                                    <a href="index.php?action=Realisation&p=Cuisine">Cuisine</a>
                                </li>
                                <li>
                                    <a href="index.php?action=Realisation&p=Salle-de-bain">Salle-de-bain</a>
                                </li>

                                <li>
                                    <a href="index.php?action=Realisation&p=Renovation">Rénovation</a>
                                </li>
                                <hr class="divider">
                                <li>
                                    <a href="index.php?action=Realisation&p=Divers">Divers</a>
                                </li>

                            </ul>
                        </li>
                        <li>
                            <a href="index.php?action=contact">Contact</a>
                        </li>
                        <li>
                            <a href="index.php?action=liens">Liens Utiles</a>
                        </li>

                        <?php
                        if ($_SESSION != NULL) {
                            if (Session::is_admin()) {

                                echo <<<EOF
                           <li>
                         <a  href="index.php?action=dashboard">Dashboard</a>
                         </li> 
EOF;
                            }
                            echo <<<EOF
                         <li>
                         <a  href="index.php?action=deconnect">Deconnexion</a>
                         </li>
EOF;
                        }
                        ?>
                    </ul>
                </div>
                <!-- /.navbar-collapse -->
            </div>
            <!-- /.container -->
        </nav>

        <!-- container -->


        <?php
        $filepath = File::build_path(array("view", $controller, "$view.php"));
        require $filepath;
        ?>


        <!-- /.container -->

        <footer>

            <div class="col-lg-12 text-center">


                <div class="row cell"><span class="textFooter">Cell : 514 - 915 - 2676</span></div>
                <div class="row rbq"><span class="textFooter">RBQ # 5626-2538-01</span></div>
            </div>

        </footer>

        <!-- jQuery -->
        <script src="./js/jquery.js"></script>

        <!-- Bootstrap Core JavaScript -->
        <script src="./js/bootstrap.min.js"></script>



    </body>
</html>