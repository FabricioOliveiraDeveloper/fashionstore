<!DOCTYPE HTML>
<hmtl template="FashionStore" lang="pt-br">

 <?php
   
        include "php/includes/loja/head.php";    
    
    ?>


    
    
<body>


    <!-- TAG PHP -->
    <?php
    
         //include login admin
        include "php/logins/user/login.php"; 
    
    ?>
    <!-- .TAG PHP -->
    
    
     <!-- Formulario -->
    <div class="Formulario"></div>

    <div class="JanelaErro">
        
            <h5>Erro ao efetuar o login</h5>
            <br>
            <p>Codigo do erro 00x55x90x2 </p>
            
            <p>Causa do erro:<br><br> email ou senha não encontrado !!!</p>
        
            <br>
            <p>Entre em contato com o </p><p>desenvolvedor do sistema ou</p>
            <br>
            <a href="user.index.php">Clique aqui para tentar novamente</a>
  
    </div>
    
</body>  
    
    
</hmtl>
<style>
    body{
        background: #000;
    }
.Formulario{
    width: 100%;
    height: 100%;
    position: fixed;
    background-color: #000;
    background-image: url(dist/img/banners/index/Banner.jpeg);
    background-size: cover; 
    background-repeat: no-repeat;
    animation: form 1s cubic-bezier(0.7,0,0.3,1) both;
    opacity: 0.3;
    }
@keyframes form{
    to{
        opacity: 100%;
    }
	from { 
		opacity: 0; 
		transform: translate3d(0,-50px,0); 
	}
}
.JanelaErro{
    width: 300px;
    height: 400px;
    text-align: center;
    background: #c62626;
    border: 3px solid #000;
    position: absolute;
    margin: 0 auto;
    left: 0px;
    right: 0px;
    margin-top: 100px;
    border-radius: 3px;
    animation: body 1s cubic-bezier(0.7,0,0.3,1) both;
}
@keyframes body{
    to{
        opacity: 100%;
    }
	from { 
		opacity: 0; 
		transform: translate3d(0,-50px,0); 
	}
}
.JanelaErro h5{
    margin-top: 33px;
    text-align: center;
    font-family: "Segoe UI", Frutiger, "Frutiger Linotype", "Dejavu Sans", "Helvetica Neue", Arial, sans-serif;
    font-size: 22px;
    font-weight: 100;
    color: #FFF;
}
.JanelaErro p{
    text-align: center;
    font-family: "Segoe UI", Frutiger, "Frutiger Linotype", "Dejavu Sans", "Helvetica Neue", Arial, sans-serif;
    font-size: 15px;
    font-weight: 100;
    color: #FFF;
}
.JanelaErro a{
    border-radius: 3px;
    border: 3px solid rgba(191, 68, 68, 0.99);
    text-align: center;
    font-family: "Segoe UI", Frutiger, "Frutiger Linotype", "Dejavu Sans", "Helvetica Neue", Arial, sans-serif;
    font-size: 15px;
    font-weight: 100;
    color: #FFF;
    text-decoration: none;
    padding: 5px;
}
</style>