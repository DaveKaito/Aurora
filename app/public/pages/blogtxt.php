<?php
session_start();
require_once '../../init.php';
include SHARED_ROOT . '/pub_header.php';
include SHARED_ROOT . '/links.php';
include SHARED_ROOT . '/nav.php';
$did = $_GET['id'];
if (isset($_GET['id'])) {
    $sql = "SELECT * FROM blog WHERE id = '$did' ";
    $result = mysqli_query($conn, $sql) or die("database error:" . mysqli_error($conn));
    $row = mysqli_fetch_assoc($result);

    if ($row['tag'] = 'Food') {
        $tag = '<h6 class="orange-text font-weight-bold mb-3"><i class="fas fa-utensils pr-2"></i>Food</h6>';
    }elseif ($row['tag'] = 'Nature') {
        $tag = '<h6 class="green-text font-weight-bold mb-3"><i class="fas fa-tree pr-2"></i>Nature</h6>';
    }elseif ($row['tag'] = 'Photography') {
        $tag = '<h6 class="blue-text font-weight-bold mb-3"><i class="fas fa-camera-retro pr-2"></i></i>Photography</h6>';
    }

    $ctitle = $row['title'];
    $title = str_replace(' ','_',$ctitle);
    $path = file(PRIV_ROOT . "/articles/" . $title . ".txt"); 
    $arr = $path;
    $content = "";
    foreach ($arr as $out) {
    $content .= $out;
        }
    $output = $content;
}
?>
<!--Main Layout-->


<div class="maincontainer">
    <div class="container p-2">
        <div class="row">
            <div class=" mx-auto">
                <div class="view cardcon rounded h-25 z-depth-1 card card-image">
                    <img class="img-fluid " src="<?php echo e($row['imglink']) ?>" alt="Card image cap">
                </div>
                <div class="card-body w-75 mx-auto text-center elegant-color mb-5 cardtitle rounded z-depth-2">
                    <h2 class="orange-text">
                        <a><strong><?php  $ctitle = str_replace('_', ' ', $row['title']); echo e($ctitle) ?></strong></a>
                    </h2>
                    <p>Written by <a><?php echo e($row['creator']) ?></a> , <?php echo e($row['date']) ?></p>
                </div>
                <div class="excerpt mt-5 white-text">

                    <?php echo $output; ?>

                    <div class="mt-4 d-flex justify-content-end"><?php echo $tag; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!--Main Layout-->
<?php include SHARED_ROOT . '/pub_footer.php';?>