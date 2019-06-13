<!-- CONTEÚDO -->
<!-- Dev: Fabricio Oliveira Template: FashionStore -->

  <section id="Conteudo">
    
       <div class="banner b-index">

                <div class="b-masc"></div>

                <div class="container">
                    <h5 class="b-title"># Todos os itens masculinos</h5>
                </div>    

        </div>
      
        <div class="container">
            
            <?php

                //Seleciona os arquivos da tabela sql
                $sqlRead = "SELECT * FROM produtos WHERE modelo='Masculino' ORDER BY id Desc";
        
            
                try
                {
                    $ready = $db->prepare($sqlRead);
                    $ready->execute();
                }
                catch(PDOException $e)
                {
                    echo $e->getMessage();
                }
            
                $id = $ready->execute();
            
            ?>
                
            <div class="row">
                    <?php

                        //Repetição dos arquivos das pastas para a web
                        while($rs = $ready->fetch(PDO::FETCH_OBJ))
                        {

                    ?>   
                    
                        <div class="col-lg-3 col-md-4 col-sm-6 col-12">

                            <a class="card-link text-dark"  href="loja.produto.php?id=<?php echo $rs->id; ?>">

                                <div class="card">

                                    <img class="card-img-top" src="php/files/produtos/imagem_01/<?php echo $rs->imagem_01; ?>" alt="Card image cap">

                                    <div class="card-body">

                                        <p class="card-title">
                                            <?php echo $rs->nome; ?>
                                        </p>

                                        <p class="card-text">
                                            
                                             <?php  
                             
                                                $valor = $rs->preco;
                                                
                                                $total = $rs->total;   
                            
                                                $desconto = $rs->desconto;
                                               
                                                $preco = number_format($valor, 2, ',', '.');
                                                
                                                $total = number_format($total, 2, ',', '.');    
                                                                    
                                            ?>
                                            
                                        </p>
                                        
                                        <p class="card-text">   
                                            
                                            <strong>
                                                <?php echo $desconto.'%'; ?>
                                            </strong>
                                            DE DESCONTO
                                            
                                        </p>
                                        
                                         <p class="card-text">  
                                             
                                            DE:
                                            <strong>
                                               <?php echo $preco; ?>
                                            </strong>
                                            
                                            POR:
                                            <strong>
                                                <?php echo $total; ?>  
                                            </strong>
                                             
                                        </p>
                                        

                                    </div>

                                </div>

                            </a>

                        </div>
                
                    <?php
                            
                        }

                    ?>    
        
            </div>
        
        </div>
        
    </section>