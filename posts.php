<!DOCTYPE HTML>
<html>
<head>
    <title> Posts </title>
</head>
<body>

    <a href="./addpost.php"> Add your posts </a>
    
    <?php
        include ('config.php');
        session_start();
                
        if (!isset($_SESSION)){
            header ("Location: ./profile.php");
        }    
        
        echo "A";
        


    ?>

</body>
</html>
