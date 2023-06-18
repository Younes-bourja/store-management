
<?php  require_once 'control.php';       
include ('s.php');

$date1="";$date2="";$refs="";$sqlref="";$etat="";
if(isset($_POST['static'])){
    $date1=$_POST["date1"]." "."00:00:00";
    $date2=$_POST["date2"]." "."23:59:59";
    $refs =$_POST["reference"];
    $etat=$_POST["etat"];
    if($etat=="s"){ $etat="sorter";$type="Sortir";$tt="s";}
    if($etat=="e"){ $etat="entrer";$type="Entrée";$tt="e";}
    if($etat=="r"){ $etat="reste";}
    if($refs!=""){ $sqlref="AND ref ='".$refs."'";}
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
    <title>Type d'opérations : <?php echo $type; ?></title>   
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
<div class="row "   >
					<div class="ml-5" align="left">
          <table id="table"   class="table-sm table-hover table-bordered  bg-light" style="  display: block; width:800px;" >
							<thead>
              <tr><th  colspan="4" align="center" style="width: 800px;">
              <?php if($tt=="s" ):?><h6>Produits sortir en stock</h6>  <?php endif?>
                <?php if($tt=="e" ):?> <h6>Produits  entrée en stock</h6> <?php endif?>
            </th><tr>
								<tr>
                        <th  class="bg-dark text-light" style="width: 160px;">Réference</th>
                        <th  class="bg-dark text-light" style="width: 160px;">Produit</th>
                        <th  class="bg-dark text-light" style="width: 160px;">Quantité </th>
                        <th  class="bg-dark text-light" style="width: 200px;">Nombre d'operations </th>                
                       	</tr>
							</thead>
					
							<tbody >
                              <?php  $count=0;
                             
                            $result=mysqli_query($con,"SELECT ref,produit,SUM(qtte),count(*) FROM $etat WHERE date  BETWEEN  '$date1' AND  '$date2' $sqlref  GROUP BY ref");
                             while($row =$result ->fetch_assoc()): 
                           ?>
                     <tr class="row100 body">
                        <td ><?php echo $row['ref']; ?></td>
                        <td><?php echo $row['produit']; ?></td>
                        <td><?php echo $row['SUM(qtte)']; ?></td> 
                        <td><?php echo $row['count(*)']; ?></td>                      
                      </tr>

                      <?php  $count= $count+$row['count(*)'];
                      endwhile ?>
                       <tr class="row100 body">
                        <td colspan="3" class="" align="center" >Total opérations</td> <td> <?php  echo $count ?></td>
                        </tr>
                             </tbody>
						</table> <br>
                        </div>
    
 </div>
   <?php if($tt=="e" || $tt=="s" ):?>
            <div class="row ">
					<div  align="center">
          <table id="table"   class="table-sm table-hover table-bordered table-responsive bg-light" style="  display: block; width: 800px;" >

							<thead>
								<tr><th  colspan="5 " class="text-center" align="center" style="height: 50px;;width: 800px;">
                Les opérations

              </th></tr >
								<tr >
                                <?php if($tt=="s" ):?>  <th  class="bg-dark text-light" style="width: 160px;">Client</th> <?php endif?>
                        <th  class="bg-dark text-light" >Réference</th>
                        <th  class="bg-dark text-light">Produit</th>
                        <th  class="bg-dark text-light">Quantité </th>                
                        <th  class="bg-dark text-light" >Date</th>
                      
								</tr>
							</thead>
					
							<tbody >
                              <?php
                             
                            $result=mysqli_query($con,"SELECT * FROM $etat  WHERE date  BETWEEN  '$date1' AND  '$date2' $sqlref  ORDER BY id DESC");
                             while($row =$result ->fetch_assoc()): 
                           ?>
                     <tr class="">
                     <?php if($tt=="s" ):?>  <td><?php echo $row['name']; ?></td> <?php endif?>
                        <td ><?php echo $row['ref']; ?></td>
                        <td><?php echo $row['produit']; ?></td>
                        <td><?php echo $row['qtte']; ?></td>
                        <td ><?php echo $row['date']; ?></td>
                      </tr>
                      <?php endwhile ?>
                       
								
							</tbody>
						</table><br>
						
                        </div>
               
       
       
 </div>
 <?php endif ?>   
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