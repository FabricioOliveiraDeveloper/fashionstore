<!-- SIDEBAR -->
<!-- Dev: Fabricio Oliveira Template: FashionStore -->


    <nav class="navbar navbar-expand-lg bg-dark navbar-dark sticky-top" id="toggle">

        <div class="container">
        
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    
                <span class="navbar-toggler-icon"></span>
  
            </button>

    
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
            
                <ul class="navbar-nav">
        
                    <!-- ITENS -->
                    <li class="nav-item dropdown py-1 px-3">
                        
                        <a class="nav-link" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fas fa-clipboard py-2 px-2"></i> 
                            Itens
                        </a>
                        
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                         
                            <a class="dropdown-item" href="dashboard.php">
                                <i class="fas fa-exclamation-circle py-2 px-2"></i> 
                                Pendentes
                            </a>
                          
                            <a class="dropdown-item" href="dashboard.n.pendentes.php">
                                <i class="fas fa-check-circle py-2 px-2"></i>
                                Não Pendentes
                            </a>
   
                        </div>
                        
                    </li>
                    <!-- .ITENS -->
                    
                    
                    <!-- PRODUTOS -->                    
                    <li class="nav-item dropdown py-1 px-3">
                        
                        <a class="nav-link" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fas fa-file py-2 px-2"></i>
                            Produtos
                        </a>
                        
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                         
                            <a class="dropdown-item" href="dashboard.product.post.php">
                                <i class="fas fa-cart-plus py-2 px-2"></i> 
                                Upload
                            </a>
                          
                            <a class="dropdown-item" href="dashboard.product.list.php">
                               <i class="fas fa-edit py-2 px-2"></i>
                                Listagem e Edição
                            </a>
   
                        </div>
                        
                    </li>
                    <!-- .PRODUTOS --> 
                    
                    
                    <li class="nav-item dropdown py-1 px-3">
                        <a class="nav-link" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fas fa-users py-2 px-2"></i>
                        Clientes
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                         
                            <a class="dropdown-item" href="loja.cadastro.php" target="_blank">
                                <i class="fas fa-user-plus py-2 px-2 side-icon side-icon-left"></i>
                                Cadastrar
                            </a>
                           
                            
                          
                            <a class="dropdown-item" href="dashboard.user.list.php">
                               <i class="fas fa-user-edit py-2 px-2"></i>
                                 Listagem e Edição
                            </a>
   
                        </div>
                    </li>
                    
                    
                    <li class="nav-item dropdown py-1 px-3">
                        <a class="nav-link" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fas fa-users-cog py-2 px-2"></i>
                        Funcionarios
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                         
                            <a class="dropdown-item" href="dashboard.funcionarios.cad.php">
                                <i class="fas fa-user-plus py-2 px-2"></i>
                                Cadastrar
                            </a>
                           
                            
                          
                            <a class="dropdown-item" href="dashboard.funcionarios.list.php">
                               <i class="fas fa-user-edit py-2 px-2"></i>
                                Listagem e Edição
                            </a>
   
                        </div>
                    </li>
                    
                    
 
                </ul>
                
                <ul class="navbar-nav ml-auto">
      
                    <li class="nav-item active">

                        <a class="nav-link" id="toggle-button" href="?AdmSair">

                            <span class="sr-only">(current)</span>
                            <i class="fas fa-times"></i>

                        </a>

                    </li>
       
                </ul>
                
            </div>
            
        </div>
        
    </nav>