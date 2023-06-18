<?php
session_start();


  $sessionId =$_SESSION['id'];
  
  if ( !$sessionId  ) { 
      header( "location:login.php" );
    
      }
      
  
  if($sessionId == "spectateur"){
      echo '<style>#formSorter { display:none;}</style>';
      echo '<style>#formEntrer { display:none;}</style>';
      echo '<style>#formReste { display:none;}</style>';




  
  }
  













?>