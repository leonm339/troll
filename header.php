<?php
include_once 'session.php';
?>
<!DOCTYPE HTML>
<!--
        Halcyonic 3.1 by HTML5 UP
        html5up.net | @n33co
        Free for personal and commercial use under the CCA 3.0 license (html5up.net/license)
-->
<html>
    <head>
        <title>Troll</title>
        <meta http-equiv="content-type" content="text/html; charset=utf-8" />
        <meta name="description" content="" />
        <meta name="keywords" content="" />
        <script src="js/jquery.min.js"></script>
        <script src="js/config.js"></script>
        <script src="js/skel.min.js"></script>
        <script src="js/skel-panels.min.js"></script>
        <script>
            $(document).ready(function() {
                $('.tabs .tab-links a').on('click', function(e)  {
                    var currentAttrValue = $(this).attr('href');
 
                    // Show/Hide Tabs
                    $('.tabs ' + currentAttrValue).show().siblings().hide();
 
                    // Change/remove current tab to active
                    $(this).parent('li').addClass('active').siblings().removeClass('active');
 
                    e.preventDefault();
                });
            });
            setTimeout(function() {
                $('#errorMsg').fadeOut('fast');
            }, 3000);
        </script>
        <noscript>
        <link rel="stylesheet" href="css/skel-noscript.css" />
        <link rel="stylesheet" href="css/style.css" />
        <link rel="stylesheet" href="css/style-desktop.css" />
        </noscript>
        <!--[if lte IE 9]><link rel="stylesheet" href="css/ie9.css" /><![endif]-->
        <!--[if lte IE 8]><script src="js/html5shiv.js"></script><![endif]-->
    </head>
    <body class="subpage">

        <!-- Header -->
        <div id="header-wrapper">
            <header id="header" class="container">
                <div class="row">
                    <div class="12u">

                        <!-- Logo -->
                        <h1><a href="#" id="logo">Troll</a></h1>

                        <!-- Nav -->
                        <nav id="nav">
                            <?php
                            if (isset($_SESSION['user_id'])) {
                                ?>
                                <a href="index.php">Home</a>
                                <a href="post_add.php">Add Troll</a>
                                <a href="logout.php">Logout</a>
                                <?php
                            } else {
                                ?>
                                <a href="login.php">Login</a>
                                <a href="registration.php">Register</a>
                                <?php
                            }
                            ?>
                        </nav>

                    </div>
                </div>
            </header>
        </div>

        <!-- Content -->
        <div id="content-wrapper">
            <div id="content">
                <div class="container">
                    <div class="row">
                        <div class="3u">

                            <!-- Sidebar -->
                            <section>
                                <header>
                                    <h2>Magna Phasellus</h2>
                                </header>
                                <ul class="link-list">
                                    <li><a href="#">Sed dolore viverra</a></li>
                                    <li><a href="#">Ligula non varius</a></li>
                                    <li><a href="#">Nec sociis natoque</a></li>
                                    <li><a href="#">Penatibus et magnis</a></li>
                                    <li><a href="#">Dis parturient montes</a></li>
                                    <li><a href="#">Nascetur ridiculus</a></li>
                                </ul>
                            </section>
                            <section>
                                <header>
                                    <h2>Ipsum Dolor</h2>
                                </header>
                                <p>
                                    Vehicula fermentum ligula at pretium. Suspendisse semper iaculis eros, eu aliquam 
                                    iaculis. Phasellus ultrices diam sit amet orci lacinia sed consequat. 							
                                </p>
                                <ul class="link-list">
                                    <li><a href="#">Sed dolore viverra</a></li>
                                    <li><a href="#">Ligula non varius</a></li>
                                    <li><a href="#">Dis parturient montes</a></li>
                                    <li><a href="#">Nascetur ridiculus</a></li>
                                </ul>
                            </section>

                        </div>
                        <div class="9u skel-cell-important">

                            <!-- Main Content -->
                            <section>
                                <?php
                                //če imamo error v seji, ga bom izpisal
                                if (isset($_SESSION['error'])) {
                                    echo '<div id="errorMsg">' . $_SESSION['error'] . '</div>';
                                    //error iz seje izbrišem, da se ne ponovi več
                                    unset($_SESSION['error']);
                                }
                                ?>