<?php
require_once '../../init.php';
include SHARED_ROOT . '/pub_header.php';
if (isset($_SESSION['admin_id'])) {
    // check if admin
} else {
    //send back to landing
    header('location:' . PAGES_ROOT . '/index.php');
}
$title = $creator = $bdesc = "";
if (isset($_POST['add_btn'])) {
    if (!empty($_POST['title']) && !empty($_POST['creator']) && !empty($_POST['bdesc']) && !empty($_POST['img']) && !empty($_POST['content'])) {
        $title = filter_var($_POST['title'], FILTER_SANITIZE_STRING);
        $creator = filter_var($_POST['creator'], FILTER_SANITIZE_STRING);
        $bdesc = filter_var($_POST['bdesc'], FILTER_SANITIZE_STRING);
        $imglink = filter_var($_POST['img'], FILTER_SANITIZE_URL);
        $tag = $_POST['tag'];
        $date = date("D-m-Y H:i");
        $sql = "INSERT INTO blog(`id`, `title`, `creator`, `bdesc`,`imglink`,`tag`, `date`) VALUES (NULL, '$title', '$creator','$bdesc','$imglink','$tag','$date')";
        mysqli_query($conn, $sql) or die("database error:" . mysqli_error($conn));
        header('location:' . PRIV_ROOT . '/dashboard.php');
    } else {
        $bformError = '<div class="alert alert-warning" role="alert">Please make sure to fill out all the fields!</div>';
    }
}

if (isset($_POST['add_btn'])) {
    $sql = "SELECT title FROM blog";
    $result = mysqli_query($conn, $sql) or die("database error:" . mysqli_error($conn));
    while ($row = mysqli_fetch_assoc($result)) {

// Will store the filename for fopen()
        $content = $_POST['content'];
// File name structure, taken from question context
        $filetitle = $row['title'];

// If the file does not exist, store it in $filename for writing
        if (!file_exists($filetitle)) {
            $fd = fopen("../articles/" . $filetitle . ".txt", "w");
            fwrite($fd, $content); // Change string literal to the name to write to file from either input or string literal
            fclose($fd); // Free the file descriptor
        }
    }
}

?>
<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/jodit/3.1.92/jodit.min.css">
<script src="//cdnjs.cloudflare.com/ajax/libs/jodit/3.1.92/jodit.min.js"></script>
<style>
h1,
label {
    color: white;
}
</style>
<div class="maincontainer">
    <div class="container p-5">
        <!-- Default form login -->
        <form class="blogform p-5" name="blogpost" method="post" action="add.php">

            <h1 class="mb-4 text-center">Add Content</h1>
            <?php echo $bformError; ?>
            <label for="title">Title</label>
            <input type="text" name="title" class="form-control mb-4" placeholder="Title">

            <label for="Creator">Creator</label>
            <input type="text" name="creator" class="form-control mb-4" placeholder="Creator">

            <label for="description">Description</label>
            <textarea class="form-control rounded mb-4" rows="3" name="bdesc" placeholder="Description"></textarea>

            <label for="Creator">Imagelink</label>
            <input type="text" name="img" class="form-control mb-4" placeholder="URL">

            <label for="tag">Select a Tag</label>
            <select class="browser-default custom-select mb-4" name="tag">
                <option value="Food">Food</option>
                <option value="Photography">Photography</option>
                <option value="Nature">Nature</option>
            </select>

            <label for="textarea">Content</label>
            <textarea id="editor" name="content"></textarea>

            <!-- Sign in button -->
            <button class="btn btn-orange btn-block my-4 w-50 mx-auto" type="submit" name="add_btn">Add</button>

        </form>
        <!-- Default form login -->
    </div>
</div>
<script>
var editor = new Jodit('#editor');
editor.value = '';
</script>
<?php include SHARED_ROOT . '/pub_footer.php';?>