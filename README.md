
# Project Aurora Marc Ruckstuhl WBD 318

 This is a project i made while studying at SAE Zurich. We had to make a small CMS for our assignment, and this is my result.

The Page itself is something similiar to a high quality royality free image distributor like unsplash. A visitor can download the pictures he likes on the front page and a registered user can upload said pictures. The administrator can also edit and add blog entries to keep the users up to date. 

#### Quick Info
The page is based on:
 - PHP 
 - MySql
 - Material Bootstrap
 
![Page](Aurora_demo-min.gif)

## Database Design

 I decided to make 2 Databases for my Project, one for the users and one for the blog entries.

### Users

#### `id` int(11) NOT NULL,

#### `username` varchar(50) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,

#### `email` varchar(100) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,

#### `password` varchar(255) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,

#### `is_admin` tinyint(1) NOT NULL,

#### `is_user` tinyint(1) NOT NULL

| "id" | "username"   | "email"               | "password"                                                       | "is_admin" | "is_user" |
| ---- | ------------ | --------------------- | ---------------------------------------------------------------- | ---------- | --------- |
| "28" | "admin"      | "admin@admin\.com"    | "$2y$10\$dldxCvGpW3iaCL6oaPwuPeWOD06Ps40UhYI8pG7RpJxfza4wEilNO"  | "1"        | "0"       |
| "43" | "mruckstuhl" | "ophustle@gmail\.com" | "$2y$10\$fyHKEEJt5J/f9ctXHAnBqu9/zxxRqydTuKO\.0rtaldG6IcQ81b2Qe" | "0"        | "1"       |

 This is essentially a generic table. is_admin can only be changed in the db itself and there is only one admin. The user int gets assigned as soon as someone registers. With this the user can log in an access all the features.

### Blog

#### `id` int(11) NOT NULL,

#### `title` varchar(45) COLLATE latin1_bin NOT NULL,

#### `creator` varchar(45) COLLATE latin1_bin NOT NULL,

#### `date` varchar(45) COLLATE latin1_bin NOT NULL,

#### `bdesc` text COLLATE latin1_bin NOT NULL,

#### `tag` tinytext COLLATE latin1_bin NOT NULL,

#### `imglink` mediumtext COLLATE latin1_bin NOT NULL

| "id"  | "title"    | "creator" | "date"                | "bdesc" | "tag"         | "imglink"                                                                                         |
| ----- | ---------- | --------- | --------------------- | ------- | ------------- | ------------------------------------------------------------------------------------------------- |
| "144" | "About_Me" | "asdf"    | "Sun\-06\-2019 23:10" | "asdf"  | "Photography" | "https://horizon\-media\.s3\-eu\-west\-1\.amazonaws\.com/s3fs\-public/field/image/ecosystem\.jpg" |

 The Blog table works with a unique title to prevent duplicate entries. Additonally i made a date injection and a tag selection.

### Thoughts

 I couldn't code all the features i wanted, because i didn't have enough time after starting from scratch a couple of times, because i wasn't happy with what i made. The table essentially fullfilled it's purpose and fit the scale of my project.

## PHP Functions

 I had some tricky problems to tackle and i'm honestly not sure if i always took the best approach, but i guess that's part of the learning process. 

```php
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

        $content = $_POST['content'];
        $filetitle = $row['title'];
        $filename = "../articles/" . $filetitle . ".txt";

        if (!file_exists($filename)) {
            $fd = fopen($filename, "w");
            fwrite($fd, $content);
            fclose($fd);
        }
    }$redirect = PRIV_ROOT . '/dashboard.php';
if( headers_sent() ) { echo("<script>location.href='$redirect'</script>"); }
else { header("Location: $redirect"); }
exit;
}
```

 This is probably the biggest function i added. The admin can add a blogpage, if he fills out all the inputs and can add a the blog post itself into a WYSIWYG editor. If all the requirements are met, the input data gets sent to the DB and the blog itself will be saved in the articles folder. The unique title in the DB prevents duplicate posts and the str_replace function makes sure the file gets properly saved, so that it can be found by the file function.

```php
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
```

 Because all of my blogpages are "genrated" through link manipulation i had to GET the corresponding page through my URL and open a file path to the generated .txt file, and display it through a foreach loop.

```php
$sql = "SELECT * FROM blog ORDER by date DESC ";
$result = mysqli_query($conn, $sql) or die("database error:" . mysqli_error($conn));
$rows = array();
while ($row = mysqli_fetch_assoc($result)) {
$rows[] = $row;
}
if ($row['tag'] = 'Food') {
    $tag = '<h6 class="orange-text font-weight-bold mb-3"><i class="fas fa-utensils pr-2"></i>Food</h6>';
}elseif ($row['tag'] = 'Nature') {
    $tag = '<h6 class="green-text font-weight-bold mb-3"><i class="fas fa-tree pr-2"></i>Nature</h6>';
}elseif ($row['tag'] = 'Photography') {
    $tag = '<h6 class="blue-text font-weight-bold mb-3"><i class="fas fa-camera-retro pr-2"></i></i>Photography</h6>';
}
```

 This is just a quick "tag" function, that displays the correspondig tag on the webpage. Nothing fancy.

```php
foreach (glob("../pictures/" . "*.{jpg,webp,png,jpeg}", GLOB_BRACE) as $image)
{echo
'<div class="grid-item content">
    <div class="content-overlay"></div>
        <img src="' . $image . '" />
    <div class="content-details fadeIn-bottom">
    <a href="../pictures/' . $image . '"class=" btn-lg p-5" download >
        <i class="fas fa-arrow-down fa-3x tect-orange"></i>
    </a>
      </div>
</div>';}
```

I had to look all over the internet to achieve this monstrosity, which is why i wanted to include it here. Its basically just the masonry plugin / an overlay with a download button / and a foreach loop that picks the uploaded pictures from the corresponding folder.

## Final Thoughts

 This was our largest assignment to date, and i wanted to make sure that i make something that i can show of and use as a "Portfolio" thingy. I know it's not that great but overall i'm pretty happy with this Project, because i learned so much. I hope i can build some more awesome Projects.
 
 ### Thanks for checking out my project
