<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script defer src="public/scripts/scriptDbCreation.js"></script>
    <title>Document</title>
</head>

<body>
    <div class="hcontainer">
        <?php
        require_once "header.php";
        ?>
    </div>

    <form class="dbCreateForm" id="dbCreateForm" method="post">

        <div class="inputs">
            <label for="host">Host</label>
            <input type="text" placeholder="Host" name="host" id="host">
        </div>
        <div class="inputs">
            <label for="dbUser">Database user</label>
            <input type="text" placeholder="Database user" name="dbUser" id="dbUser">
        </div>
        <div class="inputs">
            <label for="dbPass">Database password</label>
            <input type="password" placeholder="Database password" name="dbPass" id="dbPass">
        </div>
        <div class="inputs">
            <label for="dbname">New database </label>
            <input type="text" placeholder="Database name" name="db" id="db">
        </div>
        <div class="btn">
            <input type="submit" value="Create" id="dbBtn">
        </div>

        <div class="error_msg">
            <p id="dbError"></p>
        </div>

        <div class="success_msg">
            <p id="dbSuccess"></p>
        </div>

    </form>

</body>

</html>