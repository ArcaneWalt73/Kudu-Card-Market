<?php

  function saySomething($link)
  { 
     $sql = "select words from DUMMY_T where id=0";
     $result = mysqli_query( $link, $sql );
     $row = $result->mysqli_fetch_assoc();
     
     return $row;     
  }

  function goodbye()
  {
    return "success"; 
  }
