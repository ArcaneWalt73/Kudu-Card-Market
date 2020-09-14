<?php
        $username = "s1965919";
        $password = "ICTPass1670";
        $database = "d1965919";
        $link = mysqli_connect('127.0.0.1', $username, $password, $database);
        if($session_sql = mysqli_query($link,"select* from loggedIn ")){
                $row = mysqli_fetch_array($session_sql,MYSQLI_ASSOC);
                echo json_encode($row);
        }
?>