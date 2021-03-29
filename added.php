<?php
include 'config.php'; 

$return_code = array();

$queryp = "SELECT * FROM `groups` WHERE id = {$_POST["id_lock"]}";
$resultp = mysqli_query($conn, $queryp);
$rowp = mysqli_fetch_assoc($resultp);





if(isset($rowp["id"])) { 



$sqladd = "UPDATE `groups` SET group_n = '{$_POST["g_n"]}', token = '{$_POST["t_k"]}', email = '{$_POST["em"]}' WHERE id = {$rowp["id"]};";



if ($conn->query($sqladd) === TRUE) {

$return_code = array("CODE"=>"UPDATED");

					
echo json_encode($return_code);



}

}

else {

$sql = "INSERT INTO `groups` (id,group_n,token,email)
VALUES ('{$_POST["id_lock"]}','{$_POST["g_n"]}','{$_POST["t_k"]}','{$_POST["em"]}')";




if ($conn->query($sql) === TRUE) {



	$return_code = array("CODE"=>"NEW_ROW");

echo json_encode($return_code);


}


}

?>