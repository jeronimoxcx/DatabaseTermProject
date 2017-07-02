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
                <th width="100">Album Name</th>
                <th width="250">Artist Name</th>
                <th width="200">Release Year</th>
                <th width="200">Album Genre</th>
                <th width="200">Songs Of The Album</th>
            </tr>
            </thead>
            <?php
            
            $sql = "SELECT * FROM album ORDER BY artist_num ASC";
            $result =  mysqli_query($conn, $sql);
            
                    echo '<tbody>';
                    
                    while($row = mysqli_fetch_assoc($result)){
                        echo '<tr>';
                        echo "<td align='center'>".$row['album_name']."</td>";
                        echo "<td align='center'>".$row['artist_name']."</td>"; 
                        echo "<td align='center'>".$row['release_year']."</td>"; 
                        echo "<td align='center'>".$row['album_genre']."</td>";
                        echo "<td align='center'>";
                        echo '<a href="/new_albums.php?id='.$row['artist_num'].'">'."Song List".'</a>';
                        echo "</td>";
                        echo '</tr>';
                       
                    }
                    
                    echo '</tbody>';
                    echo '</table>';
            
            ?>
        </article>
        <article>
            <ul>
            <?php
            if(empty($_GET['id'])==false){
                echo '<table><tbody>';
                $sql = "SELECT song_name FROM  album INNER JOIN song ON album.album_name = song.album_name WHERE album.artist_num='".$_GET['id']."'";
                $result =  mysqli_query($conn, $sql);
                while($row = mysqli_fetch_assoc($result)){
                    echo "<li>".$row[song_name]."</li>";
                }
                
            }
            ?>
            </ul>
        </article>
        
        
    </body>
</html>