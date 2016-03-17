<?php
include_once 'header.php';
include_once 'database.php';
//phpinfo();
?>

<div class="tabs">
    <ul class="tab-links">
        <li>
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
    </ul>
   
    <div class="tab-content">
        <div id="tab2" class="tab">
            <?php
            $userup = 0;
            $queryu = "SELECT id FROM  users";

            
            $resultu = mysqli_query($link, $queryu);
            while ($rows = mysqli_fetch_array($resultu)) {

                $query = "SELECT p.upvote FROM posts p INNER JOIN users u ON p.user_id=u.id WHERE u.id=".$rows['id'];

                $result = mysqli_query($link, $query);
                while ($row = mysqli_fetch_array($result)) 
                {
                   $userup = $userup + $row['upvote'];
                }
                /*
               echo $userup." -lajkov od userja i id-jem: ". $rows['id']."</br>";
                 */
                $ab = $rows['id'];
                $up = "UPDATE users SET usersupvote = $userup
			  WHERE id=$ab";
                mysqli_query($link, $up);
                $userup = 0; 
            }

           
            $query = "SELECT * FROM users u ORDER BY u.usersupvote DESC";

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
                    $grav_url = "http://www.gravatar.com/avatar/" . md5(strtolower(trim($email))) . "?d=" . "&s=" . $size;
                    ?>
                    <img src="<?php echo $grav_url; ?>" alt="" />
                </div>
                <?php
            }
            ?>
        </div>

        <div id="tab3" class="tab">
               <?php
            $usedown = 0;
            $queryd = "SELECT id FROM  users";

            
            $resultd = mysqli_query($link, $queryd);
            while ($rows = mysqli_fetch_array($resultd)) {

                $query = "SELECT* FROM posts p INNER JOIN users u ON p.user_id=u.id WHERE u.id=".$rows['id'];

                $result = mysqli_query($link, $query);
                while ($row = mysqli_fetch_array($result)) 
                {
                   $usedown = $usedown + $row['downvote'];
                }
                /*
               echo $usedown." -dislajkov od userja i id-jem: ". $rows['id']."</br>";
               */
                
                $ab = $rows['id'];
                $dow = "UPDATE users SET usersdownvote = $usedown
			  WHERE id=$ab";
                mysqli_query($link, $dow);
                $usedown = 0; 
            }
            
            $query = "SELECT * FROM users u ORDER BY u.usersdownvote DESC";

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
                    $grav_url = "http://www.gravatar.com/avatar/" . md5(strtolower(trim($email))) . "?d=" . "&s=" . $size;
                    ?>
                    <img src="<?php echo $grav_url; ?>" alt="" />
                </div>
                <?php
            }
            ?>
               
        </div>

        <div id="TopTeden" >
                <?php
            $userup = 0;
            $queryu = "SELECT id FROM  users";

            
            $resultu = mysqli_query($link, $queryu);
            while ($rows = mysqli_fetch_array($resultu)) {

                $query = "SELECT* FROM posts p INNER JOIN users u ON p.user_id=u.id WHERE (u.id=".$rows['id'].") AND (p.date_add>= curdate() - INTERVAL DAYOFWEEK(curdate())+6 DAY)";

                $result = mysqli_query($link, $query);
                while ($row = mysqli_fetch_array($result)) 
                {
                   $userup = $userup + $row['upvote'];
                }
                /*
               echo $userup." -lajkov od userja i id-jem: ". $rows['id']."</br>";
               */
                $ab = $rows['id'];
                $up = "UPDATE users SET usersupvote = $userup
			  WHERE id=$ab";
                mysqli_query($link, $up);
                $userup = 0; 
            }
            
            $query = "SELECT * FROM users u ORDER BY u.usersupvote DESC";

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
                    $grav_url = "http://www.gravatar.com/avatar/" . md5(strtolower(trim($email))) . "?d=" . "&s=" . $size;
                    ?>
                    <img src="<?php echo $grav_url; ?>" alt="" />
                </div>
                <?php
            }
            ?>
        </div>

        <div id="tab4" class="tab">
            <?php
            $query = "SELECT p.*, u.username , u.email
              FROM posts p INNER JOIN users u ON p.user_id=u.id
              WHERE p.user_id = " . $_SESSION['user_id'] . "
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
                    $grav_url = "http://www.gravatar.com/avatar/" . md5(strtolower(trim($email))) . "?d=" . "&s=" . $size;
                    ?>
                    <img src="<?php echo $grav_url; ?>" alt="" />


                    <br />
                </div>
                <?php
            }
            ?>
        </div>
        
        <div id="TopMesec">
            <?php
            $userup = 0;
            $queryu = "SELECT id FROM  users";

            
            $resultu = mysqli_query($link, $queryu);
            while ($rows = mysqli_fetch_array($resultu)) {

                $query = "SELECT* FROM posts p INNER JOIN users u ON p.user_id=u.id WHERE (u.id=".$rows['id'].") AND (p.date_add>= curdate() - INTERVAL DAYOFWEEK(curdate())+30 DAY)";

                $result = mysqli_query($link, $query);
                while ($row = mysqli_fetch_array($result)) 
                {
                   $userup = $userup + $row['upvote'];
                }
                /*
               echo $userup." -lajkov od userja i id-jem: ". $rows['id']."</br>";
               */
                $ab = $rows['id'];
                $up = "UPDATE users SET usersupvote = $userup
			  WHERE id=$ab";
                mysqli_query($link, $up);
                $userup = 0; 
            }
            
            $query = "SELECT * FROM users u ORDER BY u.usersupvote DESC";

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
                    $grav_url = "http://www.gravatar.com/avatar/" . md5(strtolower(trim($email))) . "?d=" . "&s=" . $size;
                    ?>
                    <img src="<?php echo $grav_url; ?>" alt="" />
                </div>
                <?php
            }
            ?>
        </div>

        <div id="tab4" class="tab">
            <?php
            $query = "SELECT p.*, u.username , u.email
              FROM posts p INNER JOIN users u ON p.user_id=u.id
              WHERE p.user_id = " . $_SESSION['user_id'] . "
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
                    $grav_url = "http://www.gravatar.com/avatar/" . md5(strtolower(trim($email))) . "?d=" . "&s=" . $size;
                    ?>
                    <img src="<?php echo $grav_url; ?>" alt="" />


                    <br />
                </div>
                <?php
            }
            ?>

        </div>

        <div id="TopLeto">
            <?php
            $userup = 0;
            $queryu = "SELECT id FROM  users";

            
            $resultu = mysqli_query($link, $queryu);
            while ($rows = mysqli_fetch_array($resultu)) {

                $query = "SELECT* FROM posts p INNER JOIN users u ON p.user_id=u.id WHERE (u.id=".$rows['id'].") AND (p.date_add>= curdate() - INTERVAL DAYOFWEEK(curdate())+365 DAY)";

                $result = mysqli_query($link, $query);
                while ($row = mysqli_fetch_array($result)) 
                {
                   $userup = $userup + $row['upvote'];
                }
                /*
               echo $userup." -lajkov od userja i id-jem: ". $rows['id']."</br>";
               */
                $ab = $rows['id'];
                $up = "UPDATE users SET usersupvote = $userup
			  WHERE id=$ab";
                mysqli_query($link, $up);
                $userup = 0; 
            }
            
            $query = "SELECT * FROM users u ORDER BY u.usersupvote DESC";

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
                    $grav_url = "http://www.gravatar.com/avatar/" . md5(strtolower(trim($email))) . "?d=" . "&s=" . $size;
                    ?>
                    <img src="<?php echo $grav_url; ?>" alt="" />
                </div>
                <?php
            }
            ?>
        </div>

        <div id="tab4" class="tab">
            <?php
            $query = "SELECT p.*, u.username , u.email
              FROM posts p INNER JOIN users u ON p.user_id=u.id
              WHERE p.user_id = " . $_SESSION['user_id'] . "
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
                    $grav_url = "http://www.gravatar.com/avatar/" . md5(strtolower(trim($email))) . "?d=" . "&s=" . $size;
                    ?>
                    <img src="<?php echo $grav_url; ?>" alt="" />


                    <br />
                </div>
                <?php
            }
            ?>
        </div>


        <div id="WorstTeden">
              <?php
            $usedown = 0;
            $queryd = "SELECT id FROM  users";

            
            $resultd = mysqli_query($link, $queryd);
            while ($rows = mysqli_fetch_array($resultd)) {

                $query = "SELECT* FROM posts p INNER JOIN users u ON p.user_id=u.id WHERE (u.id=".$rows['id'].") AND (p.date_add>= curdate() - INTERVAL DAYOFWEEK(curdate())+6 DAY)";

                $result = mysqli_query($link, $query);
                while ($row = mysqli_fetch_array($result)) 
                {
                   $usedown = $usedown + $row['downvote'];
                }
                /*
               echo $usedown." -dislajkov od userja i id-jem: ". $rows['id']."</br>";
               */
                $ab = $rows['id'];
                $dow = "UPDATE users SET usersdownvote = $usedown
			  WHERE id=$ab";
                mysqli_query($link, $dow);
                $usedown = 0; 
            }
            
            $query = "SELECT * FROM users u ORDER BY u.usersdownvote DESC";

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
                    $grav_url = "http://www.gravatar.com/avatar/" . md5(strtolower(trim($email))) . "?d=" . "&s=" . $size;
                    ?>
                    <img src="<?php echo $grav_url; ?>" alt="" />
                </div>
                <?php
            }
            ?>
           
        </div>

        <div id="WorstMesec">
              <?php
            $usedown = 0;
            $queryd = "SELECT id FROM  users";

            
            $resultd = mysqli_query($link, $queryd);
            while ($rows = mysqli_fetch_array($resultd)) {

                $query = "SELECT* FROM posts p INNER JOIN users u ON p.user_id=u.id WHERE (u.id=".$rows['id'].") AND (p.date_add>= curdate() - INTERVAL DAYOFWEEK(curdate())+30 DAY)";

                $result = mysqli_query($link, $query);
                while ($row = mysqli_fetch_array($result)) 
                {
                   $usedown = $usedown + $row['downvote'];
                }
                /*
               echo $usedown." -dislajkov od userja i id-jem: ". $rows['id']."</br>";
               */
                $ab = $rows['id'];
                $dow = "UPDATE users SET usersdownvote = $usedown
			  WHERE id=$ab";
                mysqli_query($link, $dow);
                $usedown = 0; 
            }
            
            $query = "SELECT * FROM users u ORDER BY u.usersdownvote DESC";

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
                    $grav_url = "http://www.gravatar.com/avatar/" . md5(strtolower(trim($email))) . "?d=" . "&s=" . $size;
                    ?>
                    <img src="<?php echo $grav_url; ?>" alt="" />
                </div>
                <?php
            }
            ?>
          
        </div>

        <div id="WorstLeto">
              <?php
            $usedown = 0;
            $queryd = "SELECT id FROM  users";

            
            $resultd = mysqli_query($link, $queryd);
            while ($rows = mysqli_fetch_array($resultd)) {

                $query = "SELECT* FROM posts p INNER JOIN users u ON p.user_id=u.id WHERE (u.id=".$rows['id'].") AND (p.date_add>= curdate() - INTERVAL DAYOFWEEK(curdate())+365 DAY)";

                $result = mysqli_query($link, $query);
                while ($row = mysqli_fetch_array($result)) 
                {
                   $usedown = $usedown + $row['downvote'];
                }
                /*
               echo $usedown." -dislajkov od userja i id-jem: ". $rows['id']."</br>";
               */
                $ab = $rows['id'];
                $dow = "UPDATE users SET usersdownvote = $usedown
			  WHERE id=$ab";
                mysqli_query($link, $dow);
                $usedown = 0; 
            }
            
            $query = "SELECT * FROM users u ORDER BY u.usersdownvote DESC";

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
                    $grav_url = "http://www.gravatar.com/avatar/" . md5(strtolower(trim($email))) . "?d=" . "&s=" . $size;
                    ?>
                    <img src="<?php echo $grav_url; ?>" alt="" />
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