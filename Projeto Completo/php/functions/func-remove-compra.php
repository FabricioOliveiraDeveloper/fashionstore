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
	if(isset($_GET['BtnRemover']))
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
    }

    header("location:../../busca.itens02.php");
?>