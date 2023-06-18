<?php include ('connection.php');
 require_once 'control.php';     
 
  if(isset($_POST['ajouter'])){
    $SP=$_POST['sp'];
    $Nref=$_POST['ref'];
    $qtte=$_POST['qtte'];

if($Nref!== "" && $SP !==""){

    $result=mysqli_query($con,"SELECT ref FROM reste WHERE ref='$Nref'");
    
   
        $row = mysqli_num_rows($result);
if($row !== 0){
      $qtl=mysqli_query($con,"SELECT qtotal FROM reste WHERE ref='$Nref'");
      $row1 = mysqli_fetch_row($qtl);
      
        
        $test = $row1[0];
        if($test-$qtte>0 ){
        $query=mysqli_query($con,"INSERT INTO sorter(name,ref,produit,qtte) VALUES('$SP','$Nref',(SELECT reste.nproduit FROM reste WHERE reste.ref='$Nref'),'$qtte')");
        $query1=mysqli_query($con,"UPDATE  reste SET qtotal =qtotal- $qtte  WHERE ref='$Nref'");        
       $message="<div class='alert alert-success'>
         <a  class='close' data-dismiss='alert' aria-label='close'>&times;</a>
         <strong>L'operation s'est terminer avec succés   </strong>   </div>";
                  
         }
                 if($test-$qtte<0 ){ 
                      $message="<div class='alert alert-info'>
         <a  class='close' data-dismiss='alert' aria-label='close'>&times;</a>
         <strong> la quatité est insuffisante !!!   </strong><br>La quantité  reste dans le stock est : $test   </div>";
                  
                         }    
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
      td = tr[i].getElementsByTagName("td")[1];

    td1 = tr[i].getElementsByTagName("td")[2];
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