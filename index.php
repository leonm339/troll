<?php
include_once 'header.php';
include_once 'database.php';
//phpinfo();
?>
<div class="tabs">
    <ul class="tab-links">
        <li class="active"><a href="#tab1">New</a></li>
        <li><div class="dropdown">
            <button class="dropbtn"><a href="#tab2">Top</a></button>
            <div class="dropdown-content">
            <a href="#tab21">Teden</a>
            <a href="#tab22">Mesec</a>
            <a href="#tab23">Leto</a>
            <a href="#tab24">Vse</a>
        </div></li>
        <li><div class="dropdown">
            <button class="dropbtn"><a href="#tab3">Worst</a></button>
            <div class="dropdown-content">
            <a href="#tab31">Teden</a>
            <a href="#tab32">Mesec</a>
            <a href="#tab33">Leto</a>
            <a href="#tab34">Vse</a>
        </div></li>
        <li>        <div class="dropdown">
            <button class="dropbtn"><a href="#tab4">My</a></button>
            <div class="dropdown-content">
            <a href="#tab41">Teden</a>
            <a href="#tab42">Mesec</a>
            <a href="#tab43">Leto</a>
            <a href="#tab44">Vse</a>
        </div></li>
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
            <div id="tab21" class="tab">
            <?php
            $query = "SELECT p.*, u.username 
              FROM posts p INNER JOIN users u ON p.user_id=u.id
              WHERE (p.user_id = ".$_SESSION['user_id'].") AND (p.date_add > DATEADD(day,-7,NOW()) 
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