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
            <form action="/write_s_process.php" method="post">
                <p>Song Name: <input type='text' name="song_name"></p>
                <p>Artist Name: <input type='text' name="artist_name"></p>
                <p>Your Rank: <input type='text' name="rank"></p>
                <p>Review: <textarea name="description"></textarea></p>
                <input type="submit" name="s_wrtie_btn">
           </form>
        </article>
        
        
        
    </body>
</html>