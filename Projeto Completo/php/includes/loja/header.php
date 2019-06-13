<!-- HEADER -->
<!-- Dev: Fabricio Oliveira Template: FashionStore -->

 
    <div class="container">

        <header>

            <h5 class="modal-title mt-5 mb-5 z-index-3">#Recentes</h5>
     
            
            <div class="grade-header">

                
                    <div class="row">
                        
                        <?php

                            //Seleciona os arquivos da tabela sql
                            $sqlRead = "SELECT * FROM produtos ORDER BY id DESC Limit 4";

                            try
                            {
                                $ready = $db->prepare($sqlRead);
                                $ready->execute();
                            }
                            catch(PDOException $e)
                            {
                                echo $e->getMessage();
                            }

                            //Repetição dos arquivos das pastas para a web
                            while($rs = $ready->fetch(PDO::FETCH_OBJ))
                            {

                        ?>  
                        
                            <div class="col-3">
                                <a class="card-link text-dark"  href="loja.produto.php?id=<?php echo $rs->id; ?>">
                                
                                    <div class="card mt-0 mb-4 border-0">
                                        <img class="" src="php/files/produtos/imagem_01/<?php echo $rs->imagem_01; ?>" />
                                        
                                        <div class="header-info">
                                        
                                            <h6><?php echo $rs->nome; ?></h6>
                                            
                                        </div>
                                        
                                    </div>

                                </a>
                                
                            </div>
                                
                        <?php
                            }
                        ?>

                    </div>
                    
                </div>
                
            
     
            
        </header>
</div>


 