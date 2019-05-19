<?php require_once '../../private/initialize.php';?>

<?php include PUBLIC_PATH . '/shared/pub_header.php';?>

<style>
input,
input[type="file"] {
    display: none;
}

.navbar {
    background-color: #2e2e2e !important;
}

.custom-file-upload {
    background-color: #ff9100;
    display: inline-block;
    cursor: pointer !important;
    height: 70px;
    line-height: 70px;
    width: 280px;
    text-align: center;
    border-radius: 20px;
    font-size: 1.5rem !important;
}
</style>
<div class="view"
    style="background-image: url('../../assets/img/upload.jpg'); background-repeat: no-repeat; background-size: cover;">
    <div class="mask rgba-black-light d-flex justify-content-center align-items-center">
        <form class="md-form">
            <div class="file-field">

                <div class="d-flex justify-content-center">

                    <label for="file-upload" class="custom-file-upload text-white">
                        <i class="fas fa-cloud-upload-alt mr-3"></i> Upload a File
                    </label>
                    <input id="file-upload" type="file" />

                </div>
            </div>
        </form>

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