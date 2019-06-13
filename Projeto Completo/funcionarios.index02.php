<!-- USER INDEX -->
<!-- Dev: Fabricio Oliveira Template: FashionStore -->

<!DOCTYPE html>
<html>

    <?php 
        
        include "php/connections/connection.php";
  
        include "php/includes/sessions/func/session.php";
   
        include "php/includes/user/head.php"; 
    
    
        $id_cod = $_SESSION['cod'];
        
    
        //Seleciona os arquivos da tabela sql
        
    /*$sqlRead = "SELECT * FROM compras WHERE cod_user='$id_cod' ORDER BY id DESC";
        
            try
            {
                $readycompra = $db->prepare($sqlRead);
                $readycompra->execute();
            }
            catch(PDOException $e)
            {
                echo $e->getMessage();
            }
            */
   
    ?> 

<body class="bg-white">
    
    <nav class="sticky-top">
    <nav class="navbar navbar-expand navbar-dark bg-dark">
        <div class="container">
            
             <ul class="navbar-nav mr-auto">

                <li class="nav-item">
                    
                    <a class="nav-link text-white" href="#">
                    
                        <img class="nav-img-perfil" src="php/files/usuarios_perfil/<?php echo $_SESSION['slide']; ?>" />
                        
                        <span class="ml-2 nav-text-perfil"><?php echo $_SESSION['nome'];?> <?php echo $_SESSION['sobrenome'];?></span> 
                        
                    </a>
                    
                </li>
                

            </ul>
            
             <ul class="navbar-nav ml-auto">

                <li class="nav-item">
                    
                    <a class="nav-link text-white" href="index.php">
                        
                        <svg id="i-reply" class="nav-icon" viewBox="0 0 32 32" width="32" height="32" fill="none" stroke="currentcolor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2">
                            <path d="M10 6 L3 14 10 22 M3 14 L18 14 C26 14 30 18 30 26" />
                        </svg>
                        
                    </a>
                    
                </li>
                 
                <li class="nav-item">
                    
                    <a class="nav-link text-white" href="?sair">
                        
                        <svg id="i-close" class="nav-icon-sair" viewBox="0 0 30 30" width="30" height="30" fill="none" stroke="currentcolor" stroke-linecap="round" stroke-linejoin="round" stroke-width="4">
                            <path d="M2 30 L30 2 M30 30 L2 2" />
                        </svg>
                        
                    </a>
                    
                </li> 
                

            </ul>
            
            
            
            
        </div>
    </nav>
    
    
    <nav class="nav-options bg-danger">
    
        <div class="container">
        
        
            <div class="nav nav-tabs" id="nav-tab" role="tablist">
                
                <a class="nav-item nav-link" href="funcionarios.index.php">
                    
                    <svg id="i-search"  class="nav-icon-tab" viewBox="0 0 32 32" width="32" height="32" fill="none" stroke="currentcolor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2">
                        <circle cx="14" cy="14" r="12" />
                        <path d="M23 23 L30 30"  />
                    </svg>
                    Busca
                </a>
                
                 <a class="nav-item nav-link active" href="funcionarios.index02.php">
                    
                    <svg id="i-folder" class="nav-icon-tab" viewBox="0 0 32 32" width="32" height="32" fill="none" stroke="currentcolor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2">
                        <path d="M2 26 L30 26 30 7 14 7 10 4 2 4 Z M30 12 L2 12" />
                    </svg>
                    Cursos
                </a>
            
                
          </div>
            
        </div>
        
    </nav>
    
    </nav>
    
    <section id="Conteudo">
    
          <div class="container">
        <div class="tab-content" id="nav-tabContent">
            
          
            
                <div class="tab-pane fade show active" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
            
                
                    <h5 class="mt-5 mb-5 text-secondary">Lista de cursos</h5>
                    
                    <ul class="nav flex-column">
                      <li class="nav-item">
                        <a class="nav-link text-dark" target="_blank" href="https://www.youtube.com/playlist?list=PLCHFCAJp9EAtqNKP3HRuMGBXey22NeMZT">01 - Curso de Libras</a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link text-dark" target="_blank" href="https://www.youtube.com/playlist?list=PLR0fLzmBwFvXgljeXCxTD4tocqDCj5brZ">02 - Curso de Modelagem de Tecidos</a>
                      </li>
                         <li class="nav-item">
                        <a class="nav-link text-dark" target="_blank" href="https://www.youtube.com/playlist?list=PLDhmw0qao5I9FdJcFRylYNpVvkqNXMWS_">03 - Curso e dicas de Vendas</a>
                      </li>
                    </ul>
             
                
                </div>
            
            </div>
        
        </div>
        
    </section>
    
</body>    

</html>