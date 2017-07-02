<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
         <link rel="stylesheet" type="text/css" href="/style.css">
         <title>Database Term Project 2014120045 이건선</title>
    </head>
    <body>
        <header>
            <h1><a href="/home.php">Music Review</a></h1>
        </header>
        <nav id="left">
            <ul>
                <li><a href="/album_review.php">Album Review</a></li>
                <li><a href="/song_review.php">Song Review</li>
                <li><a href="/new_albums.php">New Albums</li>
                <li><a href="/search.php">Search</li>
            </ul>
        </nav>
        
        <nav id="right">
            
            <ul>
                
                <?php
                
                    $conn = mysqli_connect('localhost', 'root', '', 'musicreview');
                    $username= $_COOKIE['username'];
                    $sql = "SELECT * FROM members WHERE nickname = '$username'";
                    $result =  mysqli_query($conn, $sql);
                    
                    
                    $row = mysqli_fetch_assoc($result);
                    
                    echo '<li><a href="/my_review.php">'."My Reviews".'</a></li>'."\n";
                    echo '<li>'."My Rank : ".$row['mem_rank'].'</li>'."\n";
                    echo '<li>'."Preferring Genre : ".$row['pref_genre'].'</li>'."\n";
                ?>
                <li><a href="/index.php">Log Out</a></li>
            </ul>
        </nav>
        
        
        <div id="control">
            <input type = "button" name = "table" value ="Write New Album Review" onclick = "location.href='/write_album.php'";>
            <input type = "button" name = "table" value ="Write New Song Review" onclick = "location.href='/write_song.php'";>
        </div>
        <article>
            <ul>
            <?php
                
                    $conn = mysqli_connect('localhost', 'root', '', 'musicreview');
                    $username= $_COOKIE['username'];
                    $sql = "SELECT * FROM song_review WHERE nickname = '$username'";
                    $result =  mysqli_query($conn, $sql);
                    
                    
                    echo "My Song Review#--------------------------------------------------------";
                    echo '<table border=1>';
                    echo '<tbody>';
                    
                    while($row = mysqli_fetch_assoc($result)){
                        
                        echo "<td align='center'>".$row['song_name']."</td>";
                        echo "<td align='center'>".$row['artist_name']."</td>"; 
                        echo "<td align='center'>".$row['rank']."</td>"; 
                        echo "<td align='center'>".$row['contents']."</td>";
                        echo '<td><a href="/s_del_process.php?id='.$row['s_review_num'].'">'."Del".'</a></td>'."  ";
                        echo '</tr>';
                       
                    }
                    
                    echo '</tbody>';
                    echo '</table>';
                ?>
                </ul>
                <br>
                <ul>
            <?php
                
                    $conn = mysqli_connect('localhost', 'root', '', 'musicreview');
                    $username= $_COOKIE['username'];
                    $sql = "SELECT * FROM album_review WHERE nickname = '$username'";
                    $result =  mysqli_query($conn, $sql);
                    
                    
                    echo "My Album Review#--------------------------------------------------------";
                    echo '<table border=1>';
                    echo '<tbody>';
                    
                    while($row = mysqli_fetch_assoc($result)){
                        echo '<tr>';
                        echo "<td align='center'>".$row['album_name']."</td>";
                        echo "<td align='center'>".$row['artist_name']."</td>"; 
                        echo "<td align='center'>".$row['rank']."</td>"; 
                        echo "<td align='center'>".$row['contents']."</td>";
                        echo '<td><a href="/a_del_process.php?id='.$row['a_review_num'].'">'."Del".'</a></td>'."  ";
                        echo '</tr>';
                       
                    }
                    
                    echo '</tbody>';
                    echo '</table>';
                ?>
                </ul>
        </article>
        
        
        
    </body>
</html>