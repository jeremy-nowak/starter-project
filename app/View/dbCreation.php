<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

<form class="dbCreateForm" method="post">

    <div class="field">
        <label for="host">Host</label>
        <input type="text" placeholder="Host" name="host" id="host">
    </div>

    <div class="field">
        <label for="dbname">Database name</label>
        <input type="text" placeholder="Database name" name="dbname" id="dbname">
    </div>

    <div class="field">
        <label for="dbUser">Database user</label>
        <input type="text" placeholder="Database user" name="dbUser" id="dbUser">
    </div>

    <div class="field">
        <label for="dbPass">Database password</label>
        <input type="password" placeholder="Database password" name="dbPass" id="dbPass">
    </div>

    <div class="field btn">
        <input type="submit" value="Create" id="submit_db">
    </div>

    <div class="error_msg">
        <p id="error_db"></p>
    </div>

    <div class="success_msg">
        <p id="success_db"></p>
    </div>

</form>
    
</body>
</html>