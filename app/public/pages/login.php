<?php
require_once '../../init.php';
include SHARED_ROOT . '/pub_header.php';
include SHARED_ROOT . '/links.php';
?>

<body>
    <div class="view"
        style="background-image: url('../../../assets/img/water.jpg'); background-repeat: no-repeat; background-size: cover;">
        <div class="mask rgba-black-light d-flex justify-content-center align-items-center">
            <div class="container login-container p-5" style="max-width: 600px;">

                <form class="form-login" method="post" id="login-form" >
                    <h2 class="form-login-heading text-center pb-5">Login</h2>

                    <div id="msg">
                    </div>
                    <div class="form-group pb-2">
                        <input type="email" class="form-control" placeholder="Email address" name="email" id="email" />
                        <span id="check-e"></span>
                    </div>
                    <div class="form-group pb-5">
                        <input type="password" class="form-control" placeholder="Password" name="password" id="password"
                            autocomplete="off" />
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
    <script type="text/javascript" src="<?php echo MDB_ROOT; ?>/js/jquery-3.4.0.min.js"></script>
    <!-- Bootstrap core JavaScript -->
    <script type="text/javascript" src="<?php echo MDB_ROOT; ?>/js/bootstrap.min.js"></script>
    <!-- validate jquery -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.min.js"></script>
    <!-- login handling -->
    <script src="<?php echo FUNC_ROOT; ?>/login.js"></script>
</body>
<!-- jquery -->


</html>