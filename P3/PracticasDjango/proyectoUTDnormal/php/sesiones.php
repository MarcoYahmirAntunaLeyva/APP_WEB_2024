<?php
  session_start();

  if (!isset($_SESSION['user'])) 
  {
		header("location: login.php");
	}
  else 
  {
    $us=$_SESSION['user'];
    $privilegio=$_SESSION['privilegio'];
  }

?>