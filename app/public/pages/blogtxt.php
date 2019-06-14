<?php
require_once '../../init.php';
include SHARED_ROOT . '/pub_header.php';
$did = $_GET['id'];
if (isset($_GET['id'])) {
    $sql = "SELECT * FROM blog WHERE id = '$did' ";
    $result = mysqli_query($conn, $sql) or die("database error:" . mysqli_error($conn));
    $row = mysqli_fetch_assoc($result);

    if ($row['tag'] = 'Food') {
        $tag = '<h6 class="orange-text font-weight-bold mb-3"><i class="fas fa-utensils pr-2"></i>Food</h6>';
    }if ($row['Nature'] = 'Nature') {
        $tag = '<h6 class="green-text font-weight-bold mb-3"><i class="fas fa-tree pr-2"></i>Nature</h6>';
    }if ($row['Photography'] = 'Photography') {
        $tag = '<h6 class="blue-text font-weight-bold mb-3"><i class="fas fa-camera-retro pr-2"></i></i>Photography</h6>';
    }
    $title = $row['title'];
    function displayContent()
    {
        global $title;
        $arr = file(PRIV_ROOT . "/articles/" . $title . ".txt");
        $content = "";
        foreach ($arr as $out) {
            $content .= $out;
        }
        return $content;
    }
    $output = displayContent();
}
?>
<!--Main Layout-->
<style>
.cardimg {
    z-index: -999;
}

.cardtitle {
    z-index: 99;
    position: relative;
    top: -30px;
}

h2,
p {
    color: white;
}

@media (max-width: 992px) {
    .cardcon {
        height: 200px !important;
    }
}
</style>

<div class="maincontainer">
    <div class="container p-2">

        <!--Section: Blog v.4-->

        <!--Grid row-->
        <div class="row">
            <div>
                <!-- Card -->


                <!-- Card image -->
                <div class="view cardcon rounded h-25 z-depth-1 card card-image">
                    <img class="img-fluid " src="<?php echo e($row['imglink']) ?>" alt="Card image cap">
                </div>

                <!--Post data-->

                <!--Post data-->

                <div class="card-body w-75 mx-auto text-center elegant-color mb-5 cardtitle rounded z-depth-2">
                    <h2 class="orange-text"><a><strong>
                                <?php echo e($row['title']) ?></strong></a></h2>
                    <p>Written by <a><?php echo e($row['creator']) ?></a> , <?php echo e($row['date']) ?></p>
                </div>
                <!--Excerpt-->
                <div class="excerpt mt-5 white-text">

                    <?php echo $output; ?>

                    <div class="mt-4 d-flex justify-content-end">
                        <?php echo $tag; ?>
                    </div>

                </div>
            </div>
        </div>
        <!--Grid row-->


        <!--Section: Blog v.4-->
    </div>
</div>
<!--Main Layout-->
<?php include SHARED_ROOT . '/pub_footer.php';?>