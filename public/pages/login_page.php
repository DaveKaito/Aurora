<?php require_once '../../private/shared/initialize.php';

include '../shared/pub_header_landing.php';

session_start();

?>
<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['login'])) {
        require '../../private/shared/login.php';
    } elseif (isset($_POST['signup'])) {
        require '../../private/shared/signup.php';
    }
}
?>
<script>
$(document).ready(function() {
    $("signup").click(function() {
        $("sign_error").load("../../private/shared/signup.php");
    });
});
</script>

<body>
    <div class="view login_bg"
        style="background-image: url('../../assets/img/water.jpg'); background-repeat: no-repeat; background-size: cover;">
        <div class="mask rgba-black-light d-flex justify-content-center align-items-center">
            <div class="container w-100" style="max-width: 700px">

                <div class=" card rounded text-white shadow elegant-color-dark ">
                    <div class=" card-header ">
                        <ul class=" nav nav-pills mb-3 " id=" pills-tab" role="tablist">
                            <li class="nav-item ">
                                <a class="nav-link active text-white" id="login-tab" data-toggle="pill" href="#login"
                                    role="tab" aria-controls="login" aria-selected="true">Login</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link text-white" id="sign-tab" data-toggle="pill" href="#sign" role="tab"
                                    aria-controls="sign" aria-selected="false">Sign Up</a>
                            </li>
                        </ul>
                        <div class="tab-content" id="pills-tabContent">
                            <div class="card-body tab-pane fade show active" id="login" role="tabpanel"
                                aria-labelledby="login-tab">
                                <!--form login -->
                                <form autocomplete="off" action="login_page.php" method="post" class="text-center p-5">

                                    <p class="h4 mb-4">Login</p>

                                    <!-- Email -->
                                    <input type="email" autocomplete="off" id="defaultLoginFormEmail"
                                        class="form-control mb-4" placeholder="E-mail" name="email">

                                    <!-- Password -->
                                    <input type="password" id="defaultLoginFormPassword" name="password"
                                        class="form-control mb-4" placeholder="Password">

                                    <div class="login_error">

                                    </div>

                                    <!-- Sign in button -->
                                    <button class="btn btn-orange rounded  btn-block my-4" name="login">Sign
                                        in</button>
                                </form>
                            </div>
                            <div class="card-body tab-pane fade" id="sign" role="tabpanel" aria-labelledby="sign-tab">
                                <!-- form sign up -->
                                <form autocomplete="off" class="text-center p-5" action="login_page.php" method="post">

                                    <p class="h4 mb-4">Sign Up</p>
                                    <!-- Username -->
                                    <input type="text" id="defaultLoginFormUser" name="username"
                                        class="form-control mb-4" placeholder="Username">

                                    <!-- Email -->
                                    <input type="email" id="defaultLoginFormEmail" name="email"
                                        class="form-control mb-4" placeholder="E-mail">

                                    <!-- Password -->
                                    <input type="password" id="defaultLoginFormPassword" name="password"
                                        class="form-control mb-4" placeholder="Password">

                                    <div class="sign_error">

                                    </div>

                                    <!-- Sign in button -->
                                    <button class="btn btn-orange rounded signup btn-block my-4" name="signup">Sign
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

<script src="../../assets/js/custom.js"></script>

</html>