<?php
include ('config.php');

$sql = "SELECT * FROM Nash_user WHERE username = '".$_POST['username']."';";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    echo "Not available"; 
} else{
    echo "Available";
}
?>
