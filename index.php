<?php
include_once 'header.php';
include_once 'database.php';
//phpinfo();
?>
<div class="tabs">
    <ul class="tab-links">
        <li class="active"><a href="#tab1">New</a></li><li>
        <a href="#tab2">Top</a>
        <ul>
            <li><a href="#TopTeden">Teden</a></li>
            <li><a href="#TopMesec">Mesec</a></li>
            <li><a href="#TopLeto">Leto</a></li>
            <li><a href="#TopVse">Vse</a></li>
        </ul></li><li>
        <a href="#tab3">Worst</a>
        <ul>
            <li><a href="#WorstTeden">Teden</a></li>
            <li><a href="#WorstMesec">Mesec</a></li>
            <li><a href="#WorstLeto">Leto</a></li>
            <li><a href="#tab3">Vse</a></li>
        </ul></li><li>
        <a href="#tab4">My</a></li>
    </ul>

    <div class="tab-content">
        <div id="tab1" class="tab active">
            <?php
            $query = "SELECT p.*, u.username, u.email 
              FROM posts p INNER JOIN users u ON p.user_id=u.id 
              ORDER BY p.date_add DESC";
            $result = mysqli_query($link, $query);
            while ($row = mysqli_fetch_array($result)) {
                ?>
                <div class="trollPicture">
                    <span class="trollUser"><?php echo $row['username']; ?></span>
                   
					 <br />
	<?php
	
		
	$email = $row['email'];

//$default = "http://www.somewhere.com/homestar.jpg";
$size = 40;
	$grav_url = "http://www.gravatar.com/avatar/" . md5( strtolower( trim( $email ) ) ) . "?d=" . "&s=" . $size;?>
						<img src="<?php echo $grav_url; ?>" alt="" />
	

                    <br />
                    <a href="post.php?id=<?php echo $row['id']; ?>">
                        <img src="<?php echo $row['url']; ?>" alt="<?php echo $row['title']; ?>" width="600"/>
                    </a>
					<br />
					 <span class="trollDate"><?php echo $row['date_add']; ?></span>
                    <br />
                    <a href="post_vote.php?post_id=<?php echo $row['id']; ?>&vote=1"> <img src="http://www.olivier-follmi.net/en/_inc/gui/social/like.png"> <?php echo $row['upvote']; ?></a>
                    <a href="post_vote.php?post_id=<?php echo $row['id']; ?>&vote=0"><img src="http://media.arabaromas.com/img/dislike.png" ><?php echo $row['downvote']; ?></a>
                    <hr />
                </div>
                <?php
            }
            ?>
        </div>

        <div id="tab2" class="tab">
            <?php
            $query = "SELECT p.*, u.username , u.email
              FROM posts p INNER JOIN users u ON p.user_id=u.id 
              ORDER BY p.upvote DESC";
            $result = mysqli_query($link, $query);
            while ($row = mysqli_fetch_array($result)) {
                ?>
                <div class="trollPicture">
                    <span class="trollUser"><?php echo $row['username']; ?></span>
                  <br />
	<?php
	
		
	$email = $row['email'];

//$default = "http://www.somewhere.com/homestar.jpg";
$size = 40;
	$grav_url = "http://www.gravatar.com/avatar/" . md5( strtolower( trim( $email ) ) ) . "?d=" . "&s=" . $size;?>
						<img src="<?php echo $grav_url; ?>" alt="" />
	

                    <br />
                    <a href="post.php?id=<?php echo $row['id']; ?>">
                        <img src="<?php echo $row['url']; ?>" alt="<?php echo $row['title']; ?>" width="600"/>
                    </a>
                    <br />
					  <span class="trollDate"><?php echo $row['date_add']; ?></span>
							 <br />
                   <a href="post_vote.php?post_id=<?php echo $row['id']; ?>&vote=1"> <img src="http://www.olivier-follmi.net/en/_inc/gui/social/like.png"> <?php echo $row['upvote']; ?></a>
                    <a href="post_vote.php?post_id=<?php echo $row['id']; ?>&vote=0"><img src="http://media.arabaromas.com/img/dislike.png" ><?php echo $row['downvote']; ?></a>
                    <hr />
                </div>
                <?php
            }
            ?>
        </div>

        <div id="tab3" class="tab">
            <?php
            $query = "SELECT p.*, u.username , u.email
              FROM posts p INNER JOIN users u ON p.user_id=u.id 
              ORDER BY p.downvote DESC";
            $result = mysqli_query($link, $query);
            while ($row = mysqli_fetch_array($result)) {
                ?>
                <div class="trollPicture">
                    <span class="trollUser"><?php echo $row['username']; ?></span>
                    <br />
	<?php
	
		
	$email = $row['email'];

//$default = "http://www.somewhere.com/homestar.jpg";
$size = 40;
	$grav_url = "http://www.gravatar.com/avatar/" . md5( strtolower( trim( $email ) ) ) . "?d=" . "&s=" . $size;?>
						<img src="<?php echo $grav_url; ?>" alt="" />
	

                    <br />
                    <a href="post.php?id=<?php echo $row['id']; ?>">
                        <img src="<?php echo $row['url']; ?>" alt="<?php echo $row['title']; ?>" width="600"/>
                    </a>
                    <br />
					<span class="trollDate"><?php echo $row['date_add']; ?></span>
					 		 <br />
                    <a href="post_vote.php?post_id=<?php echo $row['id']; ?>&vote=1"> <img src="http://www.olivier-follmi.net/en/_inc/gui/social/like.png"> <?php echo $row['upvote']; ?></a>
                    <a href="post_vote.php?post_id=<?php echo $row['id']; ?>&vote=0"><img src="http://media.arabaromas.com/img/dislike.png" ><?php echo $row['downvote']; ?></a>
                    <hr />
                </div>
                <?php
            }
            ?>
        </div>

        <div id="tab4" class="tab">
            <?php
            $query = "SELECT p.*, u.username , u.email
              FROM posts p INNER JOIN users u ON p.user_id=u.id
              WHERE p.user_id = ".$_SESSION['user_id']."
              ORDER BY p.date_add DESC";
            $result = mysqli_query($link, $query);
            while ($row = mysqli_fetch_array($result)) {
                ?>
                <div class="trollPicture">
                    <span class="trollUser"><?php echo $row['username']; ?></span>

							 <br />
	<?php
	
		
	$email = $row['email'];

//$default = "http://www.somewhere.com/homestar.jpg";
$size = 40;
	$grav_url = "http://www.gravatar.com/avatar/" . md5( strtolower( trim( $email ) ) ) . "?d=" . "&s=" . $size;?>
						<img src="<?php echo $grav_url; ?>" alt="" />
	

                    <br />
                    <a href="post.php?id=<?php echo $row['id']; ?>">
                        <img src="<?php echo $row['url']; ?>" alt="<?php echo $row['title']; ?>" width="600"/>
                    </a>
                    <br />
					<span class="trollDate"><?php echo $row['date_add']; ?></span>
							 <br />
                    <a href="post_vote.php?post_id=<?php echo $row['id']; ?>&vote=1"> <img src="http://www.olivier-follmi.net/en/_inc/gui/social/like.png"> <?php echo $row['upvote']; ?></a>
                    <a href="post_vote.php?post_id=<?php echo $row['id']; ?>&vote=0"><img src="http://media.arabaromas.com/img/dislike.png" ><?php echo $row['downvote']; ?></a>
                    <hr />
                </div>
                <?php
            }
            ?>
        </div>

        <div id="TopTeden" >
            <?php
            $date = date("Ymd", strtotime("-7 days"));
            $query = "SELECT p.*, u.username , u.email
              FROM posts p INNER JOIN users u ON p.user_id=u.id 

              WHERE p.date_add >= $date
              ORDER BY p.upvote DESC";
            $result = mysqli_query($link, $query);
            while ($row = mysqli_fetch_array($result)) {
                ?>
                <div class="trollPicture">
                    <span class="trollUser"><?php echo $row['username']; ?></span>
  
							 <br />
	<?php
	
		
	$email = $row['email'];

//$default = "http://www.somewhere.com/homestar.jpg";
$size = 40;
	$grav_url = "http://www.gravatar.com/avatar/" . md5( strtolower( trim( $email ) ) ) . "?d=" . "&s=" . $size;?>
						<img src="<?php echo $grav_url; ?>" alt="" />
	

                    <br />
                    <a href="post.php?id=<?php echo $row['id']; ?>">
                        <img src="<?php echo $row['url']; ?>" alt="<?php echo $row['title']; ?>" width="600"/>
                    </a>
                    <br />
					 <span class="trollDate"><?php echo $row['date_add']; ?></span>
							 <br />
                    <a href="post_vote.php?post_id=<?php echo $row['id']; ?>&vote=1"> <img src="http://www.olivier-follmi.net/en/_inc/gui/social/like.png"> <?php echo $row['upvote']; ?></a>
                    <a href="post_vote.php?post_id=<?php echo $row['id']; ?>&vote=0"><img src="http://media.arabaromas.com/img/dislike.png" ><?php echo $row['downvote']; ?></a>
                    <hr />
                </div>
                <?php
            }
            ?>

        </div>
        <div id="TopMesec">
            <?php
            $date = date("Ymd", strtotime("-1 month"));
            $query = "SELECT p.*, u.username , u.email
              FROM posts p INNER JOIN users u ON p.user_id=u.id 

              WHERE p.date_add >= $date
              ORDER BY p.upvote DESC";
            $result = mysqli_query($link, $query);
            while ($row = mysqli_fetch_array($result)) {
                ?>
                <div class="trollPicture">
                    <span class="trollUser"><?php echo $row['username']; ?></span>
                
							 <br />
	<?php
	
		
	$email = $row['email'];

//$default = "http://www.somewhere.com/homestar.jpg";
$size = 40;
	$grav_url = "http://www.gravatar.com/avatar/" . md5( strtolower( trim( $email ) ) ) . "?d=" . "&s=" . $size;?>
						<img src="<?php echo $grav_url; ?>" alt="" />
	

                    <br />
                    <a href="post.php?id=<?php echo $row['id']; ?>">
                        <img src="<?php echo $row['url']; ?>" alt="<?php echo $row['title']; ?>" width="600"/>
                    </a>
                    <br />
					<span class="trollDate"><?php echo $row['date_add']; ?></span>
							 <br />
                   <a href="post_vote.php?post_id=<?php echo $row['id']; ?>&vote=1"> <img src="http://www.olivier-follmi.net/en/_inc/gui/social/like.png"> <?php echo $row['upvote']; ?></a>
                    <a href="post_vote.php?post_id=<?php echo $row['id']; ?>&vote=0"><img src="http://media.arabaromas.com/img/dislike.png" ><?php echo $row['downvote']; ?></a>
                    <hr />
                </div>
                <?php
            }
            ?>

        </div>

        <div id="TopLeto">
            <?php
            $date = date("Ymd", strtotime("-1 year"));
            $query = "SELECT p.*, u.username , u.email
              FROM posts p INNER JOIN users u ON p.user_id=u.id 

              WHERE p.date_add >= $date
              ORDER BY p.upvote DESC";
            $result = mysqli_query($link, $query);
            while ($row = mysqli_fetch_array($result)) {
                ?>
                <div class="trollPicture">
                    <span class="trollUser"><?php echo $row['username']; ?></span>
                   
							 <br />
	<?php
	
		
	$email = $row['email'];

//$default = "http://www.somewhere.com/homestar.jpg";
$size = 40;
	$grav_url = "http://www.gravatar.com/avatar/" . md5( strtolower( trim( $email ) ) ) . "?d=" . "&s=" . $size;?>
						<img src="<?php echo $grav_url; ?>" alt="" />
	

                    <br />
                    <a href="post.php?id=<?php echo $row['id']; ?>">
                        <img src="<?php echo $row['url']; ?>" alt="<?php echo $row['title']; ?>" width="600"/>
                    </a>
                    <br />
					<span class="trollDate"><?php echo $row['date_add']; ?></span>
							 <br />
                       <a href="post_vote.php?post_id=<?php echo $row['id']; ?>&vote=1"> <img src="http://www.olivier-follmi.net/en/_inc/gui/social/like.png"> <?php echo $row['upvote']; ?></a>
                    <a href="post_vote.php?post_id=<?php echo $row['id']; ?>&vote=0"><img src="http://media.arabaromas.com/img/dislike.png" ><?php echo $row['downvote']; ?></a>
                    <hr />
                </div>
                <?php
            }
            ?>
        </div>


        <div id="WorstTeden">
            <?php
            $date = date("Ymd", strtotime("-7 days"));
            $query = "SELECT p.*, u.username , u.email
              FROM posts p INNER JOIN users u ON p.user_id=u.id 
              WHERE p.date_add >= $date
              ORDER BY p.downvote DESC";
            $result = mysqli_query($link, $query);
            while ($row = mysqli_fetch_array($result)) {
                ?>
                <div class="trollPicture">
                    <span class="trollUser"><?php echo $row['username']; ?></span>
            
							 <br />
	<?php
	
		
	$email = $row['email'];

//$default = "http://www.somewhere.com/homestar.jpg";
$size = 40;
	$grav_url = "http://www.gravatar.com/avatar/" . md5( strtolower( trim( $email ) ) ) . "?d=" . "&s=" . $size;?>
						<img src="<?php echo $grav_url; ?>" alt="" />
	

                    <br />
                    <a href="post.php?id=<?php echo $row['id']; ?>">
                        <img src="<?php echo $row['url']; ?>" alt="<?php echo $row['title']; ?>" width="600"/>
                    </a>
					<br />
					<span class="trollDate"><?php echo $row['date_add']; ?></span>
                    <br />
                   <a href="post_vote.php?post_id=<?php echo $row['id']; ?>&vote=1"> <img src="http://www.olivier-follmi.net/en/_inc/gui/social/like.png"> <?php echo $row['upvote']; ?></a>
                    <a href="post_vote.php?post_id=<?php echo $row['id']; ?>&vote=0"><img src="http://media.arabaromas.com/img/dislike.png" ><?php echo $row['downvote']; ?></a>
                    <hr />
                </div>
                <?php
            }
            ?>
        </div>

        <div id="WorstMesec">
            <?php
            $date = date("Ymd", strtotime("-1 month"));
            $query = "SELECT p.*, u.username , u.email
              FROM posts p INNER JOIN users u ON p.user_id=u.id 
              WHERE p.date_add >= $date
              ORDER BY p.downvote DESC";
            $result = mysqli_query($link, $query);
            while ($row = mysqli_fetch_array($result)) {
                ?>
                <div class="trollPicture">
                    <span class="trollUser"><?php echo $row['username']; ?></span>
                   
							 <br />
	<?php
	
		
	$email = $row['email'];

//$default = "http://www.somewhere.com/homestar.jpg";
$size = 40;
	$grav_url = "http://www.gravatar.com/avatar/" . md5( strtolower( trim( $email ) ) ) . "?d=" . "&s=" . $size;?>
						<img src="<?php echo $grav_url; ?>" alt="" />
	

                    <br />
                    <a href="post.php?id=<?php echo $row['id']; ?>">
                        <img src="<?php echo $row['url']; ?>" alt="<?php echo $row['title']; ?>" width="600"/>
                    </a>
					
                    <br />
					 <span class="trollDate"><?php echo $row['date_add']; ?></span>
							 <br />
                 <a href="post_vote.php?post_id=<?php echo $row['id']; ?>&vote=1"> <img src="http://www.olivier-follmi.net/en/_inc/gui/social/like.png"> <?php echo $row['upvote']; ?></a>
                    <a href="post_vote.php?post_id=<?php echo $row['id']; ?>&vote=0"><img src="http://media.arabaromas.com/img/dislike.png" ><?php echo $row['downvote']; ?></a>
                    <hr />
                </div>
                <?php
            }
            ?>
        </div>

        <div id="WorstLeto">
            <?php
            $date = date("Ymd", strtotime("-1 year"));
            $query = "SELECT p.*, u.username , u.email
              FROM posts p INNER JOIN users u ON p.user_id=u.id 
              WHERE p.date_add >= $date
              ORDER BY p.downvote DESC";
            $result = mysqli_query($link, $query);
            while ($row = mysqli_fetch_array($result)) {
                ?>
                <div class="trollPicture">
                    <span class="trollUser"><?php echo $row['username']; ?></span>
                    <span class="trollDate"><?php echo $row['date_add']; ?></span>
							 <br />
	<?php
	
		
	$email = $row['email'];

//$default = "http://www.somewhere.com/homestar.jpg";
$size = 40;
	$grav_url = "http://www.gravatar.com/avatar/" . md5( strtolower( trim( $email ) ) ) . "?d=" . "&s=" . $size;?>
						<img src="<?php echo $grav_url; ?>" alt="" />
	

                    <br />
                    <a href="post.php?id=<?php echo $row['id']; ?>">
                        <img src="<?php echo $row['url']; ?>" alt="<?php echo $row['title']; ?>" width="600"/>
                    </a>
                    <br />
					 <span class="trollDate"><?php echo $row['date_add']; ?></span>
							 <br />
                      <a href="post_vote.php?post_id=<?php echo $row['id']; ?>&vote=1"> <img src="http://www.olivier-follmi.net/en/_inc/gui/social/like.png"> <?php echo $row['upvote']; ?></a>
                    <a href="post_vote.php?post_id=<?php echo $row['id']; ?>&vote=0"><img src="http://media.arabaromas.com/img/dislike.png" ><?php echo $row['downvote']; ?></a>
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