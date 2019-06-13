<!-- ADMIN POSTAGEM DE PRODUTOS -->
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
                <i class="fas fa-archive main-icon bg-warning text-white"></i>
                Upload Produtos
            </p>
            <!-- .main title -->
            
            <?php 
                // include cadastro de produtos
                include "php/includes/admin/produtos.php"; 
            ?>   
                    
        </div>
        <!--container-->  

        <?php
    
            // inclui head css
            include "php/includes/admin/footer.php";
    
        ?>
   
</body>    

</html>