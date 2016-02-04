<?php
    include_once 'header.php';
    include_once 'database.php';
    
    $post_id = (int) $_GET['id'];
    
    $query = "SELECT p.*, u.username 
              FROM posts p INNER JOIN users u ON u.id=p.user_id
              WHERE p.id = $post_id";
    $result = mysqli_query($link, $query);
    //v $post si shranim vse podatke od trenutnega posta
    $post = mysqli_fetch_array($result);
?>
<div id="postTroll">
    <h2><?php echo $post['title'];?></h2>
    <h4>Dodal: <?php echo $post['username'];?> (<?php echo $post['date_add'];?>)</h4>
    <hr />
    <img src="<?php echo $post['url'];?>" width="200" alt="<?php echo $post['title'];?>" /><br />
    <a href="post_edit.php?post_id=<?php echo $post_id;?>">Edit</a>
    <a href="post_delete.php?post_id=<?php echo $post_id;?>" onclick="return confirm('Are you sure you want to delete this item?');">Delete</a>
    <br />
    <a href="post_vote.php?post_id=<?php echo $post_id;?>&vote=1">UpVote (<?php echo $post['upvote'];?>)</a> 
    <a href="post_vote.php?post_id=<?php echo $post_id;?>&vote=0">DownVote (<?php echo $post['downvote'];?>)</a>
    <hr />
    <div id="comments">
        <form action="comment_insert.php" method="POST">
            <input type="hidden" name="post_id" value="<?php echo $post_id;?>" />
            <textarea name="comment"></textarea><br />
            <input type="submit" value="Oddaj" />
        </form>
        <?php 
            //preberem vse komentarje za ta post
            $query = "SELECT c.*, u.username 
                      FROM comments c INNER JOIN users u ON u.id=c.user_id 
                      WHERE c.post_id = $post_id 
                      ORDER BY c.date_add DESC";
            $result = mysqli_query($link, $query);
            //grem čez vsak komentar
            while ($row = mysqli_fetch_array($result)) {
                echo '<div class="comment">';
                    echo $row['username'].' ('.$row['date_add'].')';
                    echo '<p>'.$row['content'].'</p>';
                echo '</div>';
            }
        ?>        
    </div>
</div>
<?php
    include_once 'footer.php';
?>