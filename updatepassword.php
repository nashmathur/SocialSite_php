<!DOCTYPE HTML>
<html>
<head>
<title> Update Password </title>
</head>
<body>

<form method="post">
    Old password: <input type="password" name="oldpassword"><br><br>
    New password: <input type="password" name="newpassword"><br><br>
    Confirm New password: <input type="password" name="confpassword"><br><br>
    <input type="submit" name="submit" value="Submit">
</form>

<a href="./profile.php">Go To Profile</a>

<?php 
    include ("config.php");
    session_start();

    if(!isset($_SESSION)){
        header("location:./index.php");
    }
    if(isset($_POST["submit"])){
        $sql = "SELECT password FROM Nash_user WHERE username = '".$_SESSION['username']."';";     
        $result = $conn->query($sql);
        $row = $result->fetch_assoc();
        $oldpassword = md5($_POST["oldpassword"]);
        if ($oldpassword == $row["password"] and $_POST["newpassword"] == $_POST["confpassword"] and preg_match("/^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])(?=.*?[#?!@$%^&*-\.\/]).{8,32}$/",$_POST["newpassword"])){
            $newpassword = md5($_POST["newpassword"]);
            $sql = "UPDATE Nash_user SET password = '".$newpassword."' WHERE username = '".$_SESSION["username"]."';";
            $conn->query($sql);
        }



    }
?>
</body>
</html>
