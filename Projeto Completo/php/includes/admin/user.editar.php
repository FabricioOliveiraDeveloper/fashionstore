<!-- CADASTRO DE PRODUTOS -->
<!-- Dev: Fabricio Oliveira Template: FashionStore -->

    <!-- Container -->
    <div class="container">

        <!-- Row -->
        <div class="row">

            <!--coluna 12-->
            <div class="col-12">

                <?php

                    if(isset($_GET['id'])){

                        $id = $_GET['id'];

                        $sqlRead = "SELECT * FROM usuarios WHERE id=:id";

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

                        //Repetição de imagem da pasta para a web
                        while($rs = $ready->fetch(PDO::FETCH_OBJ))
                        {

                ?> 

                <!-- Form -->
                <form enctype="multipart/form-data" method="post" class="form-cad" accept-charset="ISO-8859-1">

                    <!--row-->
                    <div class="row justify-content-center">

                        <!--coluna media 6-->
                        <div class="col-md-6 col-sm-8 col-12">

                            <div class="card card-form-cad">    

                                <h5 class="text-center mt-2 mb-3">Formulário</h5>

                                <div class="mt-4 mb-4 text-center">

                                    <h6 class="box-title">Código: ( <?php echo $rs->cod; ?> )</h6>

                                </div>

                                <div class="form-group">

                                     <label for="exampleInputEmail1">Cod</label>

                                     <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="<?php echo $rs->cod; ?>" name="cod" required>

                                </div>
                                
                                <div class="form-group">

                                     <label for="exampleInputEmail1">Nome</label>

                                     <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="<?php echo $rs->nome; ?>" name="nome" required>

                                </div>

                                <div class="form-group">

                                     <label for="exampleInputEmail1">Sobrenome</label>

                                     <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="<?php echo $rs->sobrenome; ?>" name="sobrenome" required>

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

                                     <input type="text" id="cpf" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="<?php echo $rs->cpf; ?>" required name="cpf">

                                </div>


                                <div class="form-group">

                                     <label for="exampleInputEmail1">Telefone</label>

                                     <input type="text" id="telefone" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="<?php echo $rs->telefone; ?>" name="telefone" required>


                                </div>

                                <br/>
                                <hr/>
                                <br/>

                                <div class="form-group">

                                     <label for="exampleInputEmail1">Email</label>

                                     <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="<?php echo $rs->email; ?>" name="email" required>

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

                                    <input type="text" id="cep" class="form-control" id="exampleInputPassword1" value="<?php echo $rs->cep; ?>" name="cep" required onblur="pesquisacep(this.value);">

                                </div>


                                 <div class="form-group">

                                    <label for="exampleInputPassword1">Rua</label>

                                    <input type="text" id="rua" class="form-control" id="exampleInputPassword1" value="<?php echo $rs->rua; ?>" name="rua" required>

                                </div>

                                 <div class="form-group">

                                    <label for="exampleInputPassword1">Bairro</label>

                                    <input type="text" id="bairro" class="form-control" id="exampleInputPassword1" value="<?php echo $rs->bairro; ?>" name="bairro" required>

                                </div>


                                 <div class="form-group">

                                    <label for="exampleInputPassword1">Cidade</label>

                                    <input type="text" id="cidade" class="form-control" id="exampleInputPassword1" value="<?php echo $rs->cidade; ?>" name="cidade" required>

                                </div>


                                 <div class="form-group">

                                    <label for="exampleInputPassword1">UF</label>

                                    <input type="text" id="uf" class="form-control" id="exampleInputPassword1" value="<?php echo $rs->uf; ?>" name="uf" required>

                                </div>


                                 <div class="form-group">

                                    <label for="exampleInputPassword1">Numero</label>

                                    <input type="text" class="form-control" id="exampleInputPassword1" value="<?php echo $rs->numero; ?>" name="numero" required>

                                </div>

                                <button type="submit" name="BtnEditar" class="btn btn-success btn-login mt-3">Editar</button>

                            </div>

                        </div>
                        <!--.coluna media 6-->


                    </div>
                    <!--row-->    

                </form>
                <!-- .Form -->

                <?php

                        }

                    }

                ?>

            </div>
            <!--.coluna 12-->

        </div>
        <!-- .Row -->

    </div>
    <!-- . -->

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