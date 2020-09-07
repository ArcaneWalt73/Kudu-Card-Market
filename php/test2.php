<?php

  /*function saySomething($link)
  { 
     #$sql = "select words from DUMMY_T where id=0";
     #$result = mysqli_query( $link, $sql );
     #$row = $result->mysqli_fetch_assoc();

      $output = array();
      if ($mResult = mysqli_query($link, "select * from DUMMY_T;")) 
      {
				while ($row = $mResult->fetch_assoc())
        {
					$output = $row;
        }
      }
    
    
     return json_encode($output);     
  }*/

  function goodbye()
  {
    return "success"; 
  }
