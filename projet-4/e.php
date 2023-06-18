<?php include ('connection.php');
 require_once 'control.php';     
 if(isset($_POST['ajouter'])){

$Nref=$_POST['reference'];
$qtte=$_POST['qtte'];
if($Nref!== "" && $qtte >0){
    $result=mysqli_query($con,"SELECT ref FROM reste WHERE ref='$Nref'");
    
   
        $row = mysqli_num_rows($result);
     if($row !== 0){
        $query=mysqli_query($con,"INSERT INTO entrer(ref,produit,qtte) VALUES('$Nref',(SELECT reste.nproduit FROM reste WHERE reste.ref='$Nref'),'$qtte')");
        $query1=mysqli_query($con,"UPDATE  reste SET qtotal =qtotal+ $qtte  WHERE ref='$Nref'");        
        $message="<div class='alert alert-success'>
        <a  class='close' data-dismiss='alert' aria-label='close'>&times;</a>
        <strong>L'operation s'est terminer avec succés   </strong>   </div>";
    }
     if($row == 0){ 

        $message="<div class='alert alert-danger'>
         <a  class='close' data-dismiss='alert' aria-label='close'>&times;</a>
         <strong> le référence $Nref n'existé pas dans le stock !!!   </strong>   </div>"; 
     } 


        
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