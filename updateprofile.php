<!DOCTYPE HTML>
<html>
<head>
<title> Update Password </title>
</head>
<body>

<form method="post">
    Update Personal Details:<br>
    Name: <input type="text" name="name"><br><br>
    Phone Number: <input type="number" name="phone"><br><br>
    E-mail: <input type="email" name="email"><br><br>
    Branch: <input type="text" name="branch"><br><br>
    Interests: <input type="text" name="interests"><br><br>
    <input type="submit" onclick="valid()" name="submit" value="Submit">
</form>

<a href="./profile.php">Go To Profile</a>

<script>
	function valid() {
		var a = document.forms["myForm"]["name"].value;
		if (!a.match(/[A-Z][a-zA-Z][^#&<>\"~;$^%{}?]{1,20}$/)) {
        	alert("Enter a valid Name");
    	}

    	var c = document.forms["myForm"]["phone"].value;
		if (!c.match(/(\+91|0)?[5-9][0-9]{9}/)) {
        	alert("Enter a valid Mobile Number");
    	}

    	var d = document.forms["myForm"]["email"].value;
		if (!d.match(/[a-zA-Z0-9_\.]+@[a-z]+\.[a-z]+/)) {
        	alert("Enter a valid email-id");
    	}
	}
</script>

<?php 
    include ("config.php");
    session_start();

    if(!isset($_SESSION)){
        header("location:./index.php");
    }
    if(isset($_POST["submit"])){
        if(preg_match("/[A-Z][a-zA-Z][^#&<>\"~;$^%{}?]{1,20}$/",$_POST["name"])){
            $sql = "UPDATE Nash_user SET Name = '".$_POST["name"]."' WHERE username = '".$_SESSION["username"]."'";
            $conn->query($sql);
        }
        if(preg_match("/(\+91|0)?[5-9][0-9]{9}/",$_POST["phone"])){
            $sql = "UPDATE Nash_user SET phone_number = '".$_POST["phone"]."' WHERE username = '".$_SESSION["username"]."'";
            $conn->query($sql);
        }
        if(preg_match("/[a-zA-Z0-9_\.]+@[a-z]+\.[a-z]+/",$_POST["email"])){
            $sql = "UPDATE Nash_user SET email = '".$_POST["email"]."' WHERE username = '".$_SESSION["username"]."'";
            $conn->query($sql);
        }
        if(preg_match("/[a-zA-Z0-9,]+/",$_POST["branch"])){
            $sql = "UPDATE Nash_user SET branch = '".$_POST["branch"]."' WHERE username = '".$_SESSION["username"]."'";
            $conn->query($sql);
        }
        if(preg_match("/[a-zA-Z0-9,]+/",$_POST["interests"])){
            $sql = "UPDATE Nash_user SET interests = '".$_POST["interests"]."' WHERE username = '".$_SESSION["username"]."'";
            $conn->query($sql);
        }
        echo ("Updated!");
    }
?>
</body>
</html>
