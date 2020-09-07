<?php

  function saySomething($link)
  { 
     $sql = "select words from DUMMY_T where id=0";
     $result = mysql_query( $sql ) or die( mysql_error() );
     $data = mysql_result( $result, 0 );
     return $data;     
  }

  function goodbye()
  {
    return "success"; 
  }
