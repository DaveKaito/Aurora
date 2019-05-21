<?php require_once '../../private/shared/initialize.php';

session_start();

// if ($_SERVER['REQUEST_METHOD'] == 'POST') {
//     if (isset($_POST['login'])) {
//         require '../../private/shared/login.php';
//     } elseif (isset($_POST['signup'])) {
//         require '../../private/shared/signup.php';
//     }
// }
?>
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

</head>

<body>
    <div class="view login_bg"
        style="background-image: url('../../assets/img/water.jpg'); background-repeat: no-repeat; background-size: cover;">
        <div class="mask rgba-black-light d-flex  align-items-center">
            <div class="container p-5 d-flex justify-content-center ">

                <div class=" card rounded text-white shadow elegant-color-dark ">
                    <div class=" card-header ">
                        <ul class=" nav nav-pills mb-3 " id=" pills-tab" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active text-white" id="login-tab" data-toggle="pill" href="#login"
                                    role="tab" aria-controls="login" aria-selected="true">Login</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link text-white" id="sign-tab" data-toggle="pill" href="#sign" role="tab"
                                    aria-controls="sign" aria-selected="false">Sign Up</a>
                            </li>
                        </ul>
                        <div class="tab-content d-flex flex-column" id="pills-tabContent">
                            <p class="h4 text-center mt-4">Welcome to Aurora!</p>

                            <div class="card-body p-0 tab-pane fade show active" id="login" role="tabpanel"
                                aria-labelledby="login-tab">
                                <!--form login -->

                                <form method="post" class="text-center p-3" novalidate>

                                    <p class="h5 mb-4">Login</p>

                                    <!-- Email -->
                                    <input type="email" autocomplete="off" id="defaultLoginFormEmail"
                                        class="form-control mb-4" placeholder="E-mail" name="email">

                                    <!-- Password -->
                                    <input type="password" id="" name="password" class="form-control  mb-4"
                                        placeholder="Password">

                                    <div class="login_error">

                                    </div>

                                    <!-- Sign in button -->
                                    <button class="btn btn-orange rounded  btn-block my-4" name="login">Sign
                                        in</button>
                                </form>
                            </div>
                            <div class="card-body p-0 tab-pane fade" id="sign" role="tabpanel"
                                aria-labelledby="sign-tab">
                                <!-- form sign up -->
                                <form class="text-center p-3" method="post">

                                    <p class="h5 mb-4">Sign Up</p>
                                    <!-- Username -->
                                    <input type="text" id="username" name="username" class="form-control mb-4"
                                        placeholder="Username">

                                    <!-- Email -->
                                    <input type="email" id="email" name="email" class="form-control mb-4"
                                        placeholder="E-mail">

                                    <!-- Password -->
                                    <input type="password" id="" name="password" class="form-control mb-4"
                                        placeholder="Password">

                                    <div class="card_footer sign_error">

                                    </div>

                                    <!-- Sign in button -->
                                    <button class="btn btn-orange rounded signup btn-block my-4" name="signup"
                                        id="sumbit">Sign
                                        Up</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
</body>
<script type="text/javascript" src="../../assets/mdb/js/jquery-3.4.0.min.js"></script>
<!-- Bootstrap tooltips -->
<script type="text/javascript" src="../../assets/mdb/js/popper.min.js"></script>
<!-- Bootstrap core JavaScript -->
<script type="text/javascript" src="../../assets/mdb/js/bootstrap.min.js"></script>

<script type="text/javascript">
$(document).ready(function() {


    $('#submit').click(function(e) {
        e.preventDefault();


        var username = $("#username").val();
        var email = $("#email").val();

        $.ajax({
            type: "POST",
            url: "../../private/shared/signup.php",
            dataType: "json",
            data: {
                username: username,
                email: email,
            },
            success: function(data) {
                if (data.code == "200") {
                    alert("Success: " + data.msg);
                } else {
                    $(".display-error").html("<ul>" + data.msg + "</ul>");
                    $(".display-error").css("display", "block");
                }
            }
        });


    });
});
</script>

</html>