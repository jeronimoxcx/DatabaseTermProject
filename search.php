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
            
            <h2>Search Review By...</h2>
            <form name="search" action="search.php" method="post">
            <table>
            <tr>
                <td align="center">
                <select name="search_option" size="1">
                  <option value="artist">Artist</option>
                  <option value="album">Album</option>
                  <option value="song">Song</option>
                  <option value="user_name">User Name</option>
                </select>
                <input type="text" name="keyword" value=<?php echo $keyword ?>><input type="submit" name="search_btn" value="Search">
                </td>
            </tr>
            </table>
            </form>
            
            
        <table border='1' align="center">
        <thead>
            <tr>
                <th width="100">User Name</th>
                <th width="250">Song Name/Album Name</th>
                <th width="200">Artist</th>
                <th width="20">Rank</th>
                <th width="700">Contents</th>
                <th width="100">Likes</th>
                <th width="100">Dislikes</th>
                
            </tr>
        </thead>
        <tbody>
            <?php
            $conn = mysqli_connect('localhost', 'root', '', 'musicreview');
            
            $search_option = $_POST[search_option];
            $keyword = $_POST[keyword];
            if(strlen($keyword)>0){
                switch($search_option){
                    case "artist":
                         $sql = "SELECT * FROM album_review WHERE artist_name LIKE '%$keyword%' ORDER BY a_review_num ASC";
                         $sql2 = "SELECT * FROM song_review WHERE artist_name LIKE '%$keyword%' ORDER BY s_review_num ASC";
                         $result2 =  mysqli_query($conn, $sql2);
                         break;
                    case "album":
                         $sql = "SELECT * FROM album_review WHERE album_name LIKE '%$keyword%' ORDER BY a_review_num ASC";
                         break;
                    case "song":
                         $sql = "SELECT * FROM song_review WHERE song_name LIKE '%$keyword%' ORDER BY s_review_num ASC";
                         break;
                    case "user_name":
                         $sql = "SELECT * FROM album_review WHERE nickname LIKE '%$keyword%' ORDER BY nickname ASC";
                         $sql2 = "SELECT * FROM song_review WHERE nickname LIKE '%$keyword%' ORDER BY nickname ASC";
                         $result2 =  mysqli_query($conn, $sql2);
                         
                    break;
                            
                }
            $result =  mysqli_query($conn, $sql);
            }
                if(strlen($keyword)>0 && $result==NULL){
                    echo "No result exists";
                }
                else{
                    
                    while($row = mysqli_fetch_assoc($result))
                    {
                        
                        echo "<td align='center'>".$row['nickname']."</td>";
                        if(empty($row['song_name'])==true){
                            echo "<td align='center'>".$row['album_name']."</td>";
                        }else{
                        echo "<td align='center'>".$row['song_name']."</td>";
                        }
                        echo "<td align='center'>".$row['artist_name']."</td>";
                        echo "<td align='center'>".$row['rank']."</td>";
                        echo "<td align='center'>".$row['contents']."</td>";
                        echo "<td align='center'>".$row['likes']."</td>";
                        echo "<td align='center'>".$row['dislike']."</td>";
                        
                        
                        echo "</tr>";
                    }
                    
                    
                    if($result2!= NULL){
                        while($row = mysqli_fetch_assoc($result2))
                    {
                        
                        echo "<tr>";
                        echo "<td align='center'>".$row['nickname']."</td>";
                        if(empty($row['song_name'])==true){
                            echo "<td align='center'>".$row['album_name']."</td>";
                        }else{
                        echo "<td align='center'>".$row['song_name']."</td>";
                        }
                        echo "<td align='center'>".$row['artist_name']."</td>";
                        echo "<td align='center'>".$row['rank']."</td>";
                        echo "<td align='center'>".$row['contents']."</td>"; 
                        echo "<td align='center'>".$row['likes']."</td>";
                        echo "<td align='center'>".$row['dislike']."</td>";
                        
                        echo "</tr>";
                    }
                    }
                }
              
 
              
            ?>
            </tbody>
            </table>
            <h2>Search For Artist Information...</h2>
            <form name="search" action="search.php" method="post">
            <table>
            <tr>
                <td align="center">
                Artist Name:
                <input type="text" name="keyword2_1" >
                Label Name:
                <input type="text" name="keyword2_2" >
                Album Name:
                <input type="text" name="keyword2_3" ><input type="submit" name="search_btn2" value="Search"><br>
                </td>
            </tr>
            </table>
            </form>
            <table border='1' align="center">
        <thead>
            <tr>
                <th width="200">Artist Name</th>
                <th width="150">Nationality</th>
                <th width="100">Debut Year</th>
                <th width="200">Record Label</th>
                <th width="200">Album Name</th>
                <th width="200">Album Genre</th>
                
            </tr>
        </thead>
        <tbody>
            <?php
            $conn = mysqli_connect('localhost', 'root', '', 'musicreview');
            
            
            $artist_name = $_POST[keyword2_1];
            $label_name = $_POST[keyword2_2];
            $album_name = $_POST[keyword2_3];
            
            if(strlen($artist_name)==0 && strlen($label_name)==0&&strlen($album_name)==0){
            }
            else{
            if(strlen($artist_name)>0){
                if(strlen($label_name)>0){
                    if(strlen($album_name)>0){
                    $sql3 = "SELECT * FROM artist INNER JOIN album ON artist.artist_num = album.artist_num WHERE artist.artist_name LIKE '%$artist_name%' AND artist.record_label LIKE '%$label_name%' AND album.album_name LIKE '%$album_name%'";    
                    }
                    else{
                    $sql3 = "SELECT * FROM artist INNER JOIN album ON artist.artist_num = album.artist_num WHERE artist.artist_name LIKE '%$artist_name%' AND artist.record_label LIKE '%$label_name%'";    
                    }        
                }
                else if(strlen($album_name)>0){
                $sql3 = "SELECT * FROM artist INNER JOIN album ON artist.artist_num = album.artist_num WHERE artist.artist_name LIKE '%$artist_name%' AND album.album_name LIKE '%$album_name%'";    
                }
                else{
                $sql3 = "SELECT * FROM artist INNER JOIN album ON artist.artist_num = album.artist_num WHERE artist.artist_name LIKE '%$artist_name%'";    
                }            
            }
            else if(strlen($label_name)>0){
             if(strlen($album_name)>0){
                $sql3 = "SELECT * FROM artist INNER JOIN album ON artist.artist_num = album.artist_num WHERE artist.record_label LIKE '%$label_name%' AND album.album_name LIKE '%$album_name%'";    
                }
                else{
                $sql = "SELECT * FROM artist INNER JOIN album ON artist.artist_num = album.artist_num WHERE artist.record_label LIKE '%$label_name%'";    
                }    
            }
            else if(strlen($album_name)>0){
                $sql3 = "SELECT * FROM artist INNER JOIN album ON artist.artist_num = album.artist_num WHERE album.album_name LIKE '%$album_name%'";
            }
            $result3 =  mysqli_query($conn, $sql3);
            
                if((strlen($artist_name)>0 ||strlen($label_name)>0||strlen($album_name)>0)&& $result3==NULL){
                    echo "No result exists";
                }
                else{
                    
                    while($row = mysqli_fetch_assoc($result3))
                    {
                        
                        echo "<td align='center'>".$row['artist_name']."</td>";
                       
                        echo "<td align='center'>".$row['nationality']."</td>";
                        echo "<td align='center'>".$row['debut_year']."</td>";
                        echo "<td align='center'>".$row['record_label']."</td>";
                        echo "<td align='center'>".$row['album_name']."</td>";
                        echo "<td align='center'>".$row['album_genre']."</td>";
                        
                        
                        echo "</tr>";
                    }
                }
                }
                ?>
                </tbody>
                </table>
        </article>
        
        
        
    </body>
</html>