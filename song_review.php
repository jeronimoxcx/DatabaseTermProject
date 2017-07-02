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
            <table>
            <thead>
            <tr>
                <th width="100">User Name</th>
                <th width="250">Song Name</th>
                <th width="200">Artist Name</th>
                <th width="200">Rank</th>
                <th width="700">Contents</th>
                <th width="200">Likes</th>
                <th width="200">Dislikes</th>
                <th width="200">         </th>
            </tr>
            </thead>
            <?php
            
            $sql = "SELECT * FROM song_review ORDER BY s_review_num ASC";
            $result =  mysqli_query($conn, $sql);
            
                    echo '<tbody>';
                    
                    while($row = mysqli_fetch_assoc($result)){
                        echo '<tr>';
                        echo "<td align='center'>".$row['nickname']."</td>";
                        echo "<td align='center'>".$row['song_name']."</td>"; 
                        echo "<td align='center'>".$row['artist_name']."</td>"; 
                        echo "<td align='center'>".$row['rank']."</td>";
                        echo "<td align='center'>".$row['contents']."</td>";
                        echo "<td align='center'>".$row['likes']."</td>";
                        echo "<td align='center'>".$row['dislike']."</td>";
                        echo "<td align='center'>";
                        echo '<a href="/s_like_process.php?id='.$row['s_review_num'].'">'."Like".'</a>'."  ";
                        echo '<a href="/s_dislike_process.php?id='.$row['s_review_num'].'">'."Dislike".'</a>'."  ";
                        echo "</td>";
                        
                        
                        echo '</tr>';
                       
                    }
                    
                    echo '</tbody>';
                    echo '</table>';
            
            ?>
        </article>

        
    </body>
</html>