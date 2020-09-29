<?php
    $username = "s1965919";
    $password = "ICTPass1670";
    $database = "d1965919";
    $link = mysqli_connect('127.0.0.1', $username, $password, $database);
    $studentNo = mysqli_real_escape_string($link,$_POST["studentNo"]);
    $marketId = mysqli_real_escape_string($link,$_POST["marketId"]);
    $rating = mysqli_real_escape_string($link,$_POST["rating"]); 
    $comment = mysqli_real_escape_string($link,$_POST["comment"]);
    $rate = $rating[0];
    if (!($result = mysqli_query($link, "insert into RATINGS values('$studentNo','$marketId','$rate','$comment');"))){
        $message = "already rated the item";
    }
    mysqli_close($link);
?>
<html>
   <body>
      <h1>
         <?php 
            echo json_encode($message);
         ?>
      </h1> 
   </body>
   
</html>

