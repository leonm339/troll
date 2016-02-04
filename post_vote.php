<?php
    include_once 'session.php';
    include_once 'database.php';
    //za pravilno preusmerjanje
    //ker kličemo to z dveh različnih strani
    $redirect = explode("/", $_SERVER['HTTP_REFERER']);
    $reffer_url = end($redirect);
    
    if (empty($reffer_url)) {
        $reffer_url = 'index.php';
    }
    
    $post_id = (int) $_GET['post_id'];
    $vote = (int) $_GET['vote'];
    
    $up = 1;
    $down = 0;    
    if ($vote == 0) {
       $up = 0;
       $down = 1; 
    }
    
    $query = "UPDATE posts SET upvote = upvote + $up,
                               downvote = downvote + $down 
              WHERE id = $post_id";
    
    mysqli_query($link, $query);
    
    header("Location: $reffer_url");
?>