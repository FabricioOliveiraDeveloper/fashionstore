<!--TAG PHP-->
<?php
        

    //Inicia  a sessão
    session_start();

        //Se Sessão a sessão já foi iniciada....
	   if(isset($_SESSION['LFSAdmin'])){
           // ir para pagina do ClickUser automaticamente
		  header('location:dashboard.php');
		  die();
	   }
           

       //inclusão da configuração do banco
	   include_once 'config.php';
    
        //inclusão da conexão com o banco
	   include_once 'connection.php';
    
        //inclusão das funções de parametro de usuario
	   include_once 'functions.php';
	
	   //Se botão BtnLogin for acionado clique.....
	   if(isset($_POST['BtnLogin'])){
           
        //Verificação de conexão com banco de dados mysql
		$conn = DBConnect();
           
        //Verificação de email 
		$email = mysqli_escape_string($conn, $_POST['email']);
           
        //verificação de senha
		$senha = mysqli_escape_string($conn, $_POST['senha']);
		
        //Verificação de email e senha na tabela usuarios 
		$consultaInformacoes = mysqli_query($conn, "SELECT * FROM admin WHERE email = '$email' AND senha = '$senha'") or die (mysql_error());
        
        //Pega linha de dados do usuario após a confirmação de  email e senha
		$verificaInformacoes = mysqli_num_rows($consultaInformacoes);
   
		// Se as informações for verdadeiras "existir" no banco de dados....
		if($verificaInformacoes == 1)
		{
            //repetição dos dados do usuario
			while ($result=mysqli_fetch_array($consultaInformacoes))
			{
               
                //Liga a sessão LFSAdmin
                $_SESSION['LFSAdmin']=true;
                
                //Pega id do usuario
				$_SESSION['id']=$result['id'];
                
                //Pega email do usuario
				$_SESSION['email']=$result['email'];
                
                //Pega senha do usuario via sessão
				$_SESSION['senha']=$result['senha'];
                
                header('location:dashboard.php');
			}
		}

           
        //Se na verificação não encontrar nenhum usuario
        else if($verificaInformacoes == 0)
        {
            header('location:admin-login-erro.php');
            die();
        }
		
	}

?>
 <!--.TAG PHP-->