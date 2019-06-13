<!-- LOJA INDEX -->
<!-- Dev: Fabricio Oliveira Template: FashionStore -->

<!DOCTYPE html>
<html>

    <?php 
        
        //inicinado sessão
        session_start();
    
        // requer conexão com banco de dados
        include "php/connections/connection.php";    
    
        // inclue head css
        include "php/includes/loja/head.php";

    ?>

<body>
    
    <?php 
    
        // inclui navbar
        include "php/includes/loja/navbar.php";
    
        // inclui conteudo
        include "php/includes/loja/content.php"; 
    
        // inclui rodapé
        include "php/includes/loja/footer.php"; 
    
    ?>
    
</body>    

</html>