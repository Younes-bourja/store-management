
<?php require('r.php');
require_once 'control.php'; 

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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>    <title>Produit sortie</title>
    <title>Stock</title>
</head>
<body class="bg-info">
<?php  include ('navbare.php');?>

<?php   
        $result=mysqli_query($con,"SELECT MAX(id) FROM reste");
  while($row =$result ->fetch_assoc()): 
?>
   
<div class="container" style="position:absolute;right:70;top:60;">
<button   class="btn btn-md btn-outline-dark shadow-none " onClick="imprimer('sectionAimprimer')" style="position:absolute;right:15px;top:25px;" ><i class='fas fa-print'>Print</i></button>


<div class="mt-4" >
            <h5>Nombre des produits : <?php echo $row['MAX(id)']; ?></h5>
        </div> 
        <?php endwhile ?>
   
<hr>
        <div >
        <centre><div style="position:absolute;width: 350;right:-60px;z-index: 1;top:10px"> <?php if(isset($message)){echo $message;} ?></div> </centre>
      
        <div >
      <br> 
     
      
       </form></div>      
        </div>
        <div class="modal" id="myModal">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Ajouter Nouveau Produit</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                    </div>
                    <div class="modal-body">
    
  
                        <form action="" method="post">
                            <div class="mb-3">
                                <label class="form-label required">Reference produit:</label>
                                <input type="text" class="form-control  border-1 border-info"  name="ref"  required   placeholder="Réference" >                            </div>
                            <div class="mb-3">
                                <label class="form-label required">Produit :</label>
                                <input type="text" class="form-control border-1 border-info  "  name="produit"   required  placeholder="Produit" >
                            </div>
                           
                       
                    
                    <div class="modal-footer">
                        <button  name="ajouter" onclick="control()" class="btn btn-success ">Ajouter</button>
                        <button type="submit" class="btn btn-danger" data-bs-dismiss="modal">Cancel</button>
                    </div>
                     </form></div>
                </div>
            </div>
        </div>

    
   <div class="row" >
       
          
            <div class="col-12" >
            <button type="button" class="btn btn-primary float-left" data-bs-toggle="modal" data-bs-target="#myModal"> Nouveau Produit</button> 
                <div class="float-right">
                  <div class="input-group ">
   <input type="text" onkeyup="filter()"  id="search" class="form-control shadow-none" placeholder="Filtrer">
  <button class="input-group-text border-1" id="search-addon">
    <i class="fas fa-search"></i>
  </button>
</div></div> </div></div> 
    
    <div  align="center"  id='sectionAimprimer'> 
    <br>    <br>    <br>   <br>
					<div  align="center">

       
                    <table id="table"   class="table-sm table-hover table-bordered  bg-light" style="  display: block; max-height:500px;overflow-y:scroll ;width:800px;" >
								
                    <thead>
                                <tr><th  colspan="4" class="text-center" align="center" style="width: 800px;">
                                Produits existe dans le stock
            </th><tr
								<tr >
								<th class="bg-dark text-light" style="width: 220px;"> Réference</th>
									<th class="bg-dark text-light" style="width: 260px;">Produit</th>
									<th class="bg-dark text-light" style="width: 220px;">Quantité </th>
									</tr>
						
							<tbody>
                            <?php 
                            $result=mysqli_query($con,"SELECT * FROM reste ORDER BY id DESC");
                             while($row =$result ->fetch_assoc()): 
                           ?>
								<tr class="row100 body">
									<td class="cell100 column1"><?php echo $row['ref']; ?></td>
									<td class="cell100 column2"><?php echo $row['nproduit']; ?></td>
									<td class="cell100 column3"><?php echo $row['Qtotal']; ?></td>
								</tr>
                                <?php endwhile ?>
							</tbody>
						</table>
					</div>
          
             
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
    document.getElementById("table").style="overflow-y:;";

      var printContents = document.getElementById(divName).innerHTML; 
   
   var originalContents = document.body.innerHTML;      
   document.body.innerHTML = printContents;     
   window.print();     
   document.body.innerHTML = originalContents;
   document.getElementById("table").style="display: block; max-height:500px;overflow-y:scroll ;width:800px;";


   }

</script>
</html>