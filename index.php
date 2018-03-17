<!DOCTYPE HTML>
<html>
<head>
<title> Social Site </title>
</head>
<body>

<form action = "<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method = "post">
Username: <input type="text" name="username"><br>
Password: <input type="password" name="password"><br>
<p><input type="checkbox" name="re" id="re" value="on"> <label for="re">Remember Me</label></p>
<input type="submit" name="submit"  value="Submit"><br>
</form>

<a href="./signup.php">Signup</a>
<?php
include ("config.php");

session_start();
if (isset($_SESSION["id"]) or isset($_COOKIE['username'])){
    header("Location: ./profile.php");
}
else{

    if(isset($_POST["submit"])){
        if($_SERVER["REQUEST_METHOD"] == "POST") {
            if(isset($_POST['re'])){
                $re = "on";
            }else{
                $re = "";
            }
            $password = md5($_POST["password"]);
            $sql = "SELECT * FROM Nash_user WHERE username = '".$_POST["username"]."' and password = '".$password."';"; 
            $result = $conn->query($sql);
            if ($result->num_rows > 0){
                if($re == "on"){ //remember me checked
                    setcookie("username",$_POST['username'],time() + (86400  * 10));
                }else{ //remember me not checked
                }
                $_SESSION["username"] = $_POST["username"];
                $_SESSION["id"] = session_id();
                header("Location: ./profile.php");
            } else {
                echo "Incorrect credentials";
            }
        }
        else{
        }
    }
}

?>

</body>
</html>
