<!-- CADASTRO DE PRODUTOS -->
<!-- Dev: Fabricio Oliveira Template: FashionStore -->

<!--row-->
<div class="row">
            
    <!--coluna 12-->
    <div class="col-12">
                    
        <!-- Form -->
        <form action="" enctype="multipart/form-data" method="post" class="form-cad">

            <!--row-->
            <div class="row justify-content-center">
                            
                <!--coluna media 6-->
                <div class="col-md-8 col-sm-8 col-12">
                    
                    <div class="card card-form-cad">    

                        <h5 class="text-center mt-2 mb-3">Formulário</h5>

                        <!--form group-->
                        <div class="form-group">

                            <label>Código ID</label>

                            <!-- Input Nome -->
                            <input type="text" class="form-control" placeholder="EX: Nome25 Camisa55 calça33" name="cod" required />

                        </div>
                        <!--.form group-->
                        
                        <!--form group-->
                        <div class="form-group">

                            <label>Nome</label>

                            <!-- Input Nome -->
                            <input type="text" class="form-control" placeholder="Nome" name="nome" required />

                        </div>
                        <!--.form group-->

                        <!--form group-->
                        <div class="form-group">

                            <label>Modelo</label>              

                            <!-- Select Tipo -->         
                            <select class="form-control" name="modelo" required>
                                <option>Masculino</option>
                                <option>Feminino</option>
                            </select>

                        </div>
                        <!--.form group-->

                        <!--form group-->
                        <div class="form-group">

                            <label>Tipo</label>

                            <!-- Tipo -->                
                            <select class="form-control" name="tipo" required>
                                <option>Adulto</option>
                                <option>Infantil</option>
                                <option>Teen</option>
                            </select>
                            <!-- Tipo -->

                        </div> 
                        <!--.form group-->


                        <!--form group-->
                        <div class="form-group">
                            
                            <!-- Input Categoria -->
                            <label>Categoria</label>
                            <input type="text" class="form-control" placeholder="Categorias: Calça, Camisa, Short, Social ?" name="categoria" required />
                        </div>
                        
                        <!--form group-->
                        <div class="form-group">
                            
                            <!-- Input Preço --> 
                            <label>Preço</label>
                            <input type="text" class="form-control" placeholder="Preço" name="preco" id="money" required>
                            
                        </div>    
                       
                        <!--form group-->
                        <div class="form-group">
                            
                            <!-- label desconto --> 
                            <label>Desconto em %</label>
                            <!-- Desconto -->                
                            <select class="form-control" name="desconto" required>
                                <option value="10">10%</option>
                                <option value="15">15%</option>
                                <option value="20">20%</option>
                                <option value="25">25%</option>
                                <option value="30">30%</option>
                                <option value="35">35%</option>
                                <option value="40">40%</option>
                                <option value="45">45%</option>
                                <option value="50">50%</option>                            
                                <option value="55">55%</option>
                                <option value="60">60%</option>
                                <option value="65">65%</option>
                                <option value="70">70%</option>
                                <option value="75">75%</option>
                                <option value="80">80%</option>
                                <option value="85">85%</option>
                                <option value="90">90%</option>
                                <option value="95">95%</option>
                            </select>
                            <!-- Desconto-->

                        </div>
                        
                        <!--form group-->
                        <div class="form-group">
                            
                            <!-- TextArea descrição -->
                            <label>Descrição</label>
                            <textarea class="form-control" cols="30" rows="5" placeholder="Descrição" name="descricao" required style="resize:none;"></textarea>
                            
                        </div>
  

                        <!-- Input imagens -->
                        <label>Imagem 01</label> 
                        <div class="custom-file">
                            <input type="file" class="custom-file-input" id="inputGroupFile01" name="imagem_01" required>
                            <label class="custom-file-label bg-label" for="inputGroupFile01">Nenhum Arquivo</label>
                        </div>


                        <label>Imagem 02</label> 
                        <div class="custom-file">
                            <input type="file" class="custom-file-input" id="inputGroupFile01" name="imagem_02" required>
                            <label class="custom-file-label bg-label" for="inputGroupFile01">Nenhum Arquivo</label>
                        </div>

                        <label>Imagem 03</label>
                        <div class="custom-file">
                            <input type="file" class="custom-file-input" id="inputGroupFile01" name="imagem_03" required>
                            <label class="custom-file-label bg-label" for="inputGroupFile01">Nenhum Arquivo</label>
                        </div>


                        <label>Imagem 04</label>
                        <div class="custom-file">
                            <input type="file" class="custom-file-input" id="inputGroupFile01" name="imagem_04" required>
                            <label class="custom-file-label bg-label" for="inputGroupFile01">Nenhum Arquivo</label>
                        </div>


                        <input type="submit" class="form-control btn btn-success mt-3" value="Postar" name="BtnCadastrar">

                    </div> 
                    
                </div>
                <!--.coluna media 6-->

                                    
            </div>
            <!--row-->    
                            
        </form>
        <!-- .Form -->
    
    </div>
    <!--.coluna 12-->
                    
</div>
<!--.row-->

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

            var $seuCampoMoney = $("#money");
            $seuCampoMoney.mask("#.##0.00", {reverse: true});


        });
    </script>