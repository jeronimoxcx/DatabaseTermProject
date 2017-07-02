<?php
setcookie('Name');
?>

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
            <form  method="post" action="log_in.php" >
            EMAIL : <input type="text" name="email" /><br />
            PASSWORD : <input type="password" name="password" /><br />
            <input type="submit" value="Log In"/>
            <input type="button" name ="버튼" value="Sign In" onclick="location.href='/sign_in.php'";>
           </form>
</div>  
        
        
    </body>
</html>