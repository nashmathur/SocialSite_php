<!DOCTYPE HTML>
<html>
    <head>
        <title> Social Site </title>
    </head>
    <body>

        <form action = "<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method = "post">
            Username: <input type="text" name="username"><br>
            Password: <input type="password" name="password"><br>
            <input type="submit" name="submit"  value="Submit"><br>
        </form>

        <a href="./signup.php">Signup</a>
<?php
    include ("config.php");
    session_start();

    if (isset($_SESSION["id"])){
        header("Location: ./profile.php");
    }
    else{

    if(isset($_POST["submit"])){
        if($_SERVER["REQUEST_METHOD"] == "POST") {
            $password = md5($_POST["password"]);
            $sql = "SELECT * FROM Nash_user WHERE username = '".$_POST["username"]."' and password = '".$password."';"; 
            $result = $conn->query($sql);
            if ($result->num_rows > 0){
                    $_SESSION["username"] = $_POST["username"];
                    $_SESSION["id"] = session_id();
                    header("Location: ./profile.php");
                }
            }
            else{
            }
        }
    }

?>
   
    </body>
</html>
