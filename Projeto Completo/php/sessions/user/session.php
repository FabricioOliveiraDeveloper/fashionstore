    <!--PHP TAG-->
    <?php 
    
        session_start();
	
        //Se Sessão a sessão já foi iniciada....
	   if(!isset($_SESSION['LFSUser'])){
           // ir para pagina do ClickUser automaticamente
		  header('location:loja.login.php');
		  // se tiver alguma sessão de usuarios destroi a sessão 
	   }
    
        if (isset($_GET['sair'])){
				session_destroy();
				header('location:index.php');
        }
    
        
    ?>
    <!--.PHP TAG-->