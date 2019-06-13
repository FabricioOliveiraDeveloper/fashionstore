<?php
	
	//REQUER CONEXÃO COM O BANCO DE DADOS
    include("php/connections/connection-registre.php");
	include("php/connections/connection.php");
    
	
	// SE PRECIONAR O BOTÃO 
	if(isset($_POST['BtnCadastrar']))
	{		
		
        
            $icon = '@';
            
            $cod = $icon.$_POST['cod'];
        
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
		
        
            //verificação de codigo id
            $consultaBancoID = mysqli_query($conn, "SELECT * FROM produtos WHERE cod = '$cod'") or die (mysql_error());
           
            //verifica se o código é existente
            $verificaCod = mysqli_num_rows($consultaBancoID);
            

            // verifica código id
            if($verificaCod == 1)
            {
                
?>   
                <div class="container">
            
                    <div class="row justify-content-center fixed-top mx-auto mt-5" style="width:95%; transition:1s; z-index:999999;">

                                    <div class="col-lg-8 mt-5 py-5">

                                        <div class="alert alert-danger alert-dismissible mt-5 py-5" role="alert">

                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>

                                    <center>    

                                        <p>    

                                            O código informado
                                            <br>
                                            <strong><em>"<?php echo $cod;?>"</em></strong> 
                                            <br>
                                            já consta em nossa base de dados!

                                        </p>
                                        
                                    </center>

                            </div>

                        </div>

                    </div>

                </div>

<?php
            }
            else
            {
                
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
			
            }//else
        
    }//IF - POSTAGEM 


?>