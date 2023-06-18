
<?php  require_once 'control.php';       
include ('s.php');

$date1="";$date2="";$refs="";$sqlref="";$sqlref2="";$etat="";
if(isset($_POST['static'])){
    $date1=$_POST["date1"]." "."00:00:00";
    $date2=$_POST["date2"]." "."23:59:59";
    $refs =$_POST["reference"];
    $etat=$_POST["etat"];
    if($etat=="r"){ $etat="reste";}
    if($refs!=""){ $sqlref="AND ref ='".$refs."'"; $sqlref2="WHERE ref ='".$refs."'";}else{
        $sqlref2="WHERE reste.ref IN (SELECT sorter.ref FROM sorter WHERE sorter.date  BETWEEN  '$date1' AND  '$date2') 
        OR reste.ref IN (SELECT entrer.ref FROM entrer WHERE entrer.date  BETWEEN  '$date1' AND  '$date2')";  
    }
}



?>

<!DOCTYPE html>
<html lang="en">
<head>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script> 
    <title>details product</title>   
</head>
<body class="" style="background-color:silver;">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js" integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" crossorigin="anonymous"></script>




<style>
th {
  position: -webkit-sticky;
  position: sticky;
  top: 0;
  z-index: 2;
}
</style>
<br> <br>
<button  class="btn btn-md btn-outline-dark shadow-none p-3"  onClick="imprimer('sectionAimprimer')"  style="position:absolute;right:20px;top:20px;" ><i class='fas fa-print'> Print</i></button>
<a name="" id="" class="btn btn-outline-light p-2"  href=javascript:history.go(-1) style="position:absolute;left:20px;top:20px;">Retour</a>
<div class="container" id='sectionAimprimer' > 
 

<br> <br> <div class="row text-center" align="center">
          <div class="col-6 text-left"">
<h6>Du : <?php echo $_POST["date1"]; ?> </h6>
</div>
<div class="col-6 text-left">
<h6>Au : <?php echo $_POST["date2"]; ?></h6> </div>
<hr><br><br>

            <div class="row ">
					<div  align="center">
          <table id="table"   class="table-sm table-hover table-bordered table-responsive bg-light" style="  display: block; width: 800px;" >

							<thead>
								<tr><th  colspan="5 " class="text-center" align="center" style="height: 50px;;width: 800px;">
               Détails produit

              </th></tr >
								<tr >
                        <th  class="bg-dark text-light" >Réference</th>
                        <th  class="bg-dark text-light" >Produit</th>
                        <th  class="bg-dark text-light" >Sortir</th>
                        <th  class="bg-dark text-light" >Entrée</th>
                        <th  class="bg-dark text-light" >En stock</th>
								</tr>
							</thead>
					
							<tbody >
                              <?php
                             
                     $result=mysqli_query($con,"SELECT reste.ref,nproduit,Qtotal FROM  reste  $sqlref2      GROUP BY reste.ref");
                             while($row =$result ->fetch_assoc()):
                                $entrerref =""; 
                         $entrerref =$row['ref'];  ?>
                     <tr class="">
                        <td ><?php echo $row['ref']; ?></td>
                        <td ><?php echo $row['nproduit']; ?></td>
                        <?php  
                             
                             $result2=mysqli_query($con,"SELECT SUM(qtte) FROM sorter WHERE date  BETWEEN  '$date1' AND  '$date2' AND ref='$entrerref' $sqlref  GROUP BY ref");
                             $rownmbr = mysqli_num_rows($result2);
                            
                       $row2 =$result2 ->fetch_assoc() ?>
                         <?php  if($rownmbr):?> <td ><?php echo $row2['SUM(qtte)']; ?></td><?php endif ?>  
                      <?php  if(!$rownmbr):?> <td >0</td> <?php endif ?>

                        <?php  
                             
                             $result3=mysqli_query($con,"SELECT SUM(qtte) FROM entrer WHERE date  BETWEEN  '$date1' AND  '$date2' AND ref='$entrerref' $sqlref  GROUP BY ref");
                             $rownmbr1 = mysqli_num_rows($result3);
                            
                       $row3 =$result3 ->fetch_assoc() ?>
                        <?php  if($rownmbr1):?> <td ><?php echo $row3['SUM(qtte)']; ?></td><?php endif ?>  
                      <?php  if(!$rownmbr1):?> <td >0</td> <?php endif ?>
                        <td ><?php echo $row['Qtotal']; ?></td>
                      </tr>
                      <?php endwhile ?>
                       
								
							</tbody>
						</table><br>
                    
                   

					 <br>
                        </div>
    
 </div>
  
    </div>
</div>

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css"
                    integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO"
                    crossorigin="anonymous">
                <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
                    integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
                    crossorigin="anonymous"></script>
                <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.3/dist/umd/popper.min.js"
                    integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49"
                    crossorigin="anonymous"></script>
                <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js"
                    integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy"
                    crossorigin="anonymous"></script>                       
	

</body>
<script>




  
function imprimer(divName) {
      var printContents = document.getElementById(divName).innerHTML;    
   var originalContents = document.body.innerHTML;      
   document.body.innerHTML = printContents;     
   window.print();     
   document.body.innerHTML = originalContents;
   }

</script>

</html>