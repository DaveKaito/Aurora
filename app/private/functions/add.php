<?php
ob_start();
session_start();
require_once '../../init.php';

include SHARED_ROOT . '/pub_header.php';
include SHARED_ROOT . '/links.php';
include SHARED_ROOT . '/nav.php';

/*This is my add script, where i check the posted data from below and add the important stuff to my db.
6 Variables get added to the db so i can use them on other files.
The content itself will not be added to the db, because i used a WYSIWYG editor.
I wanted to make "authentic" blogposts possible, which is why i did not include them in the sql query. Based on what i've read it is not really common to post blog posts to a db. IDK i just thought it would be better to do it this way.

OK so i basically just take all the content that is written in my editor and save it to a txt file. The txtfile inherits the title that is given in the form and will be saved as example.txt.

I needed to attach atleast something that would allow me to find the blog post based on a variable that is stored in the db.

 */




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
            <?php
if (!empty($_POST)) {
    if (!empty($_POST['title']) && !empty($_POST['creator']) &&! empty($_POST['bdesc']) && !empty($_POST['img']) && !empty($_POST['content'])) {
        $title = filter_var($_POST['title'], FILTER_SANITIZE_STRING);
        $ctitle = str_replace(' ', '_', $title);
        $creator = filter_var($_POST['creator'], FILTER_SANITIZE_STRING);
        $bdesc = filter_var($_POST['bdesc'], FILTER_SANITIZE_STRING);
        $imglink = filter_var($_POST['img'], FILTER_SANITIZE_URL);
        $tag = $_POST['tag'];
        $date = date("D-m-Y H:i");
        $sql = "INSERT INTO blog(`id`, `title`, `creator`, `bdesc`,`imglink`,`tag`, `date`) VALUES (NULL, '$ctitle', '$creator','$bdesc','$imglink','$tag','$date')";
        mysqli_query($conn, $sql); 
        $err = mysqli_error($conn);
        if ($err){
            echo '<div class="berror"><div class="alert alert-danger">Blog entry with this title already exsists!</div></div>';
        }
    }else{
    echo '<div class="berror"><div class="alert alert-warning">Please make sure to fill out all the fields!</div></div>';
}
}
if (!empty($_POST)) {
    $sql = "SELECT title FROM blog";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result); 
 $content = $_POST['content'];
    $filetitle = $row['title'];
    if (!file_exists($filetitle)) {
         $fd = fopen("../articles/" . $filetitle . ".txt", "w");
        fwrite($fd, $content);
        fclose($fd);
        header('location:../dashboard.php');
        exit();
        }else{
        echo '<div class="berror"><div class="alert alert-warning">Something went wrong the file could not be saved!</div></div>';
    }
    }
ob_end_flush();
?>
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