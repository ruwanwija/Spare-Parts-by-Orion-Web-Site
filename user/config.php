<?php
$server = "localhost";
$database = "tronic_spares_by_orion";
$user = "root";
$password = "";

$conn = mysqli_connect($server, $user, $password, $database);

if($conn){
        echo "";
        
}
else{
        echo "Something went wrong!!";
}
?>