<html>
<head>
    <style>
        .required {
            color: red;
        }
        #users {
            border-collapse: collapse;
        }
        #users th, #users td {
            border: 1px solid;
        }
    </style>
</head>
<body>
<h1>Game Players</h1>
<form method="post" action="index.php">
    <?php if(!empty($userAdded)) { echo "User has been added"; } ?>
    <?php if(!empty($missingDetails)) { echo "<div class='required'>Mandatory details missing!</div>"; } ?>
    <?php include_once("view/player_form.php"); ?>
    <button type="submit" name="newPlayer" value="yes">Submit</button>
    <br><hr><br>
    <?php if(!empty($userDeleted)) { echo "<div>User has been deleted</div>"; } ?>
</form>
<form method="post" action="index.php">
    <?php include_once("view/players.php"); ?>
</form>
</body>
</html>