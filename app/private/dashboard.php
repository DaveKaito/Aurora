<?php
require_once '../init.php';
include SHARED_ROOT . '/pub_header.php';
if (isset($_SESSION['admin_id'])) {
    // check if admin
} else {
    header('location: ../public/pages/index.php');
}
$sql = "SELECT * FROM blog ORDER by id ";
$result = mysqli_query($conn, $sql) or die("database error:" . mysqli_error($conn));
$rows = array();
while ($row = mysqli_fetch_assoc($result)) {
    $rows[] = $row;
}
;
?>
<style>
th,
h1,
td,
i,
a,
.add {
    color: white !important;
}
</style>
<div class="maincontainer">
    <div class="container p-5">
        <section class="my-5">
            <h1 class="text-center">Blog-Content</h1>
            <div class="add d-flex justify-content-end m-2">Add content<a href="functions/add.php"><i
                        class="fas fa-plus fa-lg ml-2"></i></a>
            </div>
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Title</th>
                        <th scope="col">Creator</th>
                        <th scope="col">Tag</th>
                        <th scope="col">Date</th>
                        <th scope="col">Delete</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (empty($rows)): ?>

                    <?php else: ?>
                    <?php foreach ($rows as $row): ?>
                    <tr>
                        <th scope="row"><?php echo $row["id"] ?></th>
                        <td>
                            <a href="<?php echo PAGES_ROOT; ?>/blogtxt.php?id=
                    <?php echo e($row['id']); ?>"> <?php echo e($row['title']); ?>
                                <a>
                        </td>
                        <td><?php echo e($row["creator"]) ?></td>
                        <td><?php echo e($row["tag"]) ?></td>
                        <td><?php echo e($row["date"]) ?></td>
                        <td>
                            <a href="<?php echo FUNC_ROOT; ?>/delete.php?id=<?php echo e($row['id']); ?>">
                                <i class="fas fa-times"></i></a>
                        </td>
                    </tr>
                    <?php endforeach;?>
                    <?php endif;?>
                    <?php ?>
                </tbody>
            </table>
        </section>
    </div>
</div>

<?php include SHARED_ROOT . '/pub_footer.php';?>