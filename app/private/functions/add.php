<?php
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
        <form class="blogform p-5" name="blogpost" method="POST" action="add.php">

            <h1 class="mb-4 text-center">Add Content</h1>
            <?php 
if (!empty($_POST)) {
    if (!empty($_POST['title']) && !empty($_POST['creator']) &&! empty($_POST['bdesc']) && !empty($_POST['img']) && !empty($_POST['content'])) {
        $ctitle = filter_var($_POST['title'], FILTER_SANITIZE_STRING);
        $title = str_replace(' ','_',$ctitle);
        $creator = filter_var($_POST['creator'], FILTER_SANITIZE_STRING);
        $bdesc = filter_var($_POST['bdesc'], FILTER_SANITIZE_STRING);
        $imglink = filter_var($_POST['img'], FILTER_SANITIZE_URL);
        $tag = $_POST['tag'];
        $date = date("D-m-Y H:i");
        $sql = "INSERT INTO blog(`id`, `title`, `creator`, `bdesc`,`imglink`,`tag`, `date`) VALUES (NULL, '$title', '$creator','$bdesc','$imglink','$tag','$date')";
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
    $sql = "SELECT title FROM blog ";
    $result = mysqli_query($conn, $sql) or die("database error:" . mysqli_error($conn));
    while ($row = mysqli_fetch_assoc($result)) {
// Will store the filename for fopen()
        $content = $_POST['content'];
        
// File name structure, taken from question context
        $filetitle = $row['title'];
        $filename = "../articles/" . $filetitle . ".txt";
// If the file does not exist, store it in $filename for writing
        if (!file_exists($filename)) {
            $fd = fopen($filename, "w");
            fwrite($fd, $content); // Change string literal to the name to write to file from either input or string literal
            fclose($fd); // Free the file descriptor
        }
    }$redirect = PRIV_ROOT . '/dashboard.php';
if( headers_sent() ) { echo("<script>location.href='$redirect'</script>"); }
else { header("Location: $redirect"); }
exit;
}

    

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
CKEDITOR.replace( 'content' );
</script>
<?php include SHARED_ROOT . '/pub_footer.php';?>