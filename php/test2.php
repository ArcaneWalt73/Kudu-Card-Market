<?php

  function saySomething($link)
  { 
     $sql = "select words from DUMMY_T where id=0";
     $result = $link->query( $sql );
     $data = result( $result, 0 );
     return $data;     
  }

  function goodbye()
  {
    return "success"; 
  }
