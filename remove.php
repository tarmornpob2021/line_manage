<?php
include 'config.php'; 

$sql = "DELETE FROM `groups` WHERE id = {$_POST["id_lock"]}";

if ($conn->query($sql) === TRUE) {

	echo "REMOVED";

}


?>