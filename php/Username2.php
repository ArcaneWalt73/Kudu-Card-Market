<?php
        $username = "s1965919";
        $password = "ICTPass1670";
        $database = "d1965919";
        $link = mysqli_connect('127.0.0.1', $username, $password, $database);
        if($session_sql = mysqli_query($link,"delete from loggedIn ")){
                echo 'Done';
        }
?>