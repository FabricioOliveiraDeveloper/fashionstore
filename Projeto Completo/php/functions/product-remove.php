<?php
		//requer a conexão com banco de dados
		require_once("../connections/connection.php");

		 //id de cada item selecionado
		$id = $_GET['id'];
		
		//Seleciona os arquivos imagem
		$sqlRead = "SELECT * FROM produtos WHERE id=:id";
		
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
			$imagem_01 = $rs->imagem_01;
			$imagem_02 = $rs->imagem_02;
			$imagem_03 = $rs->imagem_03;
            $imagem_04 = $rs->imagem_04;
		}
		
		//Função deletar no campo de dados
		$sqlDel = "DELETE FROM produtos WHERE id=:id";

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
				unlink("../files/produtos/imagem_01/$imagem_01");
				unlink("../files/produtos/imagem_02/$imagem_02");
				unlink("../files/produtos/imagem_03/$imagem_03");
                unlink("../files/produtos/imagem_04/$imagem_04");
				
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

    //retorna para pagina de edição
    header("location:../../dashboard.product.list.php")

        
?>