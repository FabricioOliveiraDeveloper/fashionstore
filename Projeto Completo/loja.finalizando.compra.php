<!-- LOJA FINALIZANDO COMPRAS -->
<!-- Dev: Fabricio Oliveira Template: FashionStore -->

<?php 


    include "php/sessions/user/session.php";

	include "php/functions/sacola-session.php";


    
?>

<!DOCTYPE HTML>
<html>

    
    <?php 
    
        include "php/includes/loja/head.php";
        include "php/includes/loja/navbar.php"; 
    
        // requer conexão com banco de dados
        require_once("php/connections/connection.php");
        // requer conexão com banco de dados
        require_once("php/connections/connection-registre.php");
    
    ?>

        
<body>
    
    <div class="container">
        
        <div class="row justify-content-center">
            
            <div class="col-md-12">
            
                <div class="alert alert-danger alert-dismissible" style="margin:50px 5px 5px;">

                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>

                    <h5 class="text-center"><i class="icon fa fa-ban"></i> Alerta!</h5>


                    <p class="text-center mt-4">Ao realizar a compra. Não esqueça de imprimir seu comprovante.</p>
                    
                    <p class="text-center mt-4">Pois será importante para a retirada do seus itens na loja.</p>

            
                </div>
            
            </div>
            
        </div>          
	
		<?php  ?>
            
    
        
        <?php
        
            
            $pularlinha = '<br>';
        
        
            if(isset($_POST['BtnCompra'])){
        
                
                $cod_user = $_SESSION['cod'];

                $id_produto = $_POST['idprodutos'];

                $id_status = 'Retirar';

                $valor_total = $_POST['valortotal'];
                
                $insereDados = mysqli_query($conn, "INSERT INTO compras (cod_user,id_produto,id_status,valor_total)values('$cod_user','$id_produto','$id_status','$valor_total')") or die (mysql_error());
					
                    
                if($insereDados){
            
        ?>
        
             <div class="row justify-content-center">
            
            <div class="col-md-12">
            
                <div class="alert alert-success alert-dismissible" style="margin:50px 5px 5px;">

                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>

                    <h5 class="text-center"><i class="icon fa fa-bell"></i> Alerta!</h5>


                    <p class="text-center mt-4">Sua compra foi realizada com sucesso.</p>

            
                </div>
            
            </div>
            
        </div>   
        
        <?php                        
        
            
            }  
            
        }
            
        ?>
   
		<?php if($resultsCarts) : ?>
        
           
            <h5 class="mt-5 mb-5" >Seu(s) iten(s) em sua sacola de compra</h5>
	    
			    				
			<form action="" method="post" enctype="multipart/form-data" accept-charset="ISO-8859-1">
                
                <div class="box box-body">
                    
                    <table class="table table-striped">
                        
                        <thead class="thead-dark">
                            <tr>
                                <th>Código</th>
                                <th>Produto</th>
                                <th>Quantidade</th>
                                <th>Preço</th>
                                <th>Subtotal</th>
                            </tr>				
                        </thead>
                        
                        <tbody>
                            
                          <?php foreach($resultsCarts as $result) : ?>
                            <tr>
                                
                                <td><?php echo $result['cod']?></td>
                                <td><?php echo $result['name']?></td>
                                <td><?php echo $result['quantity']?></td>
                                <td>R$<?php echo number_format($result['total'], 2, ',', '.')?></td>
                                <td>R$<?php echo number_format($result['subtotal'], 2, ',', '.')?></td>

                            </tr>
                            <?php endforeach;?>
                            
                         <tr>
                             
                            <td colspan="4" class="text-right"><b>Total: </b></td>
                            <td>R$<?php echo number_format($totalCarts, 2, ',', '.')?></td>
                             
                         </tr>
                            
                        </tbody>

                    </table>
                    
                </div>
    
           
                <h5 class="mt-5 mb-5">Meus Dados</h5>
            
                <table class="table table-striped">
                
				
                    <thead class="bg-primary text-light">
					
                    
                        <tr>
                            
				            <th>Código</th>
                            
                            <th>Cliente</th>
						  
                            <th>CPF</th>
					
                        </tr>				
				
                    </thead>
                
				    <tbody>
                    
                   
                        <tr>
                            
                            <td><?php echo $_SESSION['cod']; ?></td>
                            
                            <td><?php echo $_SESSION['nome']." ".$_SESSION['sobrenome']; ?></td>
                            
                            <td><?php echo $_SESSION['cpf']; ?></td>
                   
                        </tr>
                        
                    </tbody>
                
            </table>

        
                <center class="mt-5">
            
                    <a class="btn btn-danger" href="loja.sacola.php">VOLTAR E ALTERAR SACOLA</a>
            
			         <input class="btn btn-success" type="submit" value="REALIZAR COMPRA" name="BtnCompra"  style="margin:5px 5px;">
            
                    <input class="btn btn-primary" type="button" name="Imprimir Comprovante" value="IMPRIMIR COMPROVANTE" onclick="window.print();" style="margin:5px 5px;">
            
                    <input type="text" style="display:none;" value="<?php if($resultsCarts){ 
    
        foreach($resultsCarts as $result){ 
        echo "<hr>";
        echo "Código produto: (".$result['cod'].") "; 
        echo "$pularlinha"; echo "$pularlinha";    
        echo "Quantidade: (".$result['quantity'].") ";
        echo "$pularlinha"; echo "$pularlinha";   
        echo "SubTotal: ";
        echo number_format($result['subtotal'], 2, ',', '.');
        echo "<hr>";    
    
    }

}?>" name="idprodutos">
           
           
           <input type="text"  style="display:none;" value="<?php if($resultsCarts){ 
    

        
        
        echo number_format($totalCarts, 2, ',', '.');

    
    

}?>" name="valortotal" style="margin:5px 5px;">
            
             
              
                </center>
			
        </form>
    </div>
	   <?php include "php/includes/loja/footer.php"; ?>
	<?php endif?>
	
	<?php if(!$resultsCarts) : ?>
	    
        <br><br><br> <br><br><br> 
        <div class="mt-5 py-5 mb-5 text-center">
	        <h5 class="msg-sacola">Você ainda não tem nenhum item em sua sacola de compras &#128543;</h5>
	        <a href="index.php"><h5 class="msg-sacola-link">clique aqui para visualizar os nossos produtos</h5></a>
        </div>
	    
        <br><br><br><br> 
        <?php include "php/includes/loja/footer.php"; ?>
        <?php endif?>
    
</body>
</html>
<style>
    @media print{
        .btn{
            display: none;
        }
        .msg-sacola-1{
            display: none;
        }
        .s{
            display: none;
        }
        .alert{
            display: none;
        }
        footer{
            display: none;
        }
    }
</style>