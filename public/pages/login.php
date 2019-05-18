<?php require_once '../../private/initialize.php';?>

<?php include PUBLIC_PATH . '/shared/pub_header.php';?>
<style>
.navbar {
    background-color: #2e2e2e !important;
}

.nav-pills .nav-link.active {
    background-color: #F57C20;
}
</style>

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
                                <form class="text-center p-5">

                                    <p class="h4 mb-4">Login</p>

                                    <!-- Email -->
                                    <input type="email" id="defaultLoginFormEmail" class="form-control mb-4"
                                        placeholder="E-mail">

                                    <!-- Password -->
                                    <input type="password" id="defaultLoginFormPassword" class="form-control mb-4"
                                        placeholder="Password">

                                    <div class="d-flex justify-content-around">

                                    </div>

                                    <!-- Sign in button -->
                                    <button class="btn btn-orange rounded  btn-block my-4" type="submit">Sign
                                        in</button>
                                </form>
                            </div>
                            <div class="card-body tab-pane fade" id="sign" role="tabpanel" aria-labelledby="sign-tab">
                                <!-- form sign up -->
                                <form class="text-center p-5">

                                    <p class="h4 mb-4">Sign Up</p>
                                    <!-- Username -->
                                    <input type="text" id="defaultLoginFormUser" class="form-control mb-4"
                                        placeholder="Username">

                                    <!-- Email -->
                                    <input type="email" id="defaultLoginFormEmail" class="form-control mb-4"
                                        placeholder="E-mail">

                                    <!-- Password -->
                                    <input type="password" id="defaultLoginFormPassword" class="form-control mb-4"
                                        placeholder="Password">

                                    <!-- Sign in button -->
                                    <button class="btn btn-orange rounded  btn-block my-4" type="submit">Sign
                                        Up</button>
                                </form>
                            </div>
                        </div>
                    </div>
                    .


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