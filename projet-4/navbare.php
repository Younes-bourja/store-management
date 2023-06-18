<?php
$slt1=$slt2=$slt3="";
if(isset($_GET['etat'])){ 
    $etat=$_GET['etat'];
if($etat=="entrer"){$slt1="active";}
if($etat=="sorter"){$slt2="active";}
if($etat=="reste"){$slt3="active";}
}else{$slt2="active";}
?>
<!--Main Navigation-->
<header>
  <!-- Sidebar -->
  <nav id="sidebarMenu" class="collapse d-lg-block sidebar collapse bg-white">
    <div class="position-sticky">
      <div class="list-group list-group-flush mx-3 mt-4">
      <a href="sorter.php?etat=sorter" class="list-group-item list-group-item-action py-2 ripple <?php echo $slt2; ?>">
          <i class="fas fa-chart-area fa-fw me-3 p-3"></i><span>Sortée</span>
        </a>
        <a
        href="entrer.php?etat=entrer"
          class="list-group-item list-group-item-action py-2 ripple <?php echo $slt1; ?>"
          aria-current="true"
        >
          <i class="fas fa-chart-area fa-fw  me-3 p-3"></i><span>Entrée</span>
        </a>
     
        <a  href="reste.php?etat=reste" class="list-group-item list-group-item-action py-2 ripple <?php echo $slt3; ?>"
          ><i class="fas fa-chart-area fa-fw me-3 p-3"></i><span>Reste</span></a
        >
        <button       data-bs-toggle="modal" data-bs-target="#Modalprintprd"class="list-group-item list-group-item-action mt-3 ripple bg-secondary text-light" >
        <i class="fas fa-chart-area fa-fw me-2 p-3" ></i>Details Product
      </button>

      
       
      </div>
    </div>
  </nav>
  <!-- Sidebar -->

  <!-- Navbar -->
  <nav id="main-navbar" class="navbar navbar-expand-lg navbar-light bg-white fixed-top">
  <a class="navbar-brand" href="#"> <i><?php echo $_SESSION['id']; ?></i> </a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNavAltMarkup"><br>
    <div class="navbar-nav" style="position:absolute;right:30;" >
         <li  >
           <a href="deconnexion.php" class="btn btn-info btn-block text-center " >Déconnexion</a> </li>
           
    
          
       
    </div>
  </div>
   
    <!-- Container wrapper -->
  </nav>
  <!-- Navbar -->
</header>
<!--Main Navigation-->

<!--Main layout-->
<main style="margin-top: 58px;">
  <div class="container pt-4">
    
  </div>
</main>
<!--Main layout-->


<!--Modal reference etat-->
<div class="modal" id="Modalprintprd">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">

      </div>

      <!-- Modal body -->
      <div class="modal-body">
        <form action="details product.php" method="post">
        <div class="row text-center" aling="center">
       
             <input   name="etat" value="r" hidden> 
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
                                <input autocomplete="off" type="text" class="form-control border-1 border-info"  id="myInput3" onkeyup="myFunctionfiltersearch3()"  name="reference"     placeholder="Réference" >
                                <ul id="myUL3" style="display:none;width:100%; height: 80px;overflow: auto;" class="list-group">
  <?php $i=1;   $resultsearch=mysqli_query($con,"SELECT * FROM reste ; ");
             while($rowsearch =$resultsearch ->fetch_assoc()): 
                $i=$i+1;  ?>
  <li ><div class="list-group-item list-group-item-action" onclick="ref3(<?php echo $i; ?>);" >
    <span  class=""  id="l<?php echo $i; ?>" > <?php echo $rowsearch['ref']; ?></span> 
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
<style>
    body {
  background-color: #fbfbfb;
}
@media (min-width: 991.98px) {
  main {
    padding-left: 240px;
  }
}

/* Sidebar */
.sidebar {
  position: fixed;
  top: 0;
  bottom: 0;
  left: 0;
  padding: 58px 0 0; /* Height of navbar */
  box-shadow: 0 2px 5px 0 rgb(0 0 0 / 5%), 0 2px 10px 0 rgb(0 0 0 / 5%);
  width: 240px;
  z-index: 600;
}

@media (max-width: 991.98px) {
  .sidebar {
    width: 100%;
  }
}
.sidebar .active {
  border-radius: 5px;
  box-shadow: 0 2px 5px 0 rgb(0 0 0 / 16%), 0 2px 10px 0 rgb(0 0 0 / 12%);
}

.sidebar-sticky {
  position: relative;
  top: 0;
  height: calc(100vh - 48px);
  padding-top: 0.5rem;
  overflow-x: hidden;
  overflow-y: auto; /* Scrollable contents if viewport is shorter than content. */
}
</style>
<script>
  function myFunctionfiltersearch3() {

var input, filter, ul, li, a, i, txtValue;
input = document.getElementById("myInput3");
filter = input.value.toUpperCase();
ul = document.getElementById("myUL3");
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

function ref3(i){
var ref = document.getElementById("l"+i).innerText;

var input = document.getElementById("myInput3");
document.getElementById("myInput3").value = ref;
document.getElementById("l"+i).style.color = "blue";
myFunctionfiltersearch3();

}
</script>