<?php
    $conn = mysqli_connect('localhost', 'root', '', 'musicreview');
    $username = $_COOKIE['username'];
    $sql="INSERT INTO song_review(nickname,song_name,artist_name,rank,contents) 
    VALUES('". $username."','".$_POST['song_name']."','".$_POST['artist_name']."',".$_POST['rank'].",'".$_POST['description']."')";
    $result = mysqli_query($conn,$sql);
    header('Location:/home.php');
?>

