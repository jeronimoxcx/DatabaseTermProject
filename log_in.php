<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
         <link rel="stylesheet" type="text/css" href="/style.css">
         <title>Database Term Project 2014120045 이건선</title>
    </head>
    <body>
        <header>
            <h1><a href="/index.php">Music Review</a></h1>
        </header>
        <div id="login_page">
        <h2>login</h2>
        <?php
        
        $conn = mysqli_connect('localhost', 'root', '', 'musicreview');
        
        $memberEmail = $_POST['email'];
        $memberPwd = $_POST['password'];
        
        $sql = "SELECT * FROM members WHERE email = '$memberEmail' AND password = '$memberPwd'";
        $result =  mysqli_query($conn, $sql);
        
        $row = mysqli_fetch_assoc($result);
        
        
        if($row != NULL){
            setcookie('username', $row['nickname']);
            
            header('Location:/home.php');
        }
        else{
            echo 'No such member exists';
            echo '<a href="/index.php">'.'Go Back'.'</a>';;
        }
        
        ?>
        
    
        </div>  
        
        
    </body>
</html>