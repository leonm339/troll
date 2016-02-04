<?php
    include_once 'session.php';
    include_once 'database.php';
    //preberem vse podatke
    $post_id = $_POST['post_id'];
    $comment = $_POST['comment'];
    $user_id = $_SESSION['user_id'];
    //preverim, da ni vsebina prazna
    if (!empty($comment)) {
        $query = sprintf("INSERT INTO 
                comments(post_id, user_id, date_add, content) 
                VALUES ($post_id, $user_id, NOW(), '%s')",
                mysqli_real_escape_string($link, $comment));
        //echo $query; die();
        mysqli_query($link, $query);        
    }
    header("Location: post.php?id=$post_id");
?>