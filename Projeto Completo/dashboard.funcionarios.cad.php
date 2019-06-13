<!-- ADMIN USER EDIT -->
<!-- Dev: Fabricio Oliveira Template: FashionStore -->

<!DOCTYPE html>
<html>

    <?php 
        
        // inclui admin head css
        include "php/includes/admin/head.php";
    
        // inclui sessão admin
        include "php/includes/sessions/admin/session.php";
    
        // requer conexão com bando de dados
        require_once("php/connections/connection-registre.php");
    
        // requer conexão com banco de dados
        require_once("php/connections/connection.php");
    
        // inclui function editar
        include "php/functions/cliente-edit.php"; 
    
    ?>
    
<body>

    <?php 
    
        // inclue sidebar
        include "php/includes/admin/sidebar.php";    
    
        // inclue editar
        include "php/includes/admin/funcionarios.cad.php";
    
        // inclui head css
        include "php/includes/admin/footer.php";
    
    ?>
    
</body>
</html>