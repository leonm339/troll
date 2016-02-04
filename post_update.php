<?php

include_once 'database.php';
include_once 'session.php';

$title = $_POST['title'];
$tags = $_POST['tags'];
$post_id =$_POST['post_id'];
$user_id = $_SESSION['user_id'];
    
//preverim, če je prijavljeni res lastnik tega posta
$query = "SELECT * FROM posts WHERE id=$post_id AND user_id=$user_id";
$result = mysqli_query($link, $query);
//če je rezultat natanko 1 vrstica je vse ok, drugače to ni lastnik!
if (mysqli_num_rows($result) != 1) {
    //bomo vstavili še error obvestilo
    header("Location: post.php?id=$post_id");
    die();
}
$query = sprintf("
        UPDATE posts SET title='%s',tags='%s' 
        WHERE id=$post_id AND user_id=$user_id",
        mysqli_real_escape_string($link, $title),
        mysqli_real_escape_string($link, $tags));
mysqli_query($link, $query);
header("Location: post.php?id=$post_id");

?>