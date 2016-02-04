<?php
include_once 'header.php';
include_once 'database.php';
//phpinfo();
?>
<div class="tabs">
    <ul class="tab-links">
        <li class="active"><a href="#tab1">New</a></li>
        <li><a href="#tab2">Top</a></li>
        <li><a href="#tab3">Worst</a></li>
        <li><a href="#tab4">My</a></li>
    </ul>

    <div class="tab-content">
        <div id="tab1" class="tab active">
            <?php
            $query = "SELECT p.*, u.username 
              FROM posts p INNER JOIN users u ON p.user_id=u.id 
              ORDER BY p.date_add DESC";
            $result = mysqli_query($link, $query);
            while ($row = mysqli_fetch_array($result)) {
                ?>
                <div class="trollPicture">
                    <span class="trollUser"><?php echo $row['username']; ?></span>
                    <span class="trollDate"><?php echo $row['date_add']; ?></span>
                    <br />
                    <a href="post.php?id=<?php echo $row['id']; ?>">
                        <img src="<?php echo $row['url']; ?>" alt="<?php echo $row['title']; ?>" width="200"/>
                    </a>
                    <br />
                    <a href="post_vote.php?post_id=<?php echo $row['id']; ?>&vote=1">Upvote (<?php echo $row['upvote']; ?>)</a>
                    <a href="post_vote.php?post_id=<?php echo $row['id']; ?>&vote=0">Downvote (<?php echo $row['downvote']; ?>)</a>
                    <hr />
                </div>
                <?php
            }
            ?>
        </div>

        <div id="tab2" class="tab">
            <?php
            $query = "SELECT p.*, u.username 
              FROM posts p INNER JOIN users u ON p.user_id=u.id 
              ORDER BY p.upvote DESC";
            $result = mysqli_query($link, $query);
            while ($row = mysqli_fetch_array($result)) {
                ?>
                <div class="trollPicture">
                    <span class="trollUser"><?php echo $row['username']; ?></span>
                    <span class="trollDate"><?php echo $row['date_add']; ?></span>
                    <br />
                    <a href="post.php?id=<?php echo $row['id']; ?>">
                        <img src="<?php echo $row['url']; ?>" alt="<?php echo $row['title']; ?>" width="200"/>
                    </a>
                    <br />
                    <a href="post_vote.php?post_id=<?php echo $row['id']; ?>&vote=1">Upvote (<?php echo $row['upvote']; ?>)</a>
                    <a href="post_vote.php?post_id=<?php echo $row['id']; ?>&vote=0">Downvote (<?php echo $row['downvote']; ?>)</a>
                    <hr />
                </div>
                <?php
            }
            ?>
        </div>

        <div id="tab3" class="tab">
            <?php
            $query = "SELECT p.*, u.username 
              FROM posts p INNER JOIN users u ON p.user_id=u.id 
              ORDER BY p.downvote DESC";
            $result = mysqli_query($link, $query);
            while ($row = mysqli_fetch_array($result)) {
                ?>
                <div class="trollPicture">
                    <span class="trollUser"><?php echo $row['username']; ?></span>
                    <span class="trollDate"><?php echo $row['date_add']; ?></span>
                    <br />
                    <a href="post.php?id=<?php echo $row['id']; ?>">
                        <img src="<?php echo $row['url']; ?>" alt="<?php echo $row['title']; ?>" width="200"/>
                    </a>
                    <br />
                    <a href="post_vote.php?post_id=<?php echo $row['id']; ?>&vote=1">Upvote (<?php echo $row['upvote']; ?>)</a>
                    <a href="post_vote.php?post_id=<?php echo $row['id']; ?>&vote=0">Downvote (<?php echo $row['downvote']; ?>)</a>
                    <hr />
                </div>
                <?php
            }
            ?>
        </div>

        <div id="tab4" class="tab">
            <?php
            $query = "SELECT p.*, u.username 
              FROM posts p INNER JOIN users u ON p.user_id=u.id
              WHERE p.user_id = ".$_SESSION['user_id']."
              ORDER BY p.date_add DESC";
            $result = mysqli_query($link, $query);
            while ($row = mysqli_fetch_array($result)) {
                ?>
                <div class="trollPicture">
                    <span class="trollUser"><?php echo $row['username']; ?></span>
                    <span class="trollDate"><?php echo $row['date_add']; ?></span>
                    <br />
                    <a href="post.php?id=<?php echo $row['id']; ?>">
                        <img src="<?php echo $row['url']; ?>" alt="<?php echo $row['title']; ?>" width="200"/>
                    </a>
                    <br />
                    <a href="post_vote.php?post_id=<?php echo $row['id']; ?>&vote=1">Upvote (<?php echo $row['upvote']; ?>)</a>
                    <a href="post_vote.php?post_id=<?php echo $row['id']; ?>&vote=0">Downvote (<?php echo $row['downvote']; ?>)</a>
                    <hr />
                </div>
                <?php
            }
            ?>
        </div>
    </div>
</div>



<?php
include_once 'footer.php';
?>