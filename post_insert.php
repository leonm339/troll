<?php

include_once 'database.php';
include_once 'session.php';

$title = $_POST['title'];
$tags = $_POST['tags'];

//skripta iz W3Schools
$maxsize = 5000000000;
$allowedExts = array("gif", "jpeg", "jpg", "png");
//razbije ime datoteke, ki jo naložiš - deli jo glede na "."
$temp = explode(".", $_FILES["file"]["name"]);
$extension = end($temp);
if ((($_FILES["file"]["type"] == "image/gif")
        || ($_FILES["file"]["type"] == "image/jpeg")
        || ($_FILES["file"]["type"] == "image/jpg")
        || ($_FILES["file"]["type"] == "image/pjpeg")
        || ($_FILES["file"]["type"] == "image/x-png")
        || ($_FILES["file"]["type"] == "image/png"))
        && ($_FILES["file"]["size"] < $maxsize)
        && in_array($extension, $allowedExts)) {

    $newName = date("Ymdhisu") . '-' . $_FILES["file"]["name"];
    move_uploaded_file($_FILES["file"]["tmp_name"], "upload/" . $newName);
    $url = 'upload/' . $newName;
    //uspešno smo naložili sliko
    //zapis v bazo
    $query = sprintf("INSERT INTO posts(user_id, title, url, tags) 
        VALUES (%s,'%s','%s', '%s')", mysqli_real_escape_string($link, $_SESSION['user_id']), mysqli_real_escape_string($link, $title), mysqli_real_escape_string($link, $url), mysqli_real_escape_string($link, $tags));

    mysqli_query($link, $query);
    //shrani si zadnji id, ki je bil dodan v bazo
    $id = mysqli_insert_id($link);
    header("Location: post.php?id=$id");
} else {
    header("Location: post_add.php");
}
?>