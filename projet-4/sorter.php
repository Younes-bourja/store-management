
<?php  require_once 'control.php';       
include ('s.php');
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
</head>
<body class="bg-info">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js" integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" crossorigin="anonymous"></script>


<?php  include ('navbare.php');?>

<style>
th {
  position: -webkit-sticky;
  position: sticky;
  top: 0;
  z-index: 2;
}
</style>

<div class="container" style="position:absolute;right:70;top:70;" > 
<button  class="btn btn-md btn-outline-dark shadow-none " data-bs-toggle="modal" data-bs-target="#Modalprint" style="position:absolute;right:15px;top:0px;" ><i class='fas fa-print'></i></button>
   
<div class="modal" id="Modalprint">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">

      </div>

      <!-- Modal body -->
      <div class="modal-body">
        <form action="print.php" method="post">
        <div class="row text-center" aling="center">
       
             <input   name="etat" value="s" hidden> 
          <div class="col-6">
             Du : <input type="date" id="start1" class="  rounded-3 text-center border-info" name="date1"
       value=""
       min="2020-01-01" max="2030-12-31" required pattern="\d{4}-\d{2}-\d{2}"> </div>
        <div class="col-6">
        Au : <input type="date"  class="  rounded-3 text-center border-info" id="start2" name="date2"
       value=""
       min="2020-01-01" max="2030-12-31" required pattern="\d{4}-\d{2}-\d{2}">
        </div></div> 
        <div class="mb-3">
                                <label class="form-label required  ">Reference :</label>
                                <input autocomplete="off" type="text" class="form-control border-1 border-info"  id="myInput2" onkeyup="myFunctionfiltersearch2()"  name="reference"     placeholder="Réference" >
                                <ul id="myUL2" style="display:none;width:100%; height: 80px;overflow: auto;" class="list-group">
  <?php $i=1;   $resultsearch=mysqli_query($con,"SELECT * FROM reste ; ");
             while($rowsearch =$resultsearch ->fetch_assoc()): 
                $i=$i+1;  ?>
  <li ><div class="list-group-item list-group-item-action" onclick="ref2(<?php echo $i; ?>);" >
    <span  class=""  id="t<?php echo $i; ?>" > <?php echo $rowsearch['ref']; ?></span> 
    <div class="float-right"><?php echo $rowsearch['nproduit']; ?><div></div></li>
<?php endwhile; ?>
</ul>
                            </div>
      </div>

      <!-- Modal footer -->
      <div class="modal-footer">
      <button type="submit" class="btn btn-success" name="static">valider</button>
    </form>
        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
      </div>

    </div>
  </div>
</div>
<div style="position:absolute;width: 350;right:10;z-index: 1;" > <?php if(isset($message)){ echo $message;} ?></div>

 <div class="mt-5">
       <hr style="margin-bottom: 0px;"></div>
        <div  id="formSorter" >
        <div class="modal" id="myModal">
            <div class="modal-dialog ">
                <div class="modal-content ">
                    <div class="modal-header">
                        <h5 class="modal-title">Operation</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                    </div>
                    <div class="modal-body ">
    
  
                        <form action="" method="post">
                            <div class="mb-3">
                                <label class="form-label required">Reference produit:</label>
                                <input type="text" class="form-control border-1 border-info"name="sp"  required    value="Client">
                            </div>
                            <div class="mb-3">
                                <label class="form-label required  ">Reference :</label>
                                <input autocomplete="off" type="text" class="form-control border-1 border-info"  id="myInput" onkeyup="myFunctionfiltersearch1()"  name="ref"  required   placeholder="Réference" >
                                <ul id="myUL" style="display:none;width:100%; height: 80px;overflow: auto;" class="list-group">
  <?php $i=0;   $resultsearch=mysqli_query($con,"SELECT * FROM reste ; ");
             while($rowsearch =$resultsearch ->fetch_assoc()): 
                $i=$i+1;  ?>
  <li ><div class="list-group-item list-group-item-action" onclick="ref(<?php echo $i; ?>);" >
    <span  class=""  id="<?php echo $i; ?>" > <?php echo $rowsearch['ref']; ?></span> 
    <div class="float-right"><?php echo $rowsearch['nproduit']; ?><div></div></li>
