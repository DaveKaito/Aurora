<?php
require_once '../../init.php';
include SHARED_ROOT . '/pub_header.php';
include SHARED_ROOT . '/links.php';
?>

    <div class="view"
        style="background-image: url('../../../assets/img/water.jpg'); background-repeat: no-repeat; background-size: cover;">
        <div class="mask rgba-black-light d-flex justify-content-center align-items-center">
            <div class="register-container  container p-5" style="max-width: 600px;">
          
                    <form class="form-signin  mx-auto" method="post" id="register_form">
                        <h2 class="form-signin-heading text-center pb-5">Signup</h2>
                        <div id="msg">
                        </div>
                        <div class="form-group pb-2">
                            <input type="text" class="form-control" placeholder="Username" name="username"
                                id="username" />
                        </div>
                        <div class="form-group pb-2">
                            <input type="email" class="form-control" placeholder="Email address" name="email"
                                id="email" />
                            <span id="check-e"></span>
                        </div>
                        <div class="form-group pb-2">
                            <input type="password" class="form-control" placeholder="Password" name="password"
                                id="password" />
                        </div>
                        <div class="form-group pb-5">
                            <input type="password" class="form-control" placeholder="Retype Password" name="cpassword"
                                id="cpassword" />
                        </div>
                        <div class="form-group d-flex justify-content-center">
                            <button type="submit" class="btn btn-orange" name="btn-save" id="btn-submit">
                                Create Account
                            </button>
                        </div>
                        <a class="text-center" href="login.php">
                        <p>Already have an Account?</p>
                    </a>
                    </form>
                    
                </div>
            </div>
        </div>
</body>
<script type="text/javascript" src="<?php echo MDB_ROOT; ?>/js/jquery-3.4.0.min.js"></script>
<!-- Bootstrap tooltips -->

<!-- Bootstrap core JavaScript -->
<script type="text/javascript" src="<?php echo MDB_ROOT; ?>/js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.min.js"></script>
<script src="<?php echo FUNC_ROOT; ?>/register.js"></script>

</html>