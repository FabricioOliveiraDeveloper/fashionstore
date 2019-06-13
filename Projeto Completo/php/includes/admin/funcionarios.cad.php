<!-- LOGIN LOJA -->
<!-- Dev: Fabricio Oliveira Template: FashionStore -->

    <?php
   
        //include cadastro de usuarios
        include "php/connections/connection-registre.php";

        // se clicar em cadastrar 
        if(isset($_POST['BtnCadastrar']))
        {

            $icon = '@';
            
            $cod = $icon.$_POST['cod'];
            
            $nome = $_POST['nome'];

            $sobrenome = $_POST['sobrenome'];

            $slide = $_FILES['slide']['name'];

            $cpf = $_POST['cpf'];

            $telefone = $_POST['telefone'];

            $email = $_POST['email'];

            $senha = $_POST['senha'];

            $cep = $_POST['cep'];

            $rua = $_POST['rua'];

            $bairro = $_POST['bairro'];

            $cidade = $_POST['cidade'];

            $uf = $_POST['uf'];

            $numero = $_POST['numero'];
            
            //verificação de codigo id
            $consultaBancoID = mysqli_query($conn, "SELECT * FROM funcionarios WHERE cod = '$cod'") or die (mysql_error());
           
            //verifica se o código é existente
            $verificaCod = mysqli_num_rows($consultaBancoID);
            

            // verifica código id
            if($verificaCod == 1)
            {
                
    ?>   
                <div class="container">
            
                    <div class="row justify-content-center">

                        <div class="col-lg-10">

                            <div class="alert alert-danger alert-dismissible mt-5" role="alert">

                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>

                                    <center>    

                                        <p>

                                            O código informado
                                            <br>
                                            <strong><em>"<?php echo $cod;?>"</em></strong> 
                                            <br>
                                            já consta em nossa base de dados!

                                        </p>

                                        <p><a href='dashboard.funcionarios.cad.php'>Preencha novamente</a> e informe um novo endereço.<br><br> Obrigado!</p>
                                        
                                    </center>

                            </div>

                        </div>

                    </div>

                </div>

    <?php                
            
            }//verifica código
            
            else
            
            {
                
                //verificação de email
                $consultaBanco = mysqli_query($conn, "SELECT * FROM funcionarios WHERE email = '$email'") or die (mysql_error());

                //verifica se o email é existente
                $verificaEmail = mysqli_num_rows($consultaBanco);
            
                //verifica email
                if($verificaEmail == 1)
                {

    ?>

                    <div class="container">

                        <div class="row justify-content-center">

                            <div class="col-lg-10">

                                <div class="alert alert-danger alert-dismissible mt-5" role="alert">

                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>

                                        <center>    

                                            <p>

                                                O endereço de e-mail informado
                                                <br>
                                                <strong><em>"<?php echo $email;?>"</em></strong> 
                                                <br>
                                                já consta em nossa base de dados!

                                            </p>

                                            <p><a href='dashboard.funcionarios.cad.php'>Preencha novamente</a> e informe um novo endereço.<br><br> Obrigado!</p>
                                        </center>

                                </div>

                            </div>

                        </div>

                    </div>

            <?php

                }// end se tiver o mesmo email
                
                else
                {

                //--Slide1-//	

                    //Se houver nomes duplicados irá colocar numeros entre 'conchetes'
                    if(file_exists("php/files/usuarios_perfil/$slide"))
                    {
                        $a = 1;
                        while(file_exists("php/files/usuarios_perfil/[$a]$slide"))
                        {
                            $a++;
                        }
                            $slide = "[".$a."]".$slide;
                        }
                        //Enviando arquivos para o banco de dados
                        if(move_uploaded_file($_FILES['slide']['tmp_name'],"php/files/usuarios_perfil/".$slide))
                        {

                            $insereDados = mysqli_query($conn, "INSERT INTO funcionarios(cod,nome,sobrenome,slide,cpf,telefone,email,senha,cep,rua,bairro,cidade,uf,numero)values('$cod','$nome','$sobrenome','$slide','$cpf','$telefone','$email','$senha','$cep','$rua','$bairro','$cidade','$uf','$numero')") or die (mysql_error());
                        }


                //--.Slide1--//

            ?>
        <div class="container">
            
            <div class="row justify-content-center">
                
                <div class="col-lg-10">
                    
                    <div class="alert alert-success alert-dismissible mt-5" role="alert">

                            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>

                            <center>
                                <p>
                                    Cadastro realizado com sucesso

                                    O endereço de e-mail informado
                                    <br>
                                    <strong>
                                        " <em><?php echo $email;?></em> "
                                    </strong>
                                    <br>
                                    Esta em nossa base de dados!
                                </p>

                        </center>

                </div>
                    
                </div>    

            </div>
            
        </div>

    <?php
            
            }//end else
    
        }//end else
            
    }// end se clicar em cadastrar
    
    ?>

    <section id="Login">
    
        <div class="container">

        <div class="row justify-content-center">            
            
            <div class="col-lg-6 col-md-6 col-sm-8 col-10 form">
            
                <form action="" method="post" enctype="multipart/form-data" class="py-5 px-5 mt-5 rounded bg-white" accept-charset="ISO-8859-1">

                    <div class="form-group">
    
                         <label for="exampleInputEmail1">Código ID</label>
    
                         <input type="text" id="cod" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Cód. ID ex: Lucas23, Fernanda74" name="cod" required>
                        <br>
                        <p class="text-justify text-primary">
                            Código ID, serve para segurança dos clientes, principalmente na busca de registros associados as compras do cliente, retirada de produtos, edição do cadastramento e mais.
                        </p>
                        
                    </div>
                    <hr/>
                    <br/>
                    
                    
                     <div class="form-group">
    
                         <label for="exampleInputEmail1">Nome</label>
    
                         <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Nome" name="nome" required>

  
                    </div>
                    
                    <div class="form-group">
    
                         <label for="exampleInputEmail1">Sobrenome</label>
    
                         <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Sobrenome" name="sobrenome" required>

                    </div>
                    
                     <div class="form-group">
    
                        <label for="exampleInputEmail1">Imagem Perfil</label>
    
                        <div class="custom-file">
                            <input type="file" class="custom-file-input" id="inputGroupFile01" name="slide" required>
                            <label class="custom-file-label bg-label" for="inputGroupFile01">Nenhum Arquivo</label>
                        </div>
  
                    </div>
                    
                    <br/>
                    <hr/>
                    <br/>
                    
                    
                    <div class="form-group">
    
                         <label for="exampleInputEmail1">CPF</label>
    
                         <input type="text" id="cpf" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="CPF" required name="cpf">
  
                    </div>
                    
                    
                    <div class="form-group">
    
                         <label for="exampleInputEmail1">Telefone</label>
    
                         <input type="text" id="telefone" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Telefone" name="telefone" required>
    
  
                    </div>
                    
                    <br/>
                    <hr/>
                    <br/>
                    
                    <div class="form-group">
    
                         <label for="exampleInputEmail1">Email</label>
    
                         <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Entre com seu email" name="email" required>
    
                         <small id="emailHelp" class="form-text text-muted">Nós nunca vamos compartilhar seu e-mail com mais ninguém.</small>
  
                    </div>
                    
  
                    <div class="form-group">
    
                        <label for="exampleInputPassword1">Senha</label>
    
                        <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Digite sua senha" name="senha" required>
  
                    </div>
  
                   

                    <br/>
                    <hr/>
                    <br/>
                    
                     <div class="form-group">
    
                        <label for="exampleInputPassword1">CEP</label>
    
                        <input type="text" id="cep" class="form-control" id="exampleInputPassword1" placeholder="CEP" name="cep" required onblur="pesquisacep(this.value);">
  
                    </div>
                    
                    
                     <div class="form-group">
    
                        <label for="exampleInputPassword1">Rua</label>
    
                        <input type="text" id="rua" class="form-control" id="exampleInputPassword1" placeholder="Rua" name="rua" required>
  
                    </div>
                    
                     <div class="form-group">
    
                        <label for="exampleInputPassword1">Bairro</label>
    
                        <input type="text" id="bairro" class="form-control" id="exampleInputPassword1" placeholder="Bairro" name="bairro" required>
  
                    </div>
                    
                    
                     <div class="form-group">
    
                        <label for="exampleInputPassword1">Cidade</label>
    
                        <input type="text" id="cidade" class="form-control" id="exampleInputPassword1" placeholder="Cidade" name="cidade" required>
  
                    </div>
                    
                    
                     <div class="form-group">
    
                        <label for="exampleInputPassword1">UF</label>
    
                        <input type="text" id="uf" class="form-control" id="exampleInputPassword1" placeholder="UF Ex: SP, RJ" name="uf" required>
  
                    </div>
                    
                    
                     <div class="form-group">
    
                        <label for="exampleInputPassword1">Numero</label>
    
                        <input type="text" class="form-control" id="exampleInputPassword1" placeholder="N° Ex: 155" name="numero" required>
  
                    </div>

                    <button type="submit" name="BtnCadastrar" class="btn btn-success btn-login mt-3">Cadastrar</button>
                    
                </form>
        
            </div>
        
        </div>
    
        </div>
        
    </section> 


    <!-- Input Arquivo -->
    <script>
        $(function() {
          $(document).on('change', ':file', function() {var input = $(this), numFiles = input.get(0).files ? input.get(0).files.length : 1,
                label = input.val().replace(/\\/g, '/').replace(/.*\//, '');input.trigger('fileselect', [numFiles, label]);
          });
          $(document).ready( function() {
              $(':file').on('fileselect', function(event, numFiles, label) {var input = $(this).parents('.custom-file').find('.custom-file-label'),
              log = numFiles > 1 ? numFiles + ' files selected' : label;if( input.length ) {input.text(log);} else {if( log ) alert(log);}});
          });
        });
    </script>

    <!-- Mascara JQUERY  -->
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.0/jquery.mask.js"></script>
    <script>
        $(document).ready(function () { 

            var $seuCampoCod = $("#cod");
            $seuCampoCod.mask('AAAAAAAAAAAAAAA0000');
            
            var $seuCampoCpf = $("#cpf");
            $seuCampoCpf.mask('000.000.000-00', {reverse: false});

            var $seuCampoCep = $("#cep");
            $seuCampoCep.mask('00000-000', {reverse: false});

            var $seuCampoPhone = $("#telefone");
            $seuCampoPhone.mask('00-0000-00000'),{reverse: false};

        });
    </script>
    

   
    <!-- BUSCA CEP -->
    <script type="text/javascript" >
    
        function limpa_formulário_cep() {
                //Limpa valores do formulário de cep.
                document.getElementById('rua').value=("");
                document.getElementById('bairro').value=("");
                document.getElementById('cidade').value=("");
                document.getElementById('uf').value=("");
        }

        function meu_callback(conteudo) {
            if (!("erro" in conteudo)) {
                //Atualiza os campos com os valores.
                document.getElementById('rua').value=(conteudo.logradouro);
                document.getElementById('bairro').value=(conteudo.bairro);
                document.getElementById('cidade').value=(conteudo.localidade);
                document.getElementById('uf').value=(conteudo.uf);
            } //end if.
            else {
                //CEP não Encontrado.
                limpa_formulário_cep();
                alert("CEP não encontrado.");
            }
        }
        
        function pesquisacep(valor) {

            //Nova variável "cep" somente com dígitos.
            var cep = valor.replace(/\D/g, '');

            //Verifica se campo cep possui valor informado.
            if (cep != "") {

                //Expressão regular para validar o CEP.
                var validacep = /^[0-9]{8}$/;

                //Valida o formato do CEP.
                if(validacep.test(cep)) {

                    //Preenche os campos com "..." enquanto consulta webservice.
                    document.getElementById('rua').value="...";
                    document.getElementById('bairro').value="...";
                    document.getElementById('cidade').value="...";
                    document.getElementById('uf').value="...";

                    //Cria um elemento javascript.
                    var script = document.createElement('script');

                    //Sincroniza com o callback.
                    script.src = 'https://viacep.com.br/ws/'+ cep + '/json/?callback=meu_callback';

                    //Insere script no documento e carrega o conteúdo.
                    document.body.appendChild(script);

                } //end if.
                else {
                    //cep é inválido.
                    limpa_formulário_cep();
                    alert("Formato de CEP inválido.");
                }
            } //end if.
            else {
                //cep sem valor, limpa formulário.
                limpa_formulário_cep();
            }
        };
        
    </script>