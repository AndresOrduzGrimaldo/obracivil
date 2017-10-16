<?php
  session_start();

  if(!$_SESSION)
  {
    header('location:index.php');
  }
?>

<html><head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Analisis y diseño</title>
        <meta name="description" content="Build your landing page on the fly with wow builder">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="shortcut icon" type="image/png" href="">

        <!-- Place favicon.ico and apple-touch-icon.png in the root directory -->
        <link href="http://fonts.googleapis.com/css?family=Open+Sans:400,600,700" rel="stylesheet" type="text/css">
        <link href="http://fonts.googleapis.com/css?family=Raleway:500,400,300" rel="stylesheet" type="text/css">

        <link rel="stylesheet" href="../css/normalize.css">
<!--        <link rel="stylesheet" href="css/plugins.css" />-->
        <link rel="stylesheet" href="../css/owl.carousel.css">
        <link rel="stylesheet" href="../css/nivo-lightbox.css">
        <link rel="stylesheet" href="../css/themes/default/default.css">
         <link rel="stylesheet" href="../css/jquery.countdown.css">

        <!--if active wow.js. active animate.css-->
        <!--<link rel="stylesheet" href="css/animate.min.css">-->

        <!--<link rel="stylesheet" href="../css/bootstrap-theme.min.css">-->
        <link rel="stylesheet" href="../css/bootstrap.min.css">
        <link rel="stylesheet" href="../css/font-awesome.min.css">
        <link rel="stylesheet" href="../css/style.css">
        <!-- Color CSS -->
        <!--<link rel="stylesheet" href="../css/colors/blue.css">-->


        <link rel="stylesheet" href="../css/responsive.css">
        <link rel="stylesheet" href="../css/bootstrap-theme.min.css">
        </head>
    <body data-spy="scroll" data-target="#main-navbar">

        <div id="page" class="page">



            <header>
                <nav class="navbar fixed-nav navbar-default  navbar-fixed-top" id="main-navbar" role="navigation">
                    <div class="container">
                        <div class="navbar-header">
                            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-collapse">
                                <span class="sr-only">Toggle navigation</span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                            </button>

                            <a href="../perfil_ing.php" class=""><h3 class="text-white" style="margin-top:20px;">SIGAOC</h3></a>
                        </div>  <!--end navbar-header -->

                        <div class="collapse navbar-collapse" id="navbar-collapse">

                           <ul class="nav navbar-nav navbar-right">
                            <li><a href="../perfil_ing.php">Inicio</a></li>
                        <li class="registro-display">
                             <a class=".perfil2"  href="#" style="">Registros!
                             <i class="caret"></i>
                             </a>
                            <ul class="submenu-hijo2" style="display:none;">
                             <li><a href=""data-toggle="modal" data-target="#registrarobra">Registrar Obra</a></li>
                             <li><a href="" data-toggle="modal" data-target="#registrarProveedorModal">Registrar Proveedor</a></li>
                             <li><a href="" data-toggle="modal" data-target="#registrarEmpleado">Registrar Empleado</a></li>
                            </ul>
                        </li>
                                
                                <li><a href="#contact">Contactanos</a></li>
                            <li class="nombre-perfil">
                             <a class=".perfil"  href="#" style=""><?php echo $_SESSION['nombre']; ?>
                             <i class="caret"></i>
                             </a>
                            <ul class="submenu-hijo" style="display:none;">
                             <li><a href="#" data-toggle="modal" data-target="">Editar Perfil</a></li>
                             <li><a href="../gestion/gestionar_obras.php">Gestionar Obras</a></li>
                             <li><a href="gestion_proveedor.php">Gestionar Proveedor</a></li>
                             <li><a href="../desconectar.php">Salir</a></li>
                            </ul>
                        </li>
                            </ul>
                        </div>  <!--end collapse -->
                    </div>  <!--end container -->
                </nav>
            </header><!--/-->
            <?php include('../obras/obras_admin.php'); ?>
            <?php include('../modal/registrar_proveedor.php'); ?>
            <?php include('../modal/registrar_obra.php'); ?>  
            <?php include('../modal/modificar_proveedor.php'); ?>
            <?php include('../modal/eliminar_proveedor.php'); ?>
            <?php include('../modal/registrar_empleado.php'); ?>
            <?php include('../modal/modal_suministro.php'); ?>
            <!--home section-->


            <!-- if you like to use surface. change class="home" to class="surface"-->
            <!--<section id="home" class="home">

                <div class="overlay-startup">

                    <div class="container">
                        <div class="row">
                            <div class="col-md-10 col-md-offset-1">
                                <div class="home-intro-subscribe">
                                    <h1>Manejo de obras de construccion</h1>
                                    <h3>Registra tus obras para poder tener un control sobre ellas, así no perderas la informacion nunca</h3>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </section>-->

      
            <!-- Service Section-->

            <section id="service" class="sections">
                <div class="container">
                
                    <div class="row">
                        
                        <!--  Heading-->
                        <div class="heading wow fadeIn animated" data-wow-offset="120" data-wow-duration="1.5s">
                            <div class="title text-center"><h1>Gestion de Proveedores</h1></div>
                            <div class="subtitle text-center "><h5>Tenemos las mejores obras para el manejo de las mismas</h5></div>
                            <div class="separator text-center"></div>
                        </div>
                        <?php include('proveedores_gestionar.php'); ?>
                        
                        <div class="col-sm-6 clearfix">
                            <div class="feature wow fadeInLeft animated" data-wow-offset="120" data-wow-duration="1.5s">
                                <!--<i class="fa fa-dollar"></i>-->
                                <h4 class="text-white">Tus Obras</h4>
                                <p class="text-white">
                                    Podras conocer toda la informacion de los empleados
                                    generando un reporte sobre ellos para tener un control sobre en las obras en las que trabajan, podras registrarlos a alguna de tus obras para así llevar un control de ellos
                                </p>
                            </div><!--end feature-->
                        </div>

                        <div class="col-sm-6 clearfix">
                            <div class="feature wow fadeInRight animated" data-wow-offset="120" data-wow-duration="1.5s">
                                <!--<i class="fa fa-line-chart"></i>-->
                                <h4 class="text-white">Tus Reportes</h4>
                                <p class="text-white">
                                    Podras obtener el reporte general de la obra, definiendo las informacion necesaria para poder sobre llevarla como sus fechas, su nombre, sus costos entre otros.
                                </p>
                            </div><!--end feature-->
                        </div>

                        <div class="col-sm-6 clearfix">
                           <!-- <div class="feature margin-top-thirty wow fadeInLeft animated" data-wow-offset="120" data-wow-duration="1.5s">
                                <i class="fa fa-legal"></i>
                                <h4 class="text-white">Registra tu obra</h4>
                                <p class="text-white">
                                    Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labor.
                                </p>
                            </div>-->
                        </div>
                        <div class="col-sm-6 clearfix">
                          <!--  <div class="feature margin-top-thirty wow fadeInRight animated" data-wow-offset="120" data-wow-duration="1.5s">
                                <i class="fa fa-legal"></i>
                                <h4 class="text-white">Genera los reportes</h4>
                                <p class="text-white">
                                    Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labor.
                                </p>
                            </div><!--end feature-->
                        </div>

                    </div><!--end row-->
                    

                </div><!--end container-->
            </section><!--/-->



            <!-- FOOTER Section-->

            <footer id="footer" class="footer-2 bg-midnight-blue">
                <div class="container">
                   
                    <div class="col-sm-6">
                        <div class="additional-links editContent">
                            Universidad Francisco de Paula Santander<br>
                            Todos los derechos reservados <br>2017
                            <!--<a href="#">Privacy Policy</a> | <a href="#">Terms</a> -->
                        </div>
                    </div>
                     <div class="col-sm-6">
                        <div class="social-btns pull-right">
                            Angel Ortiz - 1151461 <br>
                            Andrés Orduz 1150470
                            <!--<a href="#"><i class="fa fa-facebook"></i></a>
                            <a href="#"><i class="fa fa-twitter"></i></a>
                            <a href="#"><i class="fa fa-google-plus"></i></a>
                            <a href="#"><i class="fa fa-youtube"></i></a>
                            <a href="#"><i class="fa fa-linkedin"></i></a>-->
                        </div>
                    </div>


                </div>
            </footer></div>



        <!--        <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>-->
        <script src="../js/vendor/jquery-1.10.2.min.js"></script>
        <script type="text/javascript" src="../js/bootstrap.min.js"></script>
        <script src="../js/plugins.js"></script>
        <script src="../js/jquery.mb.YTPlayer.min.js"></script>
        <script src="../js/jquery.parallax-1.1.3.js"></script>
        <script src="../js/jquery.localScroll.min.js"></script>
        <script src="../js/jquery.scrollTo.min.js"></script>
        <script src="../js/smoothscroll.js"></script>
        <script src="../js/jquery.ajaxchimp.min.js"></script>
        <script src="../js/jquery.fitvids.js"></script>
        <script src="../js/jquery.wow.min.js"></script>
        <script src="../js/nivo-lightbox.min.js"></script>
        <script src="../js/jquery-contact.js"></script>
        <script src="../js/jquery.easypiechart.min.js"></script>
        <script src="../js/owl.carousel.min.js"></script>
        <script src="../js/jquery.countdown.min.js"></script>
        <script src="../js/main.js"></script>
        <script src="../js/jquery.validate.js"></script>
        <script src="../js/ajax_calls.js"></script>


        <!-- Google Analytics: change UA-XXXXX-X to be your site's ID. -->
        <!--        <script>
                    (function(b,o,i,l,e,r){b.GoogleAnalyticsObject=l;b[l]||(b[l]=
                    function(){(b[l].q=b[l].q||[]).push(arguments)});b[l].l=+new Date;
                    e=o.createElement(i);r=o.getElementsByTagName(i)[0];
                    e.src='//www.google-analytics.com/analytics.js';
                    r.parentNode.insertBefore(e,r)}(window,document,'script','ga'));
                    ga('create','UA-XXXXX-X');ga('send','pageview');
                </script>-->
    

</body></html>