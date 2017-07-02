        <?php
        if(empty($_GET['id'])==false){
                $conn = mysqli_connect('localhost', 'root', '', 'musicreview');
                $sql = "UPDATE song_review SET likes = likes + 1 WHERE s_review_num=".$_GET['id'];
                $result =  mysqli_query($conn, $sql);
                
                
            }
        header('Location:/song_review.php');
        ?>
        