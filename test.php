<?php
function getFullName($fName,$lName){
    return $fName . " " . $lName;
}
 
$firstName="Filip";
$lastName="Rada";

echo "first name: ".$firstName.", last name: ".$lastName.", full name: ".getFullName($firstName, $lastName);
?>

