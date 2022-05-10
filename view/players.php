<table id='users'>
<tr><th>username</th><th>fullname</th><th>description</th><th>age</th><th>role</th><th>created</th><th>action</th><tr>
<?php
foreach ($players as $player) {
    echo "<tr><td>".htmlentities($player['username'])."</td><td>".htmlentities($player['fullname'])."</td><td>".htmlentities($player['description'])."</td><td>".$player['age']."</td><td>".$player['role']."</td><td>".date('H:i:s d.m.Y', strtotime($player['created']))."</td><td><button type='submit' name='remove' value='".$player['id']."'>Remove</button></td></tr>\n";
}
?>
</table>