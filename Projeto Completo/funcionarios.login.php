<!-- ADMIN LOGIN -->
<!-- Dev: Fabricio Oliveira Template: FashionStore -->

<!DOCTYPE html>
<html>

    <?php 
        
        //include login admin
        include "php/logins/func/login.php"; 
  
        // include head
        include "php/includes/admin/head.php"; 
    
    ?>
    
    

<body class="bg-gray">

  
    <div class="container">
    
        <div class="row justify-content-center py-5 mt-5">
        
            <div class="col-lg-4 col-md-6 col-sm-10 col-12">
            
            
                <div class="card card-form">
                
                    <form action=""  method="post">
        
                        <h5 class="form-title">Funcionarios Login</h5>
                        
                        <div class="form-group">
                            
                            <label for="exampleInputEmail1">Email address</label>
    
                            <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email" name="email">
  
                            <label for="exampleInputPassword1" class="mt-3">Password</label>
                            <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password" name="senha">
                            
                            <button type="submit" class="btn btn-primary mt-3 mx-auto" name="BtnLogin">Login</button>
                        </div>
  
                        
                        
                    </form>
                
                </div>
                
            
            </div>
        
        </div>
    
    </div>
   
    
</body>    

</html>