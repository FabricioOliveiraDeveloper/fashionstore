

<!DOCTYPE HTML>
<html>

    <?php 
    
        //inicinado sessão
        session_start();
    
        // include head css
        include "php/includes/loja/head.php"; 
    
        // requer conexão com banco de dados
        require_once("php/connections/connection.php");
    
    ?>

<body>

    <!-- inclui a navbar-->
    <?php include "php/includes/loja/navbar.php"; ?>
    
    <!-- container -->
	<div class="container">
		
        <?php if($resultsCarts) : ?>
        
        <!-- form -->
        <form action="loja.sacola.php?acao=up" method="post">
            
            <h5 class="mt-5 mb-3 text-secondary">
                
                <span class="mr-5">Iten(s) na sacola</span>
                 
            </h5>
            
            
            <div class="row">
                
                <?php foreach($resultsCarts as $result) : ?>
                
                <div class="col-lg-3 col-md-4 col-sm-6 col-12">
                
                    <div class="card card-sacola">
                        
                        <div class="card-body">
                            
                            <h5 class="card-title">
                                Produto: 
                                <?php echo $result['name']?>
                            </h5>
                            
                            <h5 class="card-title mt-3"> 
                                <?php echo number_format($result['desc'])?>% OFF
                            </h5>
                            
                            <h5 class="card-title mt-3">
                                De: 
                                <?php echo number_format($result['price'], 2, ',', '.')?>
                            </h5>
                            
                            <h5 class="card-title">
                                Por: 
                                <?php echo number_format($result['total'], 2, ',', '.')?>
                            </h5>

                                                        
                            <h5 class="card-title mt-3">
                                Quantidade: 
                                <input type="text" name="prod[<?php echo $result['id']?>]" value="<?php echo $result['quantity']?>" size="1" />
                            </h5>
                            <h5 class="card-title mt-3">
                                SubTotal: 
                                <?php echo number_format($result['subtotal'], 2, ',', '.')?>
                            </h5>
                            
                            <center>
                                
                                <button class="btn btn btn-primary rounded-0 ml-auto mt-4 mb-1" type="submit">
                                    <i class="fas fa-sync"></i>
                                </button>
                                
                                <a href="loja.sacola.php?acao=del&id=<?php echo $result['id']?>" class="btn btn btn-danger rounded-0 ml-auto mt-4 mb-1">
                                    <i class="fas fa-trash-alt"></i>
                                </a>
                                
                            </center>
                            
                        </div>
                        
                    </div> 
                    
                </div>
                
                <?php endforeach;?>
                   
            </div>
            
            <h5 class="text-white text-right bg-black py-3 px-3 mt-5" style="border-radius:5px;">
                <span class="ml-5">Total R$: <?php echo number_format($totalCarts, 2, ',', '.'); ?></span>
            </h5>
        
             <section class="mt-5">
                <nav class="navbar navbar-expand-lg nav-dark">

                    <div class="container">

                        <ul class="navbar-nav mx-auto">
                        
                            <li class="nav-item">
                                 <a class="nav-link btn btn-warning mt-1 mb-1 mr-1 ml-1" href="index.php">Continuar Comprando</a>
                            </li>
                            
                            <li class="nav-item">
                                 <button class="nav-link btn btn-primary mt-1 mb-1 mr-1 ml-1" type="submit">Atualizar Sacola de Compras</button>
                            </li>
                            
                            <li class="nav-item">
                                 <a class="nav-link  btn btn-success mt-1 mb-1 mr-1 ml-1" href="loja.finalizando.compra.php">Levar ao Caixa</a> 
                            </li>
                            
                        </ul>

                    </div>

                </nav>
            </section>
            
        </form>
        <!-- .form -->
        
        
        <?php 
    
            // inclue rodape
            include "php/includes/loja/footer.php"; 
    
        ?>
        

        <?php endif?>
	
        <?php if(!$resultsCarts) : ?>

            <br><br><br><br><br><br> 
            <div class="mt-5 py-5 mb-5 text-center">
                <h5 class="msg-sacola">Você ainda não tem nenhum item em sua sacola de compras &#128543;</h5>
                <a href="index.php"><h5 class="msg-sacola-link">clique aqui para visualizar os nossos produtos</h5></a>
            </div>

            <br><br><br><br> 
            <?php include "php/includes/loja/footer.php"; ?>

        <?php endif?>
		
	</div>
    <!-- container -->
    
   
    
</body>
</html>