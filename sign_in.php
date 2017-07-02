<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <link rel="stylesheet" type="text/css" href="/style.css">
        <title>Sign In</title>
    </head>
    <body>
        <header>
            <h1><a href="/index.php">Music Review</a></h1>
        </header>
        <form name="sign_in" method="post" action="new_member.php">
         <h1>input your information</h1>
         <table border="1">
              <tr>
               <td>Email</td>
               <td><input type="text" size="30" name="email"></td>
              </tr>
              <tr>
               <td>Password</td>
               <td><input type="password" size="30" name="pwd"></td>
              </tr>
              <tr>
               <td>Nickname</td>
               <td><input type="text" size="12" maxlength="10" name="nickname"></td>
              </tr>
              <tr>
               <td>Preferring Music Genre</td>
               <td>
               <select name="pref_genre" size="1">
                   <?php
                   $conn = mysqli_connect('localhost', 'root', '', 'musicreview');
                   $sql = "SELECT * FROM genre";
                   $result =  mysqli_query($conn, $sql);
                   while($row = mysqli_fetch_assoc($result)){
                       //echo "<option value='".$genre_name."'>".$genre_name."</option>";
                       echo "<option value='".$row['genre_name']."'>".$row['genre_name']."</option>";
                   }
                   ?> 
                </select>
               </td>
              </tr>
         </table>
         <input type=submit value="submit"><input type=reset value="rewrite">
         
           <input type="button" value="BACK"onclick="javascripｔ:history.go(-1)">
        </form>
    </body>
</html>
