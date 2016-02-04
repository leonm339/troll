<?php
    include_once 'header.php';
    include_once 'database.php';
    
    $post_id = (int) $_GET['post_id'];
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
    $post = mysqli_fetch_array($result);
?>
<h1>Dodajanje trollov</h1>
<form action="post_update.php" method="post" enctype="multipart/form-data">
    <input type="hidden" name="post_id" value="<?php echo $post_id; ?>" />
    <label for="title">Naslov</label>
    <input type="text" name="title" id="title" required="required" value="<?php echo $post['title']; ?>" /><br />
    <img src="<?php echo $post['url']; ?>" alt="slika" width="200"/><br />
    <label for="url">Naloži sliko</label>
    <input type="file" name="file" id="url" disabled="disabled" /><br />
    <label for="tags">Značke slike</label>
    <input type="text" name="tags" id="tags" value="<?php echo $post['tags']; ?>" /><br />
    <input type="submit" name="submit" value="Update" />
</form>
<?php
    include_once 'footer.php';
?>