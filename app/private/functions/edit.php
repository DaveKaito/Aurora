!!!THIS DOES NOT WORK AND IS NOT INCLUDED/LINKED IN ANY WAY!!!
i wanted to make the pages editable, but with this configuration including a WYSIWYG-Editor it seems impossible 
:( 
<?php
require_once '../../init.php';
include SHARED_ROOT . '/pub_header.php';
if (isset($_SESSION['admin_id'])) {
    // check if admin
} else {
    //send back to landing
    header('location:' . PAGES_ROOT . '/index.php');
}
function readContent($contentFile)
{
    $arr = file($contentFile);
    $content = "";
    foreach ($arr as $out) {
        $content .= $out;
    }
    return $content;
}
$sql = "SELECT * FROM blog";
$result = mysqli_query($conn, $sql) or die("database error:" . mysqli_error($conn));
$row = mysqli_fetch_assoc($result);
$title = $row['title'];
$uBlog = '../articles/' . $title . '.txt';
$output = readContent($uBlog);
//submit new data
if (!empty($_POST)) {
    $id = $_POST['id'];
    $title = $_POST['title'];
    $creator = $_POST['creator'];
    $sql = "UPDATE blog SET  title=$title, creator =$creator WHERE id=$id";
    $resultset = mysqli_query($conn, $sql) or die("database error:" . mysqli_error($conn));
    if (isset($_POST['update'])) {
        $content = $_POST['content'];
        writeContent($uBlog);
    }
    header('location:' . PRIV_ROOT . '/dashboard.php');
}

?>
<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/jodit/3.1.92/jodit.min.css">
<script src="//cdnjs.cloudflare.com/ajax/libs/jodit/3.1.92/jodit.min.js"></script>
<style>
body {
    padding-top: 10vh;
}

h1,
label {
    color: white;
}
</style>
<div class="add_content container p-5">
    <!-- Default form login -->
    <form class=" p-5" method="post" action="edit.php">

        <h1 class="mb-4 text-center">Edit Content</h1>

        <label for="title">Title</label>
        <input type="text" name="title" class="form-control mb-4" value="<?php echo e($row['title']) ?>">

        <label for="Creator">Creator</label>
        <input type="text" name="creator" class="form-control mb-4" value="<?php echo e($row['creator']) ?>">

        <label for="textarea">Content</label>
        <textarea id="editor" name="content" value="">
        <?php echo $output ?>
        </textarea>

        <!-- Sign in button -->
        <input type="hidden" name="id" value="">
        <button class="btn btn-info btn-block my-4 w-50 mx-auto" type="submit" name="update">EDIT</button>

    </form>
    <!-- Default form login -->
</div>
<script>
var editor = new Jodit('#editor');
editor.value = '';
</script>
<?php include SHARED_ROOT . '/pub_footer.php';?>