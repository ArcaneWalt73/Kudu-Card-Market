<?php
        $no = $_GET['studNo'];
        $username = "s1965919";
        $password = "ICTPass1670";
        $database = "d1965919";
        $link = mysqli_connect('127.0.0.1', $username, $password, $database);
        if(mysqli_query($link,"insert into loggedIn values('$no')")){
                echo "Done";
        }
?>