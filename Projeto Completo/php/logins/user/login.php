<!--TAG PHP-->
<?php
        


        //Se Sessão a sessão já foi iniciada....
	   if(isset($_SESSION['LFSUser'])){
           // ir para pagina do ClickUser automaticamente
		  header('location:user.index.php');
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
           
        session_start();
           
        //Verificação de conexão com banco de dados mysql
		$conn = DBConnect();
           
        //Verificação de email 
		$email = mysqli_escape_string($conn, $_POST['email']);
           
        //verificação de senha
		$senha = mysqli_escape_string($conn, $_POST['senha']);
		
        //Verificação de email e senha na tabela usuarios 
		$consultaInformacoes = mysqli_query($conn, "SELECT * FROM usuarios WHERE email = '$email' AND senha = '$senha'") or die (mysql_error());
        
        //Pega linha de dados do usuario após a confirmação de  email e senha
		$verificaInformacoes = mysqli_num_rows($consultaInformacoes);
   
		// Se as informações for verdadeiras "existir" no banco de dados....
		if($verificaInformacoes == 1)
		{
            //repetição dos dados do usuario
			while ($result=mysqli_fetch_array($consultaInformacoes))
			{
               
                //Liga a sessão LFSAdmin
                $_SESSION['LFSUser']=true;
                
                //Pega id do usuario
				$_SESSION['id']=$result['id'];
                
                //Pega id do usuario
				$_SESSION['cod']=$result['cod'];
                
                //Pega nome do usuario
				$_SESSION['nome']=$result['nome'];
                
                //Pega sobrenome do usuario
				$_SESSION['sobrenome']=$result['sobrenome'];
                
                //Pega slide do usuario
				$_SESSION['slide']=$result['slide'];
                
                //Pega cpf do usuario
				$_SESSION['cpf']=$result['cpf'];
                
                //Pega telefone do usuario
				$_SESSION['telefone']=$result['telefone'];
                
                
                //Pega email do usuario
				$_SESSION['email']=$result['email'];
                
                //Pega senha do usuario via sessão
				$_SESSION['senha']=$result['senha'];
                
                
                //Pega cep do usuario
				$_SESSION['cep']=$result['cep'];
                
                //Pega rua do usuario
				$_SESSION['rua']=$result['rua'];
                
                //Pega cidade do usuario
				$_SESSION['cidade']=$result['cidade'];
                
                //Pega uf do usuario
				$_SESSION['uf']=$result['uf'];
                
                //Pega numero do usuario
				$_SESSION['numero']=$result['numero'];
                
                //Pega slide1 do usuario
				$_SESSION['slide1']=$result['slide1'];
                
                
                header('location:loja.sacola.php');
			}
		}

           
        //Se na verificação não encontrar nenhum usuario
        else if($verificaInformacoes == 0)
        {
            header('location:loja.login.erro.php');
            die();
        }
		
	}

?>
 <!--.TAG PHP-->