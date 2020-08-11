<?php
   include('session.php');
?>
<html>
   
   <head>
      <title>Welcome </title>
   </head>
   
   <body>
      <h1>
         Welcome 
         <?php 
            echo $login_session; //this variable is declared in the session.php file.
         ?>
      </h1> 
   </body>
   
</html>
