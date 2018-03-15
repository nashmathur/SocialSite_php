<!DOCTYPE HTML>
<html>
<head>
    <title> Profile </title>
</head>
<body>
    
    <?php
        
        session_start();

        if (!isset($_SESSION)){
            header ("Location: ./index.php");
        }    
        else{
            print_r($_SESSION);
        }
        
    ?>

</body>
</html>
