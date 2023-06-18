<?php  include('login_core.php');  ?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <title>Login</title>
</head>
<body>

<section class="vh-100" style="background-color:  #6f42c1;">
<table class="table table-bordered bg-light w-25 table-hover" style="position:absolute;left:20px;top:15px">
  <thead class="bg-info"><tr><th> Utilisateur</th><th>mot de passe</th></tr></thead>
<tbody><tr><th>admin</th><th>admin</th></tr></tbody></table>
  <div class="container py-5 h-100">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col col-xl-10">
        <div class="card" style="border-radius: 1rem;">
          <div class="row g-0">
            
            <div class="col-md-12 col-lg-12 d-flex align-items-center">
              <div class="card-body p-4 p-lg-5 text-black">

                <form method="POST"  >

                  <div class="d-flex align-items-center mb-3 pb-1">
                    <i class="fas " ></i>
                    <span class="h1 fw-bold mb-0" style="color: #ff6219;">BOUYOU G-Stock</span>
                  </div>


                  <div class="form-outline mb-4">
                    <input type="text" name="email" class="form-control form-control-lg" placeholder="Utilisateur" />
                  </div>

                  <div class="form-outline mb-4">
                    <input type="password" name="password" class="form-control form-control-lg" placeholder="Mot de passe " />
                  </div>
                  <div class="form-outline mb-4">
                        <select name="role">
             <option value="admin">Admin</option>
             <option value="spectateur">Spectateur</option>
         </select> </div>
                  <div class="pt-1 mb-4">
                    <button class="btn  btn-lg btn-block " style="background: #6f42c1;color: white;" name="action" type="submit"><span class="glyphicon glyphicon-log-in"></span>Connecter</button>
                  </div>

                 
                 
                </form>

              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
</body>
</html>


























