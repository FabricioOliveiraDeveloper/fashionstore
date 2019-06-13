<!-- ADMIN NÃO PENDENTES -->
<!-- Dev: Fabricio Oliveira Template: FashionStore -->

<!DOCTYPE html>
<html>

    <?php include "php/includes/sessions/admin/session.php"; ?>
    
    <?php include "php/includes/admin/head.php";
    
        // requer conexão com banco de dados
        require_once("php/connections/connection.php");
    
    ?>

<body>
    
    <?php include "php/includes/admin/sidebar.php"; ?>    
        
        <div class="container mt-4">
        
        <?php
        
            //Seleciona os arquivos da tabela sql
            $sqlRead = "SELECT * FROM compras ORDER BY id DESC";
            try
            {
                $ready = $db->prepare($sqlRead);
                $ready->execute();
            }
            catch(PDOException $e)
            {
                echo $e->getMessage();}
                    
        ?>
            
            <p class="main-title mb-4">
                <i class="fas fa-check-circle main-icon bg-success text-white"></i>
                Itens Não Pendentes
            </p>    
            
 
            <div class="row">
                
                <?php
                    
                    //Repetição dos arquivos das pastas para a web
                    while($rs = $ready->fetch(PDO::FETCH_OBJ))
                    {
                        
                        $id_status = $rs->id_status;
                    
                        if($id_status == 'Retirado'){   
                
                ?> 
                
                <div class="col-lg-4 col-md-4 col-sm-6 mt-4">
                    
                    <div class="card main-card bg-success text-white">

                        <h5 class="card-title">
                            Compra ID: <?php echo $rs->id ;?>
                        </h5>


                  

                            <p>
                                <span class="card-title">Usuário ID: <?php echo $rs->cod_user; ?></span>

                            </p>

                         <h5 class="card-title text-white">
                            
                                <?php
                                    echo $rs->id_produto;
                                ?>
                            
                             </h5>

                        <h5 class="card-title text-white">
                            Total:  <?php
                                    echo $rs->valor_total;
                                ?>
                        </h5>

                    </div>
                    
                </div>   
                
                <?php
                        }
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
      