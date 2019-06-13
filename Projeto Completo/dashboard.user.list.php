<!-- ADMIN USER LIST -->
<!-- Dev: Fabricio Oliveira Template: FashionStore -->

<!DOCTYPE html>
<html>

    <?php 
        
        // inclui admin head css
        include "php/includes/admin/head.php";
    
        // inclui sessão admin
        include "php/includes/sessions/admin/session.php";

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
            $sqlRead = "SELECT * FROM usuarios ORDER BY id DESC";
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
            <i class="fas fa-user main-icon bg-primary text-white"></i>
            Lista de Usuarios
        </p>
            
        
        <!-- row -->
        <div class="row">
                
        <?php
                    
            //Repetição dos arquivos das pastas para a web
            while($rs = $ready->fetch(PDO::FETCH_OBJ))
            {
                        
        ?> 
                
            <div class="col-lg-3 col-md-4 col-sm-6 mt-4">
                    
                <div class="card main-card bg-white text-white px-3 py-3">
                    
                    <img class="card-img-editar" src="php/files/usuarios_perfil/<?php echo $rs->slide; ?>" />
                        
                    <h6 class="mt-3 mb-1 text-dark text-center"><?php echo $rs->nome; ?> <?php echo $rs->sobrenome; ?></h6>
                    <p class="mt-1 mb-3 text-dark text-center"><?php echo $rs->email; ?></p>
                    
                    <center>
                        <a class="btn btn-primary" href="dashboard.user.edit.php?id=<?php echo $rs->id ?>">
                            <i class="fa fa-edit"></i>  
                        </a>
                        
                        <a class="btn btn-danger" data-toggle="modal" data-target="#modal-info">
                            <i class="fa fa-trash-alt"></i>  
                        </a>
                    </center>
                    
                </div>
                    
            </div>  
            
            <!-- modal -->      
            <div class="modal modal-default fade" id="modal-info">

               <div class="modal-dialog">

                 <div class="modal-content">

                    <div class="modal-header border-0">

                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">

                        <span aria-hidden="true">×</span></button>

                    </div>

                    <div class="modal-body">

                        <p class="text-center">  
                            ! Se apagar esta conta de usuario, não será possivel resgata-lo.
                            <br><br> 
                            Tem certeza que deseja apagar este usuario do banco de dados ?
                            <br><br>

                            <a class="btn btn-primary text-white" data-dismiss="modal">Não</a>

                            <a class="btn btn-danger text-white" href="php/functions/cliente-remove.php?id=<?php echo $rs->id ?>">Sim</a>

                        </p>

                    </div>

                </div>
                <!-- /.modal-content -->

              </div>
              <!-- /.modal-dialog -->

            </div>
            <!-- .modal -->

        <?php
        
            }//end while
                    
        ?>
                
        </div>
        <!-- .Row -->        
            
    </div>
    <!-- .Container-fluid -->
    
    <?php
    
        // inclui head css
        include "php/includes/admin/footer.php";
    
    ?>
    
</body>
</html>