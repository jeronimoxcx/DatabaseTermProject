<!DOCTYPE html>
<html>
<?php
    $conn = mysqli_connect('localhost', 'root', '', 'musicreview');
    
    $email = $_POST['email'];
    $password = $_POST['pwd'];
    $nickname = $_POST['nickname'];
    $pref_genre = $_POST['pref_genre'];
    
    $sql = "INSERT INTO members (email, nickname, password, mem_rank, pref_genre)";
    $sql = $sql. "VALUES ('$email','$nickname','$password','D','$pref_genre')";
    
    if($conn->query($sql)){
        echo "DB insert Success!\n";
        echo "Welcome!".$nickname;
    }
    else{
        echo "DB insert Fail!\n";
    }
    mysqli_close($conn);
?>
<input type="button" value="Log In Now" onclick="location='/index.php'">
</html>
