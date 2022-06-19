<?php include"connection.php";

session_start();
include 'connection.php';
if(isset($_POST["lougout"])){
        session_destroy();
           header("location: form.php");      
  }

  $id_gestionnaire = $_SESSION["id_gestionnaire"];
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>sidebar and navbar</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">
    
    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Heebo:wght@400;500;600;700&display=swap" rel="stylesheet">
    
    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="lib/tempusdominus/css/tempusdominus-bootstrap-4.min.css" rel="stylesheet" />

    <!-- Template Stylesheet -->
    <link href="nav.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
</head>

<body>
    <div class="container-xxl position-relative bg-white d-flex p-0">
        <!-- Spinner Start -->
        <div id="spinner" class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
            <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
                <span class="sr-only">Loading...</span>
            </div>
        </div>
        <!-- Spinner End -->


        <!-- Sidebar Start -->
        <div class="sidebar pe-4 pb-3">
            <nav class="navbar bg-light navbar-light">
             
                <div class="align-items-center ms-4 mb-4 " style="text-align: end; margin-left:20px;z-index: 1;">
                        <img src="./logo.png" alt="" style="width:85%;">
                </div>

                <div class="navbar-nav w-100">
                    <a href="index.php" class="nav-item nav-link "><i class="fa fa-tachometer-alt me-2"></i>Dashboard</a>
                    <a href="customers.php" class="nav-item nav-link"><i class="fa fa-users"></i>Customers</a>
                    <a href="stades.php" class="nav-item nav-link"><i class="fa fa-futbol"></i>Stades</a>
                    <a href="map.php" class="nav-item nav-link"><i class="fa fa-map me-2"></i>Map</a>
                    <a href="reservtable.php" class="nav-item nav-link"><i class="fa fa-calendar me-2"></i>Réservations</a>
                </div>
            </nav>
        </div>
        <!-- Sidebar End -->

        <!-- Content Start -->

        <div class="content">

        <?php
     
     if(isset($_SESSION["id_gestionnaire"]))
    
         
     ?>

            <!-- Navbar Start -->
            <nav id="navgrid" class="navbar navbar-expand bg-light navbar-light sticky-top px-4 py-0" style="height: 8%;">
               
                <a href="#" class="sidebar-toggler flex-shrink-0">
                    <i class="fa fa-bars" style="color: #020538 ;"></i>
                </a>


         <form action="" method="POST">
                <a href="#"  class="">
                  <button type="submit" name="lougout" style="border:none ;background:white;"><i class="fas fa-sign-out-alt" style="color: #020538;"></i></button>
                </a>
         </form>

            </nav>
            <!-- Navbar End -->

    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>

    <!-- js script -->
<script>
    (function ($) {
    "use strict";
    // Spinner

    var spinner = function () {
        setTimeout(function () {
            if ($('#spinner').length > 0) {
                $('#spinner').removeClass('show');
            }
        }, 1);
    };
    spinner();


        // Sidebar Toggler
    $('.sidebar-toggler').click(function () {
        $('.sidebar, .content').toggleClass("open");
        return false;
    });
  
})(jQuery);

</script>
</body>

</html>