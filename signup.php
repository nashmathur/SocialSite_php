<head>
<title> Signup </title>
</head>
<body>

	<form name="myForm" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>"  method="post">
		Name: <input type="text" name="name" required><br><br>
		Age: <input type="number" name="age" min="1" max="99"><br><br>
		Gender: <input type="radio" name="gender" value="male" checked> Male
  				<input type="radio" name="gender" value="female"> Female
  				<input type="radio" name="gender" value="other"> Other<br><br>
		Phone Number: <input type="number" name="phone" size="10" required><br><br>
		Email: <input type="email" name="email" required><br><br>
		Username: <input type="text" name="username" required><br><br>
		Password: <input type="password" name="password" required><br><br>
		Confirm Password: <input type="password" name="confpassword" required><br><br>
		<input type="submit" onclick="valid()" value="Submit">
<script>
	function valid() {
		var a = document.forms["myForm"]["name"].value;
		if (!a.match(/[A-Z][a-zA-Z][^#&<>\"~;$^%{}?]{1,20}$/)) {
        	alert("Enter a valid Name");
    	}

    	var b = document.forms["myForm"]["age"].value;
    	if (!b.match(/^\d{1,2}$/)) {
			alert("Enter a valid Age");
    	}

    	var c = document.forms["myForm"]["phone"].value;
		if (!c.match(/(\+91|0)?[5-9][0-9]{9}/)) {
        	alert("Enter a valid Mobile Number");
    	}

    	var d = document.forms["myForm"]["email"].value;
		if (!d.match(/[a-zA-Z0-9_\.]+@[a-z]+\.[a-z]+/)) {
        	alert("Enter a valid email-id");
    	}

		var e = document.forms["myForm"]["password"].value;
		if (!e.match(/^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])(?=.*?[#?!@$%^&*-\.\/]).{8,32}$/)) {
        	alert("Enter a password with minimum eight characters, at least one uppercase letter, one lowercase letter, one number and one special character");
    	}

    	var f = document.forms["myForm"]["confpassword"].value;
		if (e != f) {
        	alert("Passwords do not match.");
    	}

	}
</script>
<?php
    include("config.php");
    if($_SERVER["REQUEST_METHOD"] == "POST" and preg_match("/[A-Z][a-zA-Z][^#&<>\"~;$^%{}?]{1,20}$/",$_POST["name"]) and preg_match("/^\d{1,2}$/",$_POST["age"]) and preg_match("/(\+91|0)?[5-9][0-9]{9}/",$_POST["phone"]) and preg_match("/[a-zA-Z0-9_\.]+@[a-z]+\.[a-z]+/",$_POST["email"]) and preg_match("/^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])(?=.*?[#?!@$%^&*-\.\/]).{8,32}$/",$_POST["password"]) and $_POST["confpassword"] == $_POST["password"]) {
        $password = md5($_POST["password"]);
        $sql = "INSERT INTO Nash_user(Name, age, gender, phone_number, email, username, password) VALUES ('".$_POST["name"]."',".$_POST["age"].",'".$_POST["gender"]."',".$_POST["phone"].",'".$_POST["email"]."','".$_POST["username"]."','".$password."');";
        if ($conn->query($sql) === TRUE) {
          header("Location: ./index.php");
          echo "<script type='text/javascript'>alert('New User Registered. Please Login Now.');</script>";
    } else {
          echo "Error: " . $sql . "<br>" . $conn->error;
    }

    }
    $conn->close();

?>
</body>
</html>
