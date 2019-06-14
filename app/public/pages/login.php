<?php
require_once '../../init.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta http-equiv="x-ua-compatible" content="ie=edge" />
    <title>Login</title>
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" />
    <!-- Bootstrap core CSS -->
    <link href="<?php echo MDB_ROOT; ?>/css/bootstrap.min.css" rel="stylesheet" />
    <!-- Material Design Bootstrap -->
    <link href="<?php echo MDB_ROOT; ?>/css/mdb.min.css" rel="stylesheet" />
    <!-- Your custom styles (optional) -->
    <link href="<?php echo MDB_ROOT; ?>/css/style.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="<?php echo ASSETS_ROOT; ?>/css/custom.css" />
    <link rel="icon" href="<?php echo ASSETS_ROOT; ?>/img/favi.ico" type="image/x-icon" />

    <style>
    h2 {
        color: white;
    }

    .container {
        background-color: #2e2e2e;
        border-radius: 15px;
    }

    input.error {
        border: 1px solid #F98181 !important;
        color: #F98181 !important;
    }

    label.error {
        border: none !important;
        color: #F98181 !important;
        margin-top: 10px !important;
    }
    </style>
</head>

<body>


    <div class="view"
        style="background-image: url('../../../assets/img/water.jpg'); background-repeat: no-repeat; background-size: cover;">
        <div class="mask rgba-black-light d-flex justify-content-center align-items-center">
            <div class="container p-5" style="max-width: 600px;">
                <div class="login_container">
                    <form class="form-login mx-auto" method="post" id="login-form">
                        <h2 class="form-login-heading text-center pb-5">Login</h2>

                        <div id="error">
                        </div>
                        <div class="form-group pb-2">
                            <input type="email" class="form-control" placeholder="Email address" name="email"
                                id="email" />
                            <span id="check-e"></span>
                        </div>
                        <div class="form-group pb-5">
                            <input type="password" class="form-control" placeholder="Password" name="password"
                                id="password" autocomplete="off" />
                        </div>

                        <div class="form-group d-flex justify-content-center">
                            <button type="submit" class="btn btn-orange" name="login_btn" id="login_btn">
                                Sign In
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
</body>
<!-- jquery -->
<script type="text/javascript" src="<?php echo MDB_ROOT; ?>/js/jquery-3.4.0.min.js"></script>
<!-- Bootstrap core JavaScript -->
<script type="text/javascript" src="<?php echo MDB_ROOT; ?>/js/bootstrap.min.js"></script>
<!-- validate jquery -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.min.js"></script>
<!-- login handling -->
<script src="<?php echo FUNC_ROOT; ?>/login.js"></script>

</html>