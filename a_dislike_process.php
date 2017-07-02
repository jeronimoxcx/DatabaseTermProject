        <?php
        if(empty($_GET['id'])==false){
                $conn = mysqli_connect('localhost', 'root', '', 'musicreview');
                $sql = "UPDATE album_review SET dislike = dislikes + 1 WHERE a_review_num = ".$_GET['id'];
                $result =  mysqli_query($conn, $sql);
                }
                
            
        header('Location:/album_review.php');
        ?>
        