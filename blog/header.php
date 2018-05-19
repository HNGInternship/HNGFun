<<<<<<< HEAD
<?php
/*
 * @author Shahrukh Khan
 * @website http://www.thesoftwareguy.in
 * @facebook https://www.facebook.com/Thesoftwareguy7
 * @twitter https://twitter.com/thesoftwareguy7
 * @googleplus https://plus.google.com/+thesoftwareguyIn
 */
?>
<!DOCTYPE HTML>
<html>
    <head>
        <title><?php echo stripslashes($pageDetails["page_title"]); ?> - <?php echo SITE_NAME; ?> - www.thesoftwareguy.in</title>
        <link rel="icon" href="http://thesoftwareguy.in/favicon.ico" type="image/x-icon" />
        <meta http-equiv="content-type" content="text/html; charset=utf-8" />
        <meta name="description" content="<?php echo stripslashes($pageDetails["meta_desc"]); ?>" />
        <meta name="keywords" content="<?php echo stripslashes($pageDetails["meta_keywords"]); ?>" />
        <link href='http://fonts.googleapis.com/css?family=Ubuntu+Condensed' rel='stylesheet' type='text/css'>
        <script src="js/jquery.min.js"></script>
        <noscript>
        <link rel="stylesheet" href="css/skel-noscript.css" />
        <link rel="stylesheet" href="css/style.css" />
        <link rel="stylesheet" href="css/style-desktop.css" />
        </noscript>
        <!--[if lte IE 9]><link rel="stylesheet" href="css/ie9.css" /><![endif]-->
        <!--[if lte IE 8]><script src="js/html5shiv.js"></script><![endif]-->
    </head>
    <body>
        <!-- ********************************************************* -->
        <div id="header-wrapper">
            <div class="container">
                <div class="row">
                    <div class="12u">
                        <header id="header">
                            <h1><a href="<?php echo getHomeURL(); ?>" id="logo"><?php echo SITE_NAME; ?></a></h1>
                            <nav id="nav">
                                <a href="about-us.php" <?php echo ($currentPage == "about-us") ? ' class="current-page-item"' : '' ?> >About Us</a>
                                <a href="category.php" <?php echo ($currentPage == "category") ? ' class="current-page-item"' : '' ?>>Category</a>
                                <a href="contact-us.php" <?php echo ($currentPage == "contact-us") ? ' class="current-page-item"' : '' ?>>Contact US</a>
                                <a href="manage-site" target="_blank">Manage Site</a>
                            </nav>
                        </header>

                    </div>
                </div>
            </div>
        </div>
        <?php
        if ($currentPage == "index") {
            try {
                $stmt = $DB->prepare("SELECT * FROM " . TABLE_TAGLINE . " WHERE 1 LIMIT 1");
                $stmt->bindValue(":pname", $pageAlias);
                $stmt->execute();
                $details = $stmt->fetchAll();
            } catch (Exception $ex) {
                echo errorMessage($ex->getMessage());
            }
            ?>
            <div id="banner-wrapper">
                <div class="container">
                    <div class="row">
                        <div class="12u">

                            <div id="banner">
                                <h2><?php echo stripslashes($details[0]["tagline1"]); ?></h2>
                                <span><?php echo stripslashes($details[0]["tagline2"]); ?></span>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        <?php } ?>
        <div id="main">
=======
<?php
/*
 * @author Shahrukh Khan
 * @website http://www.thesoftwareguy.in
 * @facebook https://www.facebook.com/Thesoftwareguy7
 * @twitter https://twitter.com/thesoftwareguy7
 * @googleplus https://plus.google.com/+thesoftwareguyIn
 */
?>
<!DOCTYPE HTML>
<html>
    <head>
        <title><?php echo stripslashes($pageDetails["page_title"]); ?> - <?php echo SITE_NAME; ?> - www.thesoftwareguy.in</title>
        <link rel="icon" href="http://thesoftwareguy.in/favicon.ico" type="image/x-icon" />
        <meta http-equiv="content-type" content="text/html; charset=utf-8" />
        <meta name="description" content="<?php echo stripslashes($pageDetails["meta_desc"]); ?>" />
        <meta name="keywords" content="<?php echo stripslashes($pageDetails["meta_keywords"]); ?>" />
        <link href='http://fonts.googleapis.com/css?family=Ubuntu+Condensed' rel='stylesheet' type='text/css'>
        <script src="js/jquery.min.js"></script>
        <noscript>
        <link rel="stylesheet" href="css/skel-noscript.css" />
        <link rel="stylesheet" href="css/style.css" />
        <link rel="stylesheet" href="css/style-desktop.css" />
        </noscript>
        <!--[if lte IE 9]><link rel="stylesheet" href="css/ie9.css" /><![endif]-->
        <!--[if lte IE 8]><script src="js/html5shiv.js"></script><![endif]-->
    </head>
    <body>
        <!-- ********************************************************* -->
        <div id="header-wrapper">
            <div class="container">
                <div class="row">
                    <div class="12u">
                        <header id="header">
                            <h1><a href="<?php echo getHomeURL(); ?>" id="logo"><?php echo SITE_NAME; ?></a></h1>
                            <nav id="nav">
                                <a href="about-us.php" <?php echo ($currentPage == "about-us") ? ' class="current-page-item"' : '' ?> >About Us</a>
                                <a href="category.php" <?php echo ($currentPage == "category") ? ' class="current-page-item"' : '' ?>>Category</a>
                                <a href="contact-us.php" <?php echo ($currentPage == "contact-us") ? ' class="current-page-item"' : '' ?>>Contact US</a>
                                <a href="manage-site" target="_blank">Manage Site</a>
                            </nav>
                        </header>

                    </div>
                </div>
            </div>
        </div>
        <?php
        if ($currentPage == "index") {
            try {
                $stmt = $DB->prepare("SELECT * FROM " . TABLE_TAGLINE . " WHERE 1 LIMIT 1");
                $stmt->bindValue(":pname", $pageAlias);
                $stmt->execute();
                $details = $stmt->fetchAll();
            } catch (Exception $ex) {
                echo errorMessage($ex->getMessage());
            }
            ?>
            <div id="banner-wrapper">
                <div class="container">
                    <div class="row">
                        <div class="12u">

                            <div id="banner">
                                <h2><?php echo stripslashes($details[0]["tagline1"]); ?></h2>
                                <span><?php echo stripslashes($details[0]["tagline2"]); ?></span>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        <?php } ?>
        <div id="main">
>>>>>>> aca03ae9fbd8ae27fe330a2c33c832630d7e8199
            <div class="container">