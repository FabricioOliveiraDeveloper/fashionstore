<?php

    // requer conexão com banco de dados
    require_once("../connections/connection.php");

    //Seleciona os arquivos da tabela sql
    $sqlRead = "SELECT * FROM compras";
    try
    {
        $ready = $db->prepare($sqlRead);
        $ready->execute();
    }
    catch(PDOException $e)
    {
        echo $e->getMessage();
    }

    // SE PRECIONAR O BOTÃO 
	if(isset($_GET['BtnRetirar']))
    {
     
     
        $id = $_GET['id'];
        
        $cod_user = $_GET['cod_user'];
        
        $id_produto = $_GET['id_produto'];
        
        $valor_total = $_GET['valor_total'];
        
        //Função deletar no campo de dados
        $sqlDel = "DELETE FROM compras WHERE id=:id";

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
     
        header ("Location:../../dashboard.php");    
    
         if($foi){
                                        
                                        $cod_user = $cod_user;
                                        $id_produto = $id_produto;
                                        $id_status =  "Retirado";   
                                        $valor_total =  $valor_total;
                                        
                                        //Irá inserir os arquivos no banco de dados
					                   $sql = "INSERT INTO compras(cod_user,id_produto,id_status,valor_total)values('$cod_user','$id_produto','$id_status','$valor_total')";
                                        
                                        try
                                        {	
                                            //Irá preparar os arquivos para execução
                                            $read = $db->prepare($sql);
                                            //Para execultar o SQL
                                            if ($read->execute())
                                            {
                                                //Caixa de mensagem JavaScript Upload realizado com sucesso
                                                echo "<script type='text/javascript'>alert('Item editado com sucesso!')</script>";
                                            }
                                            else
                                            {
                                                //Caixa de mensagem JavaScript Falha no Upload
                                                echo "<script type='text/javascript'>alert('Falha no Upload!')</script>";
                                            }
                                        }
                                        catch(PDOExeption $e)
                                        {
                                            echo $e->getMessage();
                                        }	
                                        
                                    }
    
    }
                             
?>