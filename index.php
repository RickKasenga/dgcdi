<?php
ob_start();
//pour lier la base de donner
include 'fonctions/main.php';

$pages=scandir('pages/');
if(isset($_GET['page'])&& !empty($_GET['page'])){
    if(in_array($_GET['page'].'.php',$pages)){

        $page=$_GET['page'];

    }else{
        $page='erreurs';
    }
}else{
    $page="accueil";
}

$pages_functions=scandir('fonctions/');
if(in_array($page.'.func.php',$pages_functions)){
    include 'fonctions/'.$page.'.func.php';
}

?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <!-- ========== Meta Tags ========== -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Earna - Consulting Business Template">

    <!-- ========== Page Title ========== -->
    <title>DGCDI</title>

    <!-- ========== Favicon Icon ========== -->
    <link rel="shortcut icon" href="assets/img/favicon.png" type="image/x-icon">

    <!-- ========== Start Stylesheet ========== -->
    <link href="assets/css/bootstrap.min.css" rel="stylesheet" />
    <link href="assets/css/font-awesome.min.css" rel="stylesheet" />
    <link href="assets/css/themify-icons.css" rel="stylesheet" />
    <link href="assets/css/elegant-icons.css" rel="stylesheet" />
    <link href="assets/css/flaticon-set.css" rel="stylesheet" />
    <link href="assets/css/magnific-popup.css" rel="stylesheet" />
    <link href="assets/css/owl.carousel.min.css" rel="stylesheet" />
    <link href="assets/css/owl.theme.default.min.css" rel="stylesheet" />
    <link href="assets/css/animate.css" rel="stylesheet" />
    <link href="assets/css/bootsnav.css" rel="stylesheet" />
    <link href="style.css" rel="stylesheet">
    <link href="assets/css/responsive.css" rel="stylesheet" />
    
     <!-- ========== fontaweson ========== -->
     <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" rel="stylesheet" />
     <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/brands.min.css" rel="stylesheet" />
    <!-- ========== End Stylesheet ========== -->

</head>

<body>

    <!-- Start Preloader 
    ============================================= -->
    <?php
    include "body/Preloader.php";
    ?>
    <!-- End Preloader -->
    <?php
    include "body/topbar.php";
    ?>
    <!-- Header 
    ============================================= -->
    
    <!-- End Header -->

    <?php

    include "pages/".$page.".php";

    ?>
    <!-- Start Footer 
    ============================================= -->
    <?php
    include "body/footer.php";
    ?>
    <!-- End Footer -->
    
    <!-- jQuery Frameworks
    ============================================= -->
    <script src="assets/js/jquery-3.6.0.min.js"></script>
    <script src="assets/js/popper.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/js/jquery.appear.js"></script>
    <script src="assets/js/jquery.easing.min.js"></script>
    <script src="assets/js/jquery.magnific-popup.min.js"></script>
    <script src="assets/js/modernizr.custom.13711.js"></script>
    <script src="assets/js/owl.carousel.min.js"></script>
    <script src="assets/js/wow.min.js"></script>
    <script src="assets/js/progress-bar.min.js"></script>
    <script src="assets/js/isotope.pkgd.min.js"></script>
    <script src="assets/js/imagesloaded.pkgd.min.js"></script>
    <script src="assets/js/count-to.js"></script>
    <script src="assets/js/YTPlayer.min.js"></script>
    <script src="assets/js/bootsnav.js"></script>
    <script src="assets/js/Chart.min.js"></script>
    <script src="assets/js/custom-chart.js"></script>
    <script src="assets/js/main.js"></script>
    <script src=" https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/js/all.min.js"></script>
   
</body>
</html>