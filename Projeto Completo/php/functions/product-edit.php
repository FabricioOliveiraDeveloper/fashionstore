<?php
	
	//REQUER CONEXÃO COM O BANCO DE DADOS
	require_once("php/connections/connection.php");
	
	// SE PRECIONAR O BOTÃO 
	if(isset($_POST['BtnEditar']))
	{		
		
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
				unlink("php/files/produtos/imagem_01/$imagem_01");
				unlink("php/files/produtos/imagem_02/$imagem_02");
				unlink("php/files/produtos/imagem_03/$imagem_03");
                unlink("php/files/produtos/imagem_04/$imagem_04");
				
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
		
            $modelo = $_POST['modelo'];
            
            $tipo = $_POST['tipo'];
        
            $categoria = $_POST['categoria'];
		
            $preco = $_POST['preco'];
		
            $desconto = $_POST['desconto'];
        
            $total = $preco - $preco * $desconto / 100;
        
            $descricao = $_POST['descricao'];
		
            //Variavel imagem_01 recebe imagem_01 "imagem 01"
            $imagem_01 = $_FILES['imagem_01']['name'];
			
            //Variavel imagem_02 recebe imagem_02 "imagem 02"
            $imagem_02 = $_FILES['imagem_02']['name'];
			
            //Variavel imagem_03 recebe imagem_03 "imagem 03"
            $imagem_03 = $_FILES['imagem_03']['name'];	
			
            //Variavel imagem_04 recebe imagem_04 "imagem 04"
            $imagem_04 = $_FILES['imagem_04']['name'];	

                //--IMAGEM_01-//	

                //Se houver nomes duplicados irá colocar numeros entre 'conchetes'
                if(file_exists("php/files/produtos/imagem_01/$imagem_01"))
                {
                    $a = 1;
                    while(file_exists("php/files/produtos/imagem_01/[$a]$imagem_01"))
                    {
                        $a++;
                    }
                        $imagem_01 = "[".$a."]".$imagem_01;
                    }
                    //Enviando arquivos para o banco de dados
                    if(move_uploaded_file($_FILES['imagem_01']['tmp_name'],"php/files/produtos/imagem_01/".$imagem_01))
                    {

                    }

                //--.IMAGEM_01--//
				
        

				
                //--IMAGEM_02--//	

                    //Se houver nomes duplicados irá colocar numeros entre 'conchetes'
                    if(file_exists("php/files/produtos/imagem_02/$imagem_02"))
                    {
                        $a = 1;
                        while(file_exists("php/files/produtos/imagem_02/[$a]$imagem_02"))
                        {
                            $a++;
                        }
                        $imagem_02 = "[".$a."]".$imagem_02;
                    }
                    //Enviando arquivos para o banco de dados
                    if(move_uploaded_file($_FILES['imagem_02']['tmp_name'],"php/files/produtos/imagem_02/".$imagem_02))
                    {

                    }

                //--.IMAGEM_02--//
			
			
			
        
                //--IMAGEM_03-//	

                    //Se houver nomes duplicados irá colocar numeros entre 'conchetes'
                    if(file_exists("php/files/produtos/imagem_03/$imagem_03"))
                    {
                        $a = 1;
                        while(file_exists("php/files/produtos/imagem_03/[$a]$imagem_03"))
                        {
                            $a++;
                        }
                        $imagem_03 = "[".$a."]".$imagem_03;
                    }
                    //Enviando arquivos para o banco de dados
                    if(move_uploaded_file($_FILES['imagem_03']['tmp_name'],"php/files/produtos/imagem_03/".$imagem_03))
                    {

                    }
                //--.IMAGEM_03--//
			
			
			
        
                //--IMAGEM_04--//	

                        //Se houver nomes duplicados irá colocar numeros entre 'conchetes'
                        if(file_exists("php/files/produtos/imagem_04/$imagem_04"))
                        {
                            $a = 1;
                            while(file_exists("php/files/produtos/imagem_04/[$a]$imagem_04"))
                            {
                                $a++;
                            }
                            $imagem_04 = "[".$a."]".$imagem_04;
                        }

                        //Enviando arquivos para o banco de dados
                        if(move_uploaded_file($_FILES['imagem_04']['tmp_name'],"php/files/produtos/imagem_04/".$imagem_04))
                        {

                            //Irá inserir os arquivos no banco de dados
                            $sql = "INSERT INTO produtos(cod,nome,modelo,tipo,categoria,preco,desconto,total,descricao,imagem_01,imagem_02,imagem_03,imagem_04)

                            values('$cod','$nome','$modelo','$tipo','$categoria','$preco','$desconto','$total','$descricao',:imagem_01,:imagem_02,:imagem_03,:imagem_04)";

                            try
                            {	
                                //Irá preparar os arquivos para execução
                                $read = $db->prepare($sql);
                                //Irá substituir os ':nome' para o valor da variavel nome
                                $read->bindValue(":imagem_01",$imagem_01,PDO::PARAM_STR);
                                $read->bindValue(":imagem_02",$imagem_02,PDO::PARAM_STR);
                                $read->bindValue(":imagem_03",$imagem_03,PDO::PARAM_STR);
                                $read->bindValue(":imagem_04",$imagem_04,PDO::PARAM_STR);

                                //Para execultar o SQL
                                if ($read->execute())
                                {

                                    header("location:dashboard.product.list.php");
                                    
                                }
                                else
                                {
                                    //Caixa de mensagem JavaScript Falha no Upload
                                    echo "<script type='text/javascript'>alert('Falha no Upload !!!')</script>";
                                }
                            }
                            catch(PDOExeption $e)
                            {
                                echo $e->getMessage();
                            }	

                        }
                        else
                        {
                            //Caixa de mensagem JavaScript Falha no Upload
                            echo "<script type='text/javascript'>alert('Falha no Upload!')</script>";
                        }

                    //--.IAMGEM_04--//
			
    
            
        }
    }

?>