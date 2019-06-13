<!-- LOJA PRODUTO -->
<!-- Dev: Fabricio Oliveira Template: FashionStore -->

<!DOCTYPE html>
<html>

    <?php 
    
        //inicinado sessão
        session_start();
        
        // requer conexão com banco de dados
        require_once("php/connections/connection.php");
    
        // inclui head css
        include "php/includes/loja/head.php"; 
    
    ?>

<body>
    
    <?php include "php/includes/loja/navbar.php"; ?>
    
    <?php include "php/includes/loja/produto.php"; ?>
    
    <?php include "php/includes/loja/footer.php"; ?>
    
</body>    

</html>