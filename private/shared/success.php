<?php require_once 'initialize.php';

session_start(); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta http-equiv="x-ua-compatible" content="ie=edge" />
    <title>Aurora</title>
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" />
    <!-- Bootstrap core CSS -->
    <link href="../../assets/mdb/css/bootstrap.min.css" rel="stylesheet" />
    <!-- Material Design Bootstrap -->
    <link href="../../assets/mdb/css/mdb.min.css" rel="stylesheet" />
    <!-- Your custom styles (optional) -->
    <link href="../../assets/mdb/css/style.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="../../assets/css/custom.css" />

<style>
body, html {
  height: 100%;

}
.bg {
  /* The image used */
  background-image: url("../../assets/img/failure.jpg");

  /* Full height */
  height: 100%;

  /* Center and scale the image nicely */
  background-position: center;
  background-repeat: no-repeat;
  background-size: cover;
}

</style>
</head>
<body>



<div class="view bg"
        >
        <div class="mask rgba-black-light d-flex justify-content-center align-items-center">
            <div class="container w-100" style="max-width: 700px; max-height: 900px">

                <div class=" card rounded text-white shadow elegant-color-dark ">
                    <div class=" card-header ">
                        <?php 'Success'; ?>
                        <div class="tab-content " id="pills-tabContent">
                            <p>
                            <?php 
                            if (isset($_SESSION['message']) AND !empty($_SESSION['message'])):
                              echo $_SESSION['message'];
                            else:
                              header("location:../../public/pages/landing.php");
                            
                            endif;
                            ?>
                            </p>
                            
                        </div>
                    </div>
                </div>
            </div>


</body>
</html>