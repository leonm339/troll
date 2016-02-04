<?php
    include_once 'session.php';
    include_once 'database.php';

    //sprejmem podatke s prejšnje strani
    $username = $_POST['username'];    
    $pass = $_POST['pass'];
    //geslo zakodiram s salt
    $pass = sha1($db_salt.$pass);
    
    $query = sprintf("SELECT * FROM users 
                      WHERE username = '%s' AND pass = '%s'",
                mysqli_real_escape_string($link, $username),
                mysqli_real_escape_string($link, $pass));
    //v result si shranim rezultat SELECT stavka, 
    //ki ga pošljem nad bazo
    $result = mysqli_query($link, $query);
    //preverim, če je le en takšen uporabnik
    if (mysqli_num_rows($result) != 1) {
        //napaka
        header("Location: login.php");
        die();
    }
    else {
        //vse je ok
        $user = mysqli_fetch_array($result);
        $_SESSION['user_id'] = $user['id'];
        $_SESSION['username'] = $user['username'];
        header("Location: index.php");
        die();
    }
    
?>