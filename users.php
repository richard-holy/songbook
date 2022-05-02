<?php
$connection = mysqli_connect('localhost', 'filip', 'CSGO123', 'games');

// $testString = '\n \ "';
// echo mysqli_real_escape_string($connection, $testString);
// die();

$result = mysqli_query($connection, "SELECT * FROM players");

$players = mysqli_fetch_all($result, MYSQLI_ASSOC);

if(!empty($_POST)) {
    // print_r($_POST);
    if(!empty($_POST['remove'])) {
        $result = mysqli_query($connection, "DELETE FROM players WHERE id=".$_POST['remove']);
        echo "Player removed<br>";
    }
    if(!empty($_POST['newPlayer']) && $_POST['newPlayer'] == 'yes') {
        if(!empty($_POST['username']) && !empty($_POST['fullname']) && !empty($_POST['age']) && !empty($_POST['role'])) {
            //$sqlCommand = "INSERT INTO players (username, fullname, description, age, role) VALUES ('".$_POST['username']."','".$_POST['fullname']."','".$_POST['description']."',".$_POST['age'].",'".$_POST['role']."')";
            $sqlCommand = "INSERT INTO players (username, fullname, description, age, role) VALUES ('".mysqli_real_escape_string($connection, $_POST['username'])."','".mysqli_real_escape_string($connection, $_POST['fullname'])."','".mysqli_real_escape_string($connection, $_POST['description'])."',".mysqli_real_escape_string($connection, $_POST['age']).",'".mysqli_real_escape_string($connection, $_POST['role'])."')";
            // echo $sqlCommand;
            $result = mysqli_query($connection, $sqlCommand);
            echo "New player added<br>";
        } else {
            echo "Please fill the mandatory fields: Full Name, username, age, role! <br>";
        }
    }
}
$result = mysqli_query($connection, "SELECT * FROM players");

$players = mysqli_fetch_all($result, MYSQLI_ASSOC);
?>
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
<h1>Game Players</h1>
<form method="post" action="users.php">
    <table>
<tr><th class="required">Full Name:</th><td><input name="fullname" required="required"></td></tr>
<tr><th class="required">Username:</th><td><input name="username" required="required"></td></tr>
<tr><th>Description:</th><td><textarea name="description"></textarea></td></tr>
<tr><th class="required">Age:</th><td><input name="age"  required="required" type="number"></td></tr>
<tr><th class="required">Role:</th><td>
    <select name="role">
        <option>admin</option>
        <option>guest</option>
    </select>
</td></tr>
</table>
    <button type="submit" name="newPlayer" value="yes">Submit</button>
<br>
<br>
<br>
<?php
echo "<table id='users'>\n";
echo "<tr><th>username</th><th>fullname</th><th>description</th><th>age</th><th>role</th><th>created</th><th>action</th><tr>\n";
foreach ($players as $player) {
    echo "<tr><td>".htmlentities($player['username'])."</td><td>".htmlentities($player['fullname'])."</td><td>".htmlentities($player['description'])."</td><td>".$player['age']."</td><td>".$player['role']."</td><td>".date('H:i:s d.m.Y', strtotime($player['created']))."</td><td><button type='submit' name='remove' value='".$player['id']."'>Remove</button></td></tr>\n";
}
echo "</table>\n";

?>
</form>


