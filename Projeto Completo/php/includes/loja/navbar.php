<!-- NAVBAR -->
<!-- Dev: Fabricio Oliveira Template: FashionStore -->

<?php

    // inclui funçao sacola
    include "php/functions/sacolaFunction.php";

?>
    <section class="sticky-top">
    
        <nav class="navbar navbar-expand navbar-dark bg-black sticky-top">
        
            <div class="container">
    
                <a class="navbar-brand" href="index.php"><logo class="nav-logo"></logo></a>
 
                <ul class="navbar-nav ml-auto">
                    
                    <li class="nav-item active">
                        <a class="nav-link" href="loja.sacola.php"><span class="sr-only">(current)</span>

                            <svg id="i-cart" class="nav-icon" viewBox="0 0 32 32" width="32" height="32" fill="none" stroke="currentcolor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2">
                                <path d="M6 6 L30 6 27 19 9 19 M27 23 L10 23 5 2 2 2" />
                                <circle cx="25" cy="27" r="2" />
                                <circle cx="12" cy="27" r="2" />
                            </svg>
                            
                            <?php
                              
                                
                                $result = count($_SESSION['carrinho']);
                            
                            ?>
                              
                            <?php echo "$result iten(s)"; ?>


                        </a>
                    </li>

                    <li class="nav-item active">
                        
                        <a class="nav-link" href="user.index.php"><span class="sr-only">(current)</span>

                            <!-- User -->
         
                                <?php

                                if( session_status() !== PHP_SESSION_ACTIVE ){
                                    //Inicia  a sessão
                                    session_start();
                                }
                                

                                //Se Sessão a sessão já foi iniciada....
                                if(isset($_SESSION['LFSUser']))
                                {

                                ?>
                            
                                    <img class="nav-img" src="php/files/usuarios_perfil/<?php echo $_SESSION['slide']; ?>" />
                                    <div class="online"></div>
                            
                                <?php
                                }

                                if(!isset($_SESSION['LFSUser'])){

                                ?>    
                                   
                                    
                                    <svg id="i-user" class="nav-icon" viewBox="0 0 32 32" width="32" height="32" fill="none" stroke="currentcolor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2">
                                    <path d="M22 11 C22 16 19 20 16 20 13 20 10 16 10 11 10 6 12 3 16 3 20 3 22 6 22 11 Z M4 30 L28 30 C28 21 22 20 16 20 10 20 4 21 4 30 Z" />
                                    </svg>
                            
                                <?php

                                }

                                ?>
                            

                            
                        </a>
                    </li>
        
                </ul>
                
            </div>
        
        </nav>
    
        <nav class="navbar navbar-expand-lg navbar-light bg-light nav-category">
  
            <div class="container">
            
                <a class="navbar-toggler" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </a>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">

                    <ul class="navbar-nav mr-auto">
                        
                        <li class="nav-item">
                            <a class="nav-link" href="index.php">TODOS</a>
                        </li>

                         <li class="nav-item dropdown">
                            <a class="nav-link" href="index.men.all.php" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                              MASCULINO
                            </a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="index.men.all.php">Todos</a>
                                <a class="dropdown-item" href="index.men.adult.php">Adulto</a>
                                <a class="dropdown-item" href="index.men.kid.php">Infantil</a>
                                <a class="dropdown-item" href="index.men.teen.php">Teen</a>
                            </div>
                          </li>

                        <li class="nav-item dropdown">
                            <a class="nav-link" href="index.woman.all.php" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                              FEMININO
                            </a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="index.woman.all.php">Todos</a>    
                              <a class="dropdown-item" href="index.woman.adult.php">Adulto</a>
                              <a class="dropdown-item" href="index.woman.kid.php">Infantil</a>
                              <a class="dropdown-item" href="index.woman.teen.php">Teen</a>
                            </div>
                        </li>
                        
                        <li class="nav-item dropdown">
                            <a class="nav-link" href="index.woman.all.php" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                              Infantil
                            </a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdown">  
                                <a class="dropdown-item" href="index.men.kid.php">Masculino</a>
                                <a class="dropdown-item" href="index.woman.kid.php">Feminino</a>
                            </div>
                        </li>
                        
                         <li class="nav-item dropdown">
                            <a class="nav-link" href="index.woman.all.php" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                              Teen
                            </a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdown">  
                                <a class="dropdown-item" href="index.men.teen.php">Masculino</a>
                                <a class="dropdown-item" href="index.woman.teen.php">Feminino</a>
                            </div>
                        </li>
                        
                         <li class="nav-item dropdown">
                            <a class="nav-link" href="index.woman.all.php" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                              Adulto
                            </a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdown"> 
                                <a class="dropdown-item" href="index.men.adult.php">Masculino</a>
                                <a class="dropdown-item" href="index.woman.adult.php">Feminino</a>
                            </div>
                        </li>

                    </ul>

                    <ul class="navbar-nav ml-auto">

                     
                    
                    <li class="nav-item">
                            <a class="nav-link" href="#">Contato</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" href="#">Sobre</a>
                        </li>
                    </ul>

                </div>

            </div>
        
        </nav>
        
    </section>

    <style>
        .nav-category .nav-item .nav-link{
            color: #868686;
            font-size: 12px;  
            font-weight: bold;
            text-transform: uppercase;
        }
    </style>