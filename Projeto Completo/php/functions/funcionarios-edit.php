<?php
	
	
	
	// SE PRECIONAR O BOTÃO 
	if(isset($_POST['BtnEditar']))
	{		
		
        //id de cada item selecionado
		$id = $_GET['id'];
		
		//Seleciona os arquivos imagem
		$sqlRead = "SELECT * FROM funcionarios WHERE id=:id";
		
		//prepara o sql e executa a ação 
		try
		{
			$sqlReady = $db->prepare($sqlRead);
			$sqlReady->bindValue(":id",$id,PDO::PARAM_INT);
			$sqlReady->execute();
		}
		//caso não execulte a ação retorna uma mensagem de erro
		catch(PDOException $e)
		{
			echo $e->getMessage();
		}
		
		//Irá pegar a repetição de arquivos e imagens da pasta 
		while($rs = $sqlReady->fetch(PDO::FETCH_OBJ))
		{
			
			//variavel "arq" de cada arquivo
			$slide = $rs->slide;

		}
		
		//Função deletar no campo de dados
		$sqlDel = "DELETE FROM funcionarios WHERE id=:id";

		try
		{	
			//variavel "del" irá preparar o "sql" banco de dados
			$del = $db->prepare($sqlDel);
			
			//USANDO PDO
			//variavel "del" irá pegar o determinado "id" do valor inteiro
			$del->bindValue(":id",$id,PDO::PARAM_INT);
			
			//Se execultar o delete 
			if($del->execute())
			{
				$foi = true;
				unlink("php/files/usuarios_perfil/$slide");
				
			}
			else
			{
				$foi = false;
			}
		}
		catch(PDOExeption $e)
		{
			echo $e->getMessage();
		}

        if($foi){
            
          
            $cod = $_POST['cod'];
            
            $nome = $_POST['nome'];

            $sobrenome = $_POST['sobrenome'];

            $slide = $_FILES['slide']['name'];

            $cpf = $_POST['cpf'];

            $telefone = $_POST['telefone'];

            $email = $_POST['email'];

            $senha = $_POST['senha'];

            $cep = $_POST['cep'];

            $rua = $_POST['rua'];

            $bairro = $_POST['bairro'];

            $cidade = $_POST['cidade'];

            $uf = $_POST['uf'];

            $numero = $_POST['numero'];
            
             //--Slide1-//	
			
			//Se houver nomes duplicados irá colocar numeros entre 'conchetes'
			if(file_exists("php/files/usuarios_perfil/$slide"))
			{
				$a = 1;
				while(file_exists("php/files/usuarios_perfil/[$a]$slide"))
				{
					$a++;
				}
					$slide = "[".$a."]".$slide;
            }
            
            //Enviando arquivos para o banco de dados
            if(move_uploaded_file($_FILES['slide']['tmp_name'],"php/files/usuarios_perfil/".$slide))
            {
                $insereDados = mysqli_query($conn, "INSERT INTO funcionarios(cod,nome,sobrenome,slide,cpf,telefone,email,senha,cep,rua,bairro,cidade,uf,numero)values('$cod','$nome','$sobrenome','$slide','$cpf','$telefone','$email','$senha','$cep','$rua','$bairro','$cidade','$uf','$numero')") or die (mysql_error());
                
            }
            
                header('Location: dashboard.funcionarios.list.php');
            
        
        //--.Slide1--//

        
        }// end foi

        
    }// end btn editar


   

?>