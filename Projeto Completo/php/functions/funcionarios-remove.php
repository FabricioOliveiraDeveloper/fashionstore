<?php

	//REQUER CONEXÃO COM O BANCO DE DADOS
	require_once("../connections/connection-registre.php");
    require_once("../connections/connection.php");
	

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
				unlink("../files/usuarios_perfil/$slide");
				
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

    header("Location:../../dashboard.funcionarios.list.php");

?>