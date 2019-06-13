<!-- BUSCA DE ITEN -->
<!-- Dev: Fabricio Oliveira Template: FashionStore -->
 
<html>
    
<head>
<?php 
        
    // requer conexão com banco de dados
    require_once("php/connections/connection-registre.php");
    
    // requer conexão com banco de dados
    require_once("php/connections/connection.php");
  
    include "php/includes/sessions/func/session.php";
   
    include "php/includes/user/head.php"; 
    
 
    
    $id_cod = $_SESSION['cod'];

?> 
</head>
    
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
    
    
    <nav class="nav-options bg-danger">
    
        <div class="container">
        
        
            <div class="nav nav-tabs" id="nav-tab" role="tablist">
                
                <a class="nav-item nav-link active" href="funcionarios.index.php">
                    
                    <svg id="i-search"  class="nav-icon-tab" viewBox="0 0 32 32" width="32" height="32" fill="none" stroke="currentcolor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2">
                        <circle cx="14" cy="14" r="12" />
                        <path d="M23 23 L30 30"  />
                    </svg>
                    Buscas
                </a>
                
                 <a class="nav-item nav-link" href="funcionarios.index02.php">
                    
                    <svg id="i-folder" class="nav-icon-tab" viewBox="0 0 32 32" width="32" height="32" fill="none" stroke="currentcolor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2">
                        <path d="M2 26 L30 26 30 7 14 7 10 4 2 4 Z M30 12 L2 12" />
                    </svg>
                    Cursos
                </a>
            
                
          </div>
            
        </div>
        
    </nav>
    
    </nav>
    
    <div class="container">
    
        <h4 class="mt-5 mb-1 text-center text-secondary">Itens Retirados</h4>
        
        <div class="row justify-content-center">
        
            <div class="col-md-4">
            
                  <form action="" method="get" enctype="multipart/form-data" class="mt-5 px-4 py-0">

                    <div class="form-group">
                        
                        <input class="form-control" type="text" name="id" placeholder="Inserir Código ID" required/>
                        <center>
                            <input class="px-5 btn btn-dark mt-3 rounded-0" type="submit" value="Buscar" name="BtnBuscar" />
                        </center>    
                       </div>

                </form>
                
            </div>
        
        </div>

    <style>
        .form-control::placeholder{
          color: #888;
        }
        .form-control{
            border-radius: 0px;
            border: 0px;
            border-bottom: 1px solid #888;
        }
        .btn
    </style>
    

    <?php
        
        if(isset($_GET['BtnBuscar'])){
        
        $id = $_GET['id'];
  
        //Seleciona os arquivos da tabela sql
        $consultaBanco = mysqli_query($conn, "SELECT * FROM compras WHERE id = '$id' AND id_status='retirado' ") or die (mysql_error());
            
        
        
         $verificaBanco = mysqli_num_rows($consultaBanco);

        //
        if($verificaBanco == 0)
        {
       
            echo "<center><h5 style='font-size:18px; margin-top:100px;'>Item não existente !!!</h5></center>";
        }
        if($verificaBanco == 1)
        {
                
            //Select com a tabela mysql
            $sqlRead = "SELECT * FROM compras WHERE id=:id AND id_status='retirado' ";
			
            //Tratamento de erro PDO
            try
            {
                $ready = $db->prepare($sqlRead);
                $ready->bindValue(":id",$id,PDO::PARAM_INT);
                $ready->execute();
            }
            catch(PDOException $e)
            {
                echo $e->getMessage();
            }
            //Repetição do id com app e imagens e descrição
            while($rs = $ready->fetch(PDO::FETCH_OBJ))
            {    
            
    ?>
      
        <div class="row justify-content-center mb-5">
            
         <div class="col-lg-4 col-md-4 col-sm-6 mt-4 mb-4">
                    
                    <div class="card main-card bg-dark text-white px-4 py-4">

                        
                        <form action="php/functions/func-remove-compra.php" method="get" enctype="multipart/form-data">
                            
                            <input class="d-none" value="<?php echo $rs->id; ?>" name="id">
                            <input class="d-none" value="<?php echo $rs->cod_user; ?>" name="cod_user">
                            <input class="d-none" value="<?php echo $rs->id_produto; ?>" name="id_produto">
                            <input class="d-none" value="<?php echo $rs->valor_total; ?>" name="valor_total">
                            
                             <h5 class="card-title">
                                Compra ID: <?php echo $rs->id ;?>
                            </h5>


                  

                            <p>
                                <span class="card-title">Usuário ID: <?php echo $rs->cod_user; ?></span>
                            </p>

                            <h5 class="card-title text-white"><?php echo $rs->id_produto; ?></h5>

                            <h5 class="card-title text-white">
                                Total: <?php echo $rs->valor_total;?>
                            </h5>
                            
                            <td>
                                <center>
                                    <input type="submit" class="btn btn-dark mt-3 mb-3" name="BtnRemover" value="Remover">
                                </center>    
                            </td>
                            
                                     
                        </form>
                    </div>
                    
                </div>  
        </div>
        

        
                                                   
    <?php            
            }
        }
            
        }

    ?>
    
    </div>
    
</body>
</html>    
