<?php
if(!isset($_SESSION)){
    session_start();
}


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="public/style/style.css">
    <script defer src="public/scripts/scriptHome.js"></script>
    <title>Project starter</title>
</head>

<body>
    <div class="container">

            <div class="hcontainer">
                <?php
                require_once "header.php";
                ?>
            </div>

            <div class="home">
                <?php if (!isset($_SESSION['user']['login'])) { ?>
                    <h1>Hello, this is a project starter with an MVC architecture using AltoRouter. Enjoy !</h1>

                <?php } else { ?>
                    <h1><?php echo 'Welcome back&nbsp;' . $_SESSION['user']['login'] ?></h1>
                <?php } ?>
            </div>

    </div>
</body>
</html>
