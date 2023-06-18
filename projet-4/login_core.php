<?php 
session_start();

include ('connection.php');






if ( isset($_POST['action'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];
    $role = $_POST['role'];

   
	
	$result=mysqli_query($con, "SELECT * FROM mumbers WHERE username='$email' AND password='$password' AND role='$role' ");
	

    $row=mysqli_num_rows($result);
		if( $row !== 0) {
		
			$member = mysqli_fetch_assoc($result);
			$_SESSION['id'] = $member['role'];
			
		
			header("location: sorter.php");
		
            }  else {
                
                $message="<div class='alert alert-info'>
         <a  class='close' data-dismiss='alert' aria-label='close'>&times;</a>
         <strong> L'utilisateur  ou le mot de passe est incorrect !!!  </strong>     </div>";
         
             }

    
 




}

?>