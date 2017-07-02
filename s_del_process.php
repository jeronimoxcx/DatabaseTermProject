        <?php
        if(empty($_GET['id'])==false){
                $conn = mysqli_connect('localhost', 'root', '', 'musicreview');
                $sql = "DELETE FROM song_review  WHERE s_review_num=".$_GET['id'];
                $result =  mysqli_query($conn, $sql);
                
                
            }
        header('Location:/my_review.php');
        ?>
        