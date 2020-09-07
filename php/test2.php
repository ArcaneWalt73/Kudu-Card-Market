<?php

  function saySomething($link)
  { 
     #$sql = "select words from DUMMY_T where id=0";
     #$result = mysqli_query( $link, $sql );
     #$row = $result->mysqli_fetch_assoc();

      $output = array();
      if ($mResult = mysqli_query($link, "select words from DUMMY_T where id=0;")) 
      {
				while ($row = $mResult->fetch_assoc())
        {
					$output = $row;
        }
      }
    
    
     return $output[0];     
  }

  function goodbye()
  {
    return "success"; 
  }
