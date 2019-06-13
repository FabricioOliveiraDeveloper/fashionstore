<!-- ADMIN INDEX -->
<!-- Dev: Fabricio Oliveira Template: FashionStore -->

<!DOCTYPE html>
<html>

    <?php 
    
        // inclui sessão admin
        include "php/includes/sessions/admin/session.php";
    
        // inclui head css
        include "php/includes/admin/head.php";
    
        // requer conexão com banco de dados
        require_once("php/connections/connection.php");
    
    ?>
    
<body>
        
    <?php 
        
        // inclue sidebar
        include "php/includes/admin/sidebar.php"; 
        
    ?>    
        
        <!-- Container-fluid -->
        <div class="container mt-4">
        <?php
        
            //Seleciona os arquivos da tabela sql
            $sqlRead = "SELECT * FROM compras ORDER BY id ASC";
            try
            {
                $ready = $db->prepare($sqlRead);
                $ready->execute();
            }
            catch(PDOException $e)
            {
                echo $e->getMessage();
            }
                    
        ?>
            
            <!-- main title -->
            <p class="main-title mb-4">
                <i class="fas fa-exclamation-circle main-icon bg-danger text-white"></i>
                Itens Pendentes
            </p>
            
            
            <div class="row">
                
                <?php
                    
                    //Repetição dos arquivos das pastas para a web
                    while($rs = $ready->fetch(PDO::FETCH_OBJ))
                    {
                        
                        $id_status = $rs->id_status;
                    
                        if($id_status == 'Retirar'){   
                
                ?> 
                
                <div class="col-lg-4 col-md-4 col-sm-6 mt-4">
                    
                    <div class="card main-card bg-danger text-white">

                        
                        <form action="php/functions/retirar-compra.php" method="get" enctype="multipart/form-data">
                            
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
                                    <button type="submit" class="btn btn-danger mt-3 mb-3" name="BtnRetirar" value="Retirar">Retirar</button>
                                </center>    
                            </td>
                            
                                     
                        </form>
                    </div>
                    
                </div>   

                <?php
                        }
                    }
                ?>
                
            </div>
            
            
        </div>
        <!-- .Container-fluid -->
        

        <?php
    
            // inclui head css
            include "php/includes/admin/footer.php";
    
        ?>
</body>    

</html>