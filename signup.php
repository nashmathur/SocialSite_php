<head>
<title> Signup </title>
</head>
<body>

	<form name="myForm" method="post">
		Name: <input type="text" name="name" required><br><br>
		Age: <input type="number" name="age" min="1" max="99"><br><br>
		Gender: <input type="radio" name="gender" value="male" checked> Male
  				<input type="radio" name="gender" value="female"> Female
  				<input type="radio" name="gender" value="other"> Other<br><br>
		Phone Number: <input type="text" name="phone" size="10" required><br><br>
		Email: <input type="email" name="email" required><br><br>
		Username: <input type="text" name="username" required><br><br>
		Password: <input type="password" name="password" required><br><br>
		Confirm Password: <input type="password" name="confpassword" required><br><br>
		<input type="button" onclick="valid()" value="Submit">
<script>
	function valid() {
		var a = document.forms["myForm"]["name"].value;
		if (!a.match(/(?=.*?\w)(?=.*?\s)/)) {
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
</body>
</html>