<?php endwhile; ?>
</ul>
                            </div>
                             <div class="mb-3">
                                <label class="form-label required">Quantité :</label>
                                <input type="text" class="form-control border-1 border-info"  name="qtte"   required  placeholder="Qtté" >
                            </div>
                           
                       
                    
                    <div class="modal-footer">
                        <button  name="ajouter"  class="btn btn-success ">Ajouter</button>
                        <button type="submit" class="btn btn-danger" data-bs-dismiss="modal">Cancel</button>
                    </div>
                     </form></div>
                </div>
            </div>
        
        </div>
      
       </div>
        
   <br>
   <div class="row" >
        <br>
          
            <div class="col-12">
                <a type="button" class="btn btn-primary btn-ml-2 text-light" data-bs-toggle="modal" data-bs-target="#myModal">
                Nouveau operation</a>
    
 
                <div class="float-right"><div class="input-group rounded">
   <input type="text" onkeyup="filter()"  id="search" class="form-control rounded" placeholder="Filtrer">
  <button class="input-group-text border-1" id="search-addon">
    <i class="fas fa-search"></i>
  </button>
</div></div> 
       
        
      
<br> <br>
    
            <div class="row "  >
					<div class="col-sm-12 col-sm-10 ml-0 mr-0 " align="center">
          <table id="table"   class="table-sm table-hover table-bordered  bg-light" style="  display: block; max-height:450px;overflow-y: scroll;width:1100px;" >

							<thead>
								<tr >
								
                        <th  class="bg-dark text-light" style="width: 210px;">Client</th> 
                        <th  class="bg-dark text-light" style="width: 210px;">Réference</th>
                        <th  class="bg-dark text-light" style="width: 210px;">Produit</th>
                        <th  class="bg-dark text-light" style="width: 210px;">Quantité </th>                
                        <th  class="bg-dark text-light" style="width: 260px;">Date</th>
                      
								</tr>
							</thead>
					
							<tbody >
                              <?php 
                            $result=mysqli_query($con,"SELECT * FROM sorter  ORDER BY id DESC");
                             while($row =$result ->fetch_assoc()): 
                           ?>
                     <tr class="row100 body">
                        <td><?php echo $row['name']; ?></td>
                        <td ><?php echo $row['ref']; ?></td>
                        <td><?php echo $row['produit']; ?></td>
                        <td><?php echo $row['qtte']; ?></td>
                        <td ><?php echo $row['date']; ?></td>
                      </tr>
                      <?php endwhile ?>
                       
								
							</tbody>
						</table>
						
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
    function myFunctionfiltersearch1() {

var input, filter, ul, li, a, i, txtValue;
input = document.getElementById("myInput");
filter = input.value.toUpperCase();
ul = document.getElementById("myUL");
if (filter=="") {
        ul.style.display = "none";
    }else{ul.style.display = "block";}
li = ul.getElementsByTagName("li");
for (i = 0; i < li.length; i++) {
    a = li[i].getElementsByTagName("span")[0];
    txtValue = a.textContent || a.innerText;
    if (txtValue.toUpperCase().indexOf(filter) > -1) {
        li[i].style.display = "";
    } else {
        li[i].style.display = "none";
    }
}
}
function myFunctionfiltersearch2() {

var input, filter, ul, li, a, i, txtValue;
input = document.getElementById("myInput2");
filter = input.value.toUpperCase();
ul = document.getElementById("myUL2");
if (filter=="") {
        ul.style.display = "none";
    }else{ul.style.display = "block";}
li = ul.getElementsByTagName("li");
for (i = 0; i < li.length; i++) {
    a = li[i].getElementsByTagName("span")[0];
    txtValue = a.textContent || a.innerText;
    if (txtValue.toUpperCase().indexOf(filter) > -1) {
        li[i].style.display = "";
    } else {
        li[i].style.display = "none";
    }
}
}
function ref(i){
var ref = document.getElementById(i).innerText;

var input = document.getElementById("myInput");
document.getElementById("myInput").value = ref;
document.getElementById(i).style.color = "blue";
myFunctionfiltersearch1();

}
function ref2(i){
var ref = document.getElementById("t"+i).innerText;

var input = document.getElementById("myInput2");
document.getElementById("myInput2").value = ref;
document.getElementById("t"+i).style.color = "blue";
myFunctionfiltersearch2();

}
</script>

</html>