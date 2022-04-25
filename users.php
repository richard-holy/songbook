<?php
$connection = mysqli_connect('localhost', 'filip', 'CSGO123', 'games');

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
            $sqlCommand = "INSERT INTO players (username, fullname, description, age, role) VALUES ('".$_POST['username']."','".$_POST['fullname']."','".$_POST['description']."',".$_POST['age'].",'".$_POST['role']."')";
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
<h1>Game Players</h1>
<form method="post" action="users.php">
    Full Name: <input name="fullname"><br>
    Username: <input name="username"><br>
    Description: <textarea name="description"></textarea><br>
    Age: <input name="age"><br>
    Role: 
    <select name="role">
        <option>admin</option>
        <option>guest</option>
    </select>
    <br>
    <button type="submit" name="newPlayer" value="yes">Submit</button>
<br>
<?php
echo "<table>\n";
echo "<tr><th>username</th><th>fullname</th><th>description</th><th>age</th><th>role</th><th>created</th><tr>\n";
foreach ($players as $player) {
    echo "<tr><td>".$player['username']."</td><td>".$player['fullname']."</td><td>".$player['description']."</td><td>".$player['age']."</td><td>".$player['role']."</td><td>".date('H:i:s d.m.Y', strtotime($player['created']))."</td><td><button type='submit' name='remove' value='".$player['id']."'>Remove</button></td></tr>\n";
}
echo "</table>\n";

?>
</form>


