<?php
$connection = mysqli_connect('localhost', 'filip', 'CSGO123', 'games');

$result = mysqli_query($connection, "SELECT * FROM players");

$players = mysqli_fetch_all($result, MYSQLI_ASSOC);

// print_r($players);

echo "<table>\n";
echo "<tr><th>username</th><th>fullname</th><th>description</th><th>age</th><th>role</th><th>created</th><tr>\n";
foreach ($players as $player) {
    echo "<tr><td>".$player['username']."</td><td>".$player['fullname']."</td><td>".$player['description']."</td><td>".$player['age']."</td><td>".$player['role']."</td><td>".date('H:i:s d.m.Y', strtotime($player['created']))."</td></tr>\n";
}
echo "</table>\n";


