<!DOCTYPE HTML>
<html>
<head>
<title> Profile </title>
</head>
<body>

<?php        
include ("config.php");
session_start();

if (!isset($_SESSION)){
    header ("Location: ./index.php");
}    
else{
    if(isset($_COOKIE['username'])){
        $_SESSION['username'] = $_COOKIE['username'];
    }
    $sqlempty = "SELECT * FROM Nash_user WHERE username='".$_SESSION['username']."';";
    $result = $conn->query($sqlempty);
    $row = $result->fetch_assoc();
    if(empty($row['branch']) and empty($row['interests'])){
        header ("Location: ./updateprofile.php"); 
    }
    if (isset($_POST["AddProfilePic"])){
        $target_dir = "uploads/";
        $target_file = $target_dir . basename($_FILES["fileToUpload1"]["name"]);
        $uploadOk = 1;
        $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
        // Check if image file is a actual image or fake image
        if(isset($_POST["submit"])) {
            $check = getimagesize($_FILES["fileToUpload1"]["tmp_name"]);
            if($check !== false) {
                echo "File is an image - " . $check["mime"] . ".";
                $uploadOk = 1;
            } else {
                echo "File is not an image.";
                $uploadOk = 0;
            }
        }
        // Allow certain file formats
        if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
                && $imageFileType != "gif" ) {
            echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
            $uploadOk = 0;
        }
        // Check if $uploadOk is set to 0 by an error
        if ($uploadOk == 0) {
            echo "Sorry, your file was not uploaded.";
            // if everything is ok, try to upload file
        } else {
            if (move_uploaded_file($_FILES["fileToUpload1"]["tmp_name"], $target_file)) {
                echo "The file ".basename($_FILES["fileToUpload1"]["name"]). " has been uploaded.";
                $sql = "UPDATE Nash_user SET profile_pic = '".basename($_FILES["fileToUpload1"]["name"])."' WHERE username = '".$_SESSION["username"]."';";
                $conn->query($sql);
            } else {
                echo "Sorry, there was an error uploading your file.";
            }
        }
    }

    if (isset($_POST["AddCoverPic"])){
        $target_dir = "uploads/";
        $target_file = $target_dir . basename($_FILES["fileToUpload2"]["name"]);
        $uploadOk = 1;
        $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
        // Check if image file is a actual image or fake image
        if(isset($_POST["submit"])) {
            $check = getimagesize($_FILES["fileToUpload2"]["tmp_name"]);
            if($check !== false) {
                echo "File is an image - " . $check["mime"] . ".";
                $uploadOk = 1;
            } else {
                echo "File is not an image.";
                $uploadOk = 0;
            }
        }
        // Allow certain file formats
        if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
                && $imageFileType != "gif" ) {
            echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
            $uploadOk = 0;
        }
        // Check if $uploadOk is set to 0 by an error
        if ($uploadOk == 0) {
            echo "Sorry, your file was not uploaded.";
            // if everything is ok, try to upload file
        } else {
            if (move_uploaded_file($_FILES["fileToUpload2"]["tmp_name"], $target_file)) {
                echo "The file ". basename($_FILES["fileToUpload2"]["name"]). " has been uploaded.";
                $sql = "UPDATE Nash_user SET cover_pic = '".basename($_FILES["fileToUpload2"]["name"])."' WHERE username = '".$_SESSION["username"]."';";
                $conn->query($sql);
            } else {
                echo "Sorry, there was an error uploading your file.";
            }
        }
    }
    if (isset($_POST["logout"])){
        header ("Location: ./logout.php");
    }

$sql1 = "SELECT cover_pic, profile_pic FROM Nash_user where username = '".$_SESSION["username"]."';";
$result = $conn->query($sql1);
$row = $result->fetch_assoc();
$profilepic = $row["profile_pic"];
$coverpic = $row["cover_pic"];
}

?>

<img src="./uploads/<?php echo $coverpic; ?>" height='300px' width='600px'>
<img src="./uploads/<?php echo $profilepic; ?>" height='200px' width='200px'>

<form method="post" enctype="multipart/form-data">
Select profile picture to upload:
<input type="file" name="fileToUpload1" id="fileToUpload1">
<input type="submit" value="Upload Image" name="AddProfilePic">
</form>

<form method="post" enctype="multipart/form-data">
Select cover picture to upload:
<input type="file" name="fileToUpload2" id="fileToUpload2">
<input type="submit" value="Upload Image" name="AddCoverPic">
</form>

<a href="./addpost.php">Go To Posts</a><br>
<a href="./updateprofile.php">Update Profile</a><br>
<a href="./updatepassword.php">Update Password</a><br>

<form method="post">
<input type="submit" name="logout" value="logout">
</form>


</body>
</html>
