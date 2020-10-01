<?php
    $username = "s1965919";
    $password = "ICTPass1670";
    $database = "d1965919";
    $link = mysqli_connect('127.0.0.1', $username, $password, $database);
    $studentNo = mysqli_real_escape_string($link,$_POST["studentNumber"]);
    $marketId = mysqli_real_escape_string($link,$_POST["marketId"]);
    $rating = $_POST["rating"]; 
    $comment = mysqli_real_escape_string($link,$_POST["comment"]);
    $rate = mysqli_real_escape_string($link, $rating[0]);
    if ($result = mysqli_query($link, "insert into RATINGS values('$studentNo','$marketId','$rate','$comment');")){
	echo '<script>
        alert("Thank you for rating");
        window.location.href = "../history_page.html";
        </script>';
    }
    else{
        echo '<script>
        alert("Already rated the item");
        window.location.href = "../history_page.html";
        </script>';
    }
    mysqli_close($link);
?>
