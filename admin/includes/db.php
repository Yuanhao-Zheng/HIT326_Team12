<?php 
#connect to localhost database
#notes: don't worry about the error in line 14

$db['db_host'] = "localhost";
$db['db_user'] = "root";
$db['db_pass'] = "";
$db['db_name'] = "peer_assessment";

foreach ($db as $key => $value) {
    define(strtoupper($key), $value);
}

$connection = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);


// to verify the connection, please use the code below
// if($connection){
//     echo "We are connected";
// }

?>