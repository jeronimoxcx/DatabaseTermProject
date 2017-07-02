<?php
    $conn = mysqli_connect('localhost', 'root', '', 'musicreview');
    $username= $_COOKIE['username'];
    $sql="INSERT INTO album_review(nickname,album_name,artist_name,rank,contents) 
    VALUES('".$username."','".$_POST['album_name']."','".$_POST['artist_name']."',".$_POST['rank'].",'".$_POST['description']."')";
    $result = mysqli_query($conn,$sql);
    header('Location:/home.php');
?>

