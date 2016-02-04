<?php
    include_once 'session.php';
    include_once 'database.php';
    
    $post_id = (int) $_GET['post_id'];
    $user_id = $_SESSION['user_id'];
    
    //preverim, če je prijavljeni res lastnik tega posta
    $query = "SELECT * FROM posts WHERE id=$post_id AND user_id=$user_id";
    $result = mysqli_query($link, $query);
    //če je rezultat natanko 1 vrstica je vse ok, drugače to ni lastnik!
    if (mysqli_num_rows($result) != 1) {
        $_SESSION['error'] = 'Ka si prasec, pa hočeš brisat! Lep pozdrav!';
        //bomo vstavili še error obvestilo
        header("Location: post.php?id=$post_id");
        die();
    }
    //izbrišemo vse komentarje od tega posta
    $query = "DELETE FROM comments WHERE post_id=$post_id";
    mysqli_query($link, $query);
    
    //izbrišemo post
    $query = "DELETE FROM posts WHERE id=$post_id AND user_id=$user_id";
    mysqli_query($link, $query);
    header("Location: index.php");
    die();
?>