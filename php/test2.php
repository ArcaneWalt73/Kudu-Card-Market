<?php

  function saySomething($link)
  { 
     $sql = "select words from DUMMY_T where id=0";
     return $link->query($sql);     
  }

  function goodbye()
  {
    return "success"; 
  }
