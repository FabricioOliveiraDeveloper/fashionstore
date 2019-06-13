<!-- LOJA LOGIN -->
<!-- Dev: Fabricio Oliveira Template: FashionStore -->

<!DOCTYPE html>
<html>
    
    
    <?php 
    
        session_start();
    
        include "php/logins/user/login.php"; 
    
        include "php/includes/loja/head.php";
    
    ?>

<body>
    
    <?php include "php/includes/loja/navbar.php"; ?>
    
    <?php include "php/includes/loja/login.php"; ?>
    
    <?php include "php/includes/loja/footer.php"; ?>
    
</body>    

</html>