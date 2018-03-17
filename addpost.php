<!DOCTYPE HTML>
<html>
<head>
<title> Posts </title>
</head>
<body>

<form method="post">
<input type="text" name="text" placeholder="Enter your Text here...">
<input type="submit" value="submit" name="AddPost">           
</form><br><br>
<hr><br>

<?php
include ('config.php');
session_start();

if (!isset($_SESSION)){
    header ("Location: ./profile.php");
}
else{
    if(isset($_POST['AddPost'])){
        $sql = "INSERT INTO Nash_post(username,message,post_time) VALUES ('".$_SESSION['username']."', '".$_POST['text']."', '".date("Y-m-d h:i:s")."')";
        $conn->query($sql);
    }
}

$sql1 = "SELECT * FROM Nash_post order by post_time desc";
$result = $conn->query($sql1);

if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
                    echo  $row["username"]. ":  " . $row["message"]. " (Posted at " . $row["post_time"]. ")<br>";
                        }
} else {
        echo "0 results";
}

?>

<a href="./profile.php">Go back to your Profile</a>
</body>
</html>
