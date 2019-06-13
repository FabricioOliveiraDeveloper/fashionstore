<!-- ADMIN LISTA DE PRODUTOS -->
<!-- Dev: Fabricio Oliveira Template: FashionStore -->

<!DOCTYPE html>
<html>

    <?php 
        // requer conexão com banco de dados
        require_once("php/connections/connection.php");
        
        // include função de postagem
        include "php/functions/product-post.php";
    
        // include sessão admin
        include "php/includes/sessions/admin/session.php";
    
        // include head
        include "php/includes/admin/head.php"; 
    ?>

<body>
     
        <?php 
            // include sidebar
            include "php/includes/admin/sidebar.php"; 
        ?>    
        
        <!--container-->
        <div class="container mt-4">
        
            <!-- main title -->
            <p class="main-title mb-4">
                <!-- icone -->    
                <i class="fas fa-pen-square main-icon bg-danger text-white"></i>
                Editar Produtos
            </p>
            <!-- .main title -->
 
            <div class="row">
            
                  <?php

                //Seleciona os arquivos da tabela sql
                $sqlRead = "SELECT * FROM produtos ORDER BY id Desc";
        
            
                try
                {
                    $ready = $db->prepare($sqlRead);
                    $ready->execute();
                }
                catch(PDOException $e)
                {
                    echo $e->getMessage();
                }
            
                $id = $ready->execute();
            
                        
            ?>
                

                    <?php
                        //Repetição dos arquivos das pastas para a web
                        while($rs = $ready->fetch(PDO::FETCH_OBJ))
                        {

                    ?>   
                
                         <div class="col-lg-3 col-md-4 col-sm-6 col-12 mt-4">
                            
                                <div class="card">

                                    <img class="card-img-editar" src="php/files/produtos/imagem_01/<?php echo $rs->imagem_01; ?>" alt="Card image cap">

                                    <div class="card-body">

                                        <p class="card-title text-center">
                                            <strong><?php echo $rs->nome; ?></strong>
                                        </p>

                                        <p class="card-text">
                                            
                                             <?php  
                             
                                                $valor = $rs->preco;
                                                
                                                $total = $rs->total;   
                            
                                                $desconto = $rs->desconto;
                                               
                                                $preco = number_format($valor, 2, ',', '.');
                                                
                                                $total = number_format($total, 2, ',', '.');    
                                                                    
                                            ?>
                                            
                                        </p>
                                        
                                        <center>
                                       
                                        <a class="btn btn-primary" href="dashboard.product.edit.php?id=<?php echo $rs->id ?>">
                                            <i class="fa fa-edit"></i>   
                                     
                                        </a>
                            
                                        <a class="btn btn-danger text-white" data-toggle="modal" data-target="#modal-info">
                                            <i class="far fa-trash-alt"></i>    

                                        </a>
                                        
                                         </center>    
                                    </div>

                                </div>

                        </div>
                
                        <!-- modal -->      
                        <div class="modal modal-default fade" id="modal-info">

                           <div class="modal-dialog">

                             <div class="modal-content">

                                <div class="modal-header border-0">
                                    
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">×</span>
                                    </button>

                                </div>

                                <div class="modal-body">

                                    <p class="text-center">  
                                        ! Se apagar este item, não será possivel resgata-lo.
                                        <br>
                                        Tem certeza que deseja apagar este item da loja ?
                                        <br><br>

                                        <a class="btn btn-success text-white" data-dismiss="modal">Não</a>

                                        <a class="btn btn-danger" href="php/functions/product-remove.php?id=<?php echo $rs->id ?>">Sim</a>

                                    </p>

                                </div>

                            </div>
                            <!-- /.modal-content -->

                          </div>
                          <!-- /.modal-dialog -->

                        </div>
                        <!-- .modal -->
                
                    <?php

                        }

                    ?>        
            
            </div>
            </div>
               

        <?php
    
            // inclui head css
            include "php/includes/admin/footer.php";
    
        ?>
   
   
</body>    

</html>