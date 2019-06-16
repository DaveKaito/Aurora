<?php
session_start();
require_once '../../init.php';
include SHARED_ROOT . '/pub_header.php';
include SHARED_ROOT . '/links.php';
include SHARED_ROOT . '/nav.php';

$sql = "SELECT * FROM blog ORDER by id ";
$result = mysqli_query($conn, $sql) or die("database error:" . mysqli_error($conn));
$rows = array();
while ($row = mysqli_fetch_assoc($result)) {
    $rows[] = $row;
}
if ($row['tag'] = 'Food') {
    $tag = '<h6 class="orange-text font-weight-bold mb-3"><i class="fas fa-utensils pr-2"></i>Food</h6>';
}if ($row['Nature'] = 'Nature') {
    $tag = '<h6 class="green-text font-weight-bold mb-3"><i class="fas fa-tree pr-2"></i>Nature</h6>';
}if ($row['Photography'] = 'Photography') {
    $tag = '<h6 class="blue-text font-weight-bold mb-3"><i class="fas fa-camera-retro pr-2"></i></i>Photography</h6>';
}
?>

<div class="maincontainer">
    <div class="container p-5">
        <!-- Section: Blog v.1 -->
        <section class="my-5">

            <!-- Section heading -->
            <h2 class="h1-responsive font-weight-bold text-center my-5">Blog</h2>
            <?php if (empty($rows)): ?>
            <?php else: ?>
            <?php foreach ($rows as $row): ?>
            <!-- Grid row -->
            <div class="row pb-5 justify-content-center">

                <!-- Grid column -->
                <div class="col-lg-5">

                    <!-- Featured image -->
                    <div class=" rounded z-depth-2 mb-lg-0 mb-4">
                        <img class="img-fluid" src="
                    <?php echo e($row['imglink']) ?>">
                    </div>

                </div>
                <!-- Grid column -->

                <!-- Grid column -->
                <div class="col-lg-3">

                    <!-- Category -->
                    <?php echo $tag; ?>
                    <!-- Post title -->
                    <h3 class="font-weight-bold mb-3"><strong><?php echo $row['title']; ?></strong></h3>
                    <!-- Excerpt -->
                    <p><?php echo $row['bdesc']; ?></p>
                    <!-- Post data -->
                    <p>by <a><strong><?php echo $row['creator']; ?></strong></a>, <?php echo $row['date']; ?></p>
                    <!-- Read more button -->
                    <a class="btn btn-success btn-md" href="blogtxt.php?id=<?php echo e($row['id']) ?>">Read more</a>

                </div>
                <!-- Grid column -->

            </div>
            <!-- Grid row -->
            <?php endforeach;?>
            <?php endif;?>
            <?php ?>
        </section>
        <!-- Section: Blog v.1 -->
    </div>
</div>
<?php
include SHARED_ROOT . '/pub_footer.php';
?>