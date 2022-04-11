<?php
$connection = mysqli_connect('localhost', 'filip', 'CSGO123', 'games');

$result = mysqli_query($connection, "SELECT * FROM players");

$players = mysqli_fetch_all($result, MYSQLI_ASSOC);

// print_r($players);

echo "<table>\n";
echo "<tr><th>username</th><th>fullname</th><tr>\n";
foreach ($players as $player) {
    echo "<tr><td>".$player['username']."</td><td>".$player['fullname']."</td></tr>\n";
}
echo "</table>\n";


