<!-- USER INDEX -->
<!-- Dev: Fabricio Oliveira Template: FashionStore -->

<!DOCTYPE html>
<html>

    <?php include "php/connections/connection.php"; ?>
    
    <?php include "php/includes/sessions/user/session.php"; ?>
    
    <?php include "php/includes/user/head.php"; ?>
    
    <?php
        
        include "php/connections/connection.php";
    
        $id_cod = $_SESSION['cod'];
        
    
        //Seleciona os arquivos da tabela sql
        $sqlRead = "SELECT * FROM compras WHERE cod_user='$id_cod' ORDER BY id DESC";
        
            try
            {
                $readycompra = $db->prepare($sqlRead);
                $readycompra->execute();
            }
            catch(PDOException $e)
            {
                echo $e->getMessage();
            }
            
   
    ?> 

<body class="bg-white">
    
    <nav class="sticky-top">
    <nav class="navbar navbar-expand navbar-dark bg-dark">
        <div class="container">
            
             <ul class="navbar-nav mr-auto">

                <li class="nav-item">
                    
                    <a class="nav-link text-white" href="#">
                    
                        <img class="nav-img-perfil" src="php/files/usuarios_perfil/<?php echo $_SESSION['slide']; ?>" />
                        
                        <span class="ml-2 nav-text-perfil"><?php echo $_SESSION['nome'];?> <?php echo $_SESSION['sobrenome'];?></span> 
                        
                    </a>
                    
                </li>
                

            </ul>
            
             <ul class="navbar-nav ml-auto">

                <li class="nav-item">
                    
                    <a class="nav-link text-white" href="index.php">
                        
                        <svg id="i-reply" class="nav-icon" viewBox="0 0 32 32" width="32" height="32" fill="none" stroke="currentcolor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2">
                            <path d="M10 6 L3 14 10 22 M3 14 L18 14 C26 14 30 18 30 26" />
                        </svg>
                        
                    </a>
                    
                </li>
                 
                <li class="nav-item">
                    
                    <a class="nav-link text-white" href="?sair">
                        
                        <svg id="i-close" class="nav-icon-sair" viewBox="0 0 30 30" width="30" height="30" fill="none" stroke="currentcolor" stroke-linecap="round" stroke-linejoin="round" stroke-width="4">
                            <path d="M2 30 L30 2 M30 30 L2 2" />
                        </svg>
                        
                    </a>
                    
                </li> 
                

            </ul>
            
            
            
            
        </div>
    </nav>
    
    
    <nav class="nav-options bg-roxo">
    
        <div class="container">
        
        
            <div class="nav nav-tabs" id="nav-tab" role="tablist">
                
                 <a class="nav-item nav-link active" href="user.index.php">
                    
                    <svg id="i-export" class="nav-icon-tab" viewBox="0 0 32 32" width="32" height="32" fill="none" stroke="currentcolor" stroke-linecap="round" stroke-linejoin="round" stroke-width="3">
                    <path d="M28 22 L28 30 4 30 4 22 M16 4 L16 24 M8 12 L16 4 24 12" />
                    </svg>
                    Retirar
                </a>
                
                <a class="nav-item nav-link" href="user.index02.php">
                    
                    <svg id="i-import" class="nav-icon-tab" viewBox="0 0 32 32" width="32" height="32" fill="none" stroke="currentcolor" stroke-linecap="round" stroke-linejoin="round" stroke-width="3">
                        <path d="M28 22 L28 30 4 30 4 22 M16 4 L16 24 M8 16 L16 24 24 16" />
                    </svg>
                    Retirados
                </a>
                
          </div>
            
        </div>
        
    </nav>
    
    </nav>
    
    <section id="Conteudo">
    
          <div class="container">
        <div class="tab-content" id="nav-tabContent">
            
          
            
                <div class="tab-pane fade show active" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
            
                
                    <h5 class="mt-5 text-secondary">Iten(s) para retirar</h5>
                    
                    <div class="row">

                        <?php
                        
                            $id_s = 'Item retirado na loja';
                        
                            //Repetição dos arquivos das pastas para a web
                            while($rs = $readycompra->fetch(PDO::FETCH_OBJ))
                            {

                                $id_compra = $rs->id;
                                $id_status = $rs->id_status;
                                $id_produto = $rs->id_produto;
                                $id_valortotal = $rs->valor_total;

                
                                if($id_status == 'Retirar'){
               
                        ?>
                        <div class="col-lg-6 col-md-12 mb-5">
                        
                            <div class="card py-5 px-5 user-card">
                            
                                <h5 class="card-title">
                                    
                                    <img class="card-img-user" src="php/files/usuarios_perfil/<?php echo $_SESSION['slide']; ?>" />
                                    
                                    <div class="card-info">
                                        <?php echo $_SESSION['nome'];?> <?php echo $_SESSION['sobrenome'];?>
                                        <br>
                                        <?php echo $_SESSION['cod'];?>
                                    </div>
                                
                                </h5>
                                
                                <div class="card-body">
                                
                                    <div class="card-text">
                                    
                                        
                                        <h5 class="card-text-status text-danger">
                                            <strong>
                                            Status: 
                                            
                                            <span class="card-text">
                                                Retirada pendente
                                            </span>
                                            </strong>
                                        </h5>
                                        
                                        <hr/>
                                        
                                        <h5 class="card-text-status">
                                            
                                            Código da compra: @<?php echo $id_compra;?>
                                        
                                        </h5>
                                        
                                        <hr/>
                                        
                
                                        <h5 class="card-text-status"> 
                                            
                                            Produto(s):

                                        </h5>
                                    
                                        <hr/>
                                        
                                        <h5  class="card-text-status">
                                            <?php echo $id_produto;?>
                                        </h5>
                                            
                                        
                                    
                                    </div>
                                    
                                </div>
                                
                            </div>
                            
                        </div>
                        <?php
                                }//end while
                                
                            }//end if
                        ?>
                        
                        
                        
                    
                    </div>
             
                
                </div>
            
            </div>
        
        </div>
        
    </section>
    
</body>    

</html>