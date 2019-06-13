    <!--PHP TAG-->
    <?php 
    
    //Inicia Sessão
        session_start();
	
        //Se Sessão a sessão já foi iniciada....
	   if(!isset($_SESSION['LFSAdmin'])){
           // ir para pagina do ClickUser automaticamente
		  header('location:dashboard.login.php');
		  // se tiver alguma sessão de usuarios destroi a sessão 
           session_destroy();
	   }
    
        if (isset($_GET['AdmSair'])){
				session_destroy();
				header('location:index.php');
        }
    
        
    ?>
    <!--.PHP TAG-->