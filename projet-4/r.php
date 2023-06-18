<?php 
 include ('connection.php');
 require_once 'control.php';  

  

     if(isset($_POST['ajouter'])){

      $Nref=$_POST['ref'];
      $Np=$_POST['produit'];
     
     $result=mysqli_query($con,"SELECT ref FROM reste WHERE ref='$Nref'");
          
        $row = mysqli_num_rows($result);
     if($row == 0){
       $message="<div class='alert alert-success'>
         <a  class='close' data-dismiss='alert' aria-label='close'>&times;</a>
         <strong> le référence $Nref est   ajouté avec succès  </strong>     </div>";
         
        $query=mysqli_query($con,"INSERT INTO reste(ref,nproduit,Qtotal) VALUE ('$Nref','$Np','0')");
        
     }
    else{
    
         $message="<div class='alert alert-danger'>
         <a  class='close' data-dismiss='alert' aria-label='close'>&times;</a>
         <strong> le référence $Nref est déjà  dans le stock !!! </strong>     </div>";
        

         }
         
}                       
 
 

?>
<script>
function filter() {
  var input, filter, table, tr, td, i, txtValue;
  input  = document.getElementById("search");
  filter = input.value.toUpperCase();
  table  = document.getElementById("table");
  tr     = table.getElementsByTagName("tr");
  for (i = 0; i < tr.length; i++) {
      td = tr[i].getElementsByTagName("td")[0];
      td1 = tr[i].getElementsByTagName("td")[1];
    if (td || td1) {
      txtValue = td.textContent || td.innerText ;
      txtValue1=td1.textContent || td.innerText;
      if (txtValue.toUpperCase().indexOf(filter) > -1 ||       txtValue1.toUpperCase().indexOf(filter) > -1) {
        tr[i].style.display = ""; } 
else {
        tr[i].style.display = "none";
      }
    }       
  }
}
</script>