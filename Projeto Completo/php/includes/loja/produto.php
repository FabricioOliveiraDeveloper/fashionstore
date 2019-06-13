<!-- CONTEÚDO PRODUTO -->
<!-- Dev: Fabricio Oliveira Template: FashionStore -->

    <section id="Produto">

        <?php
        
            //Se Pegar o id do app ira apresentar o app para download e descrições
            if(isset($_GET['id']))
            {

                $id = $_GET['id'];
                
                //Select com a tabela mysql
                $sqlRead = "SELECT * FROM produtos WHERE id=:id";

                //Tratamento de erro PDO
                try
                {
                    $ready = $db->prepare($sqlRead);
                    $ready->bindValue(":id",$id,PDO::PARAM_INT);
                    $ready->execute();
                }
                catch(PDOException $e)
                {
                    echo $e->getMessage();
                }
        
        ?>
        <div class="container">
    
            <div class="row justify-content-center">

                <div class="col-lg-4">
                
                    <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
                        
                    <?php

                        //Repetição do id com app e imagens e descrição
                        while($rs = $ready->fetch(PDO::FETCH_OBJ))
                        {

                    ?> 
                              
                        <div class="carousel-inner">

                            <div class="carousel-item active">
                              <img class="d-block w-100" src="php/files/produtos/imagem_01/<?php echo $rs->imagem_01; ?>" alt="First slide">
                            </div>

                            <div class="carousel-item">
                              <img class="d-block w-100" src="php/files/produtos/imagem_02/<?php echo $rs->imagem_02; ?>" alt="Second slide">
                            </div>

                            <div class="carousel-item">
                              <img class="d-block w-100" src="php/files/produtos/imagem_03/<?php echo $rs->imagem_03; ?>" alt="Third slide">
                            </div>

                            <div class="carousel-item">
                              <img class="d-block w-100" src="php/files/produtos/imagem_04/<?php echo $rs->imagem_04; ?>" alt="Third slide">
                            </div>

                        </div>
                    
                        <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
                            <svg class="text-dark" id="i-arrow-left" viewBox="0 0 32 32" width="32" height="32" fill="none" stroke="currentcolor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2">
                            <path d="M10 6 L2 16 10 26 M2 16 L30 16" />
                                </svg>
                            <span class="sr-only">Previous</span>
                        </a>
                    
                        <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
                            <svg class="text-dark" id="i-arrow-right" viewBox="0 0 32 32" width="32" height="32" fill="none" stroke="currentcolor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2">
                            <path d="M22 6 L30 16 22 26 M30 16 L2 16" />
                            </svg>  
                            <span class="sr-only">Next</span>
                        </a>
                    
                        </div>
                
                    </div>
            
            
            
            
                <div class="col-lg-6 px-5 py-5">
            
                    <h5 class="mt-3"><?php echo $rs->nome; ?></h5>
                    <hr>
                    
                    <p><strong>categoria: </strong><i><?php echo $rs->categoria; ?></i></p>

                    <p><strong>Genêro: </strong><i><?php echo $rs->modelo; ?></i></p>
                    
                    <p><strong>Etiqueta: </strong><i><?php echo $rs->tipo; ?></i></p>
                    
                    <br/>

                    <?php  
                             
                        $valor = number_format($rs->preco, 2, ',', '.');
                                                
                        $total = $rs->total;   
                            
                        $desconto = $rs->desconto;
                                                
                        $total = number_format($total, 2, ',', '.');    
                                                                    
                    ?>
                    
                    <p class="mt-3">
                        <strong><?php echo $desconto; ?>% OFF</strong> 
                    </p>
                    
                    <p>
                        De: <strong>R$ <?php echo $valor; ?></strong> 
                 
                        Por: <strong>R$ <?php echo $total; ?></strong>
                    </p>
                    
                    <center>
                    <a class="btn btn-dark bg-black rounded-0 mt-5 mb-3" href="loja.sacola.php?acao=add&id=<?php echo $rs->id?>">Adicionar a sacola
                    </a>
                    </center>
                    

                </div>
            
            </div>
         
            
            <div class="row mt-5 produto-desc">

                <div class="col-12">

                    <h5 class="mt-3 mb-3">Informações</h5>

                    <p><strong>Código do produto: </strong><span class="pro-cod"><?php echo $rs->cod; ?></span></p>

                    <hr/>
                    
                </div>

                
                <div class="col-lg-12 col-md-12 col-sm-12 col-12">

                    <br>

                    <p><strong>categoria: </strong><i><?php echo $rs->categoria; ?></i></p>

                    <p><strong>Genêro: </strong><i><?php echo $rs->modelo; ?></i></p>
                    
                    <p><strong>Etiqueta: </strong><i><?php echo $rs->tipo; ?></i></p>

                    <p><strong>descrição:</strong>
                    <i>
                        <?php echo $rs->descricao; ?>
                    </i>
                    </p>    

                </div>

            </div>

                <?php

                    }// end while

                ?>
            
        </div>
        
        <?php
            
            }// end if
        
        ?>

    </section>