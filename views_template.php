<html>

    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>
            <?= 
                ($lingua == 1) ? 
                "Calculadora de Data para Descarte de Material Radioativo" :
                "Disposal Date Calculator for Radioactive Material"
            ?>
        </title>
        <link rel="stylesheet" href="node_modules/bootstrap/dist/css/bootstrap.min.css">
        <link rel="stylesheet" href="node_modules/bootstrap-icons/font/bootstrap-icons.css">
        <style>
            .erro {
                background-color: red;
                color: white;
                font-size: 20px
            }
        </style>
        <script src="node_modules/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    </head>

    <!-- 
        Aplicação das classes para que o corpo ocupe toda a altura da tela.
        Isso é necessário para manter o rodapé no fim da página, mesmo que 
        haja pouco conteúdo na tag main.
    -->
    <body class="min-vh-100 d-flex flex-column">
        <?php require 'partials/header.php'; ?>

        <main class="container container-md-fluid pt-3">
            <div class="row align-items-start">
                <div class="col-12 col-md-6 order-md-first order-last">
                    <form class="border border-secondary rounded p-3 my-2" method="POST">
                        <h3 class="text-primary">
                            <?php if ($lingua == 1 && $opcao == 1) : ?> 
                                Rejeito l&iacute;quido e gasoso
                            <?php elseif ($lingua == 2 && $opcao == 1) : ?> 
                                Liquid and gaseous waste
                            <?php elseif ($lingua == 1 && $opcao == 2) : ?> 
                                Rejeito s&oacute;lido
                            <?php elseif ($lingua == 2 && $opcao == 2) : ?> 
                                Solid waste
                            <?php endif ?> 
                        </h3>
                        <div class="row py-2">
                            <!--Identificação do radionuclídeo-->
                            <div class="col-12 col-md-4">
                                <label for="nome" class="form-label">
                                    <?= ($lingua == 1) ? "Radionucl&iacute;deo:" : "Radionuclide:" ?>
                                </label>
                            </div>
            
                            <div class="col-12 col-md-8">
                                <select class="form-select" required name="nome" id="nome">
                                    <option value="">
                                        <?= ($lingua == 1) ? "Escolha" : "Select" ?>
                                    </option>
                
                                    <?php
                                        $query = "";
                                        $query .= "SELECT * FROM radio ";
                                        if ($opcao == 2) { // sólidos
                                            $query .= "where sol!=0 ";
                                        }
                                        $query .= "ORDER BY radionuclideo ASC";
                                        $resultado = mysqli_query($conexao, $query);
                                    ?>
                                    <?php while ($linha = $resultado->fetch_array()) : ?>
                                        <?php /* 
                                            <option value="<?= $linha['id'] ?>"> 
                                        */ ?>
                                        <option>
                                            <?= ($lingua == 1) ? $linha['radionuclideo'] : $linha['radionuclide'] ?>
                                        </option>
                                    <?php endwhile ?>
                
                                </select>
                            </div>
                        </div>
                        
                        <div class="row py-2">
                            <!--Estado do radionuclídeo-->
                            <?php if ($opcao == 1) : ?>
                                <!--Líquido e gasosos-->
                                <div class="col-12 col-md-4">
                                    <span class="form-label">
                                        <?= ($lingua == 1) ? "Estado:" : "State:" ?>
                                    </span>
                                </div>
                                <div class="col-12 col-md-8">
                                    <div class="btn-group w-100" role="group">
                                        <input type="radio" class="btn-check" required name="estado" id="estado_liquido" value="1" />
                                        <label class="btn btn-outline-primary" for="estado_liquido">
                                            <?= ($lingua == 1) ? "Liquido" : "Liquid" ?>
                                        </label>

                                        <input type="radio" class="btn-check" required name="estado" id="estado_solido" value="2" />
                                        <label class="btn btn-outline-primary" for="estado_solido">
                                            <?= ($lingua == 1) ? "Gasoso" : "Gaseous" ?>
                                        </label>
                                    </div>
                
                                    <?php if (isset($erros_validacao['estado'])) : ?>
                                        <span class="erro">
                                            <?php echo $erros_validacao['estado']; ?>
                                        </span>
                                    <?php endif; ?>
                                </div>
                            <?php elseif ($opcao == 2) : ?>
                                <!--Sólido-->
                                <div class="col-12 col-md-4">
                                    <span class="form-label">
                                        <?= ($lingua == 1) ? "Estado: " : "State: " ?>
                                    </span>
                                </div>
                                <div class="col-12 col-md-8">
                                    <span class="form-label">
                                        <?= ($lingua == 1) ? "S&oacute;lido" : "Solid" ?>
                                        (<=1000 kg)
                                    </span>
                                </div>
                            <?php endif; ?>
                        </div>
            
                        <div class="row py-2">
                            <!--Atividade-->
                            <div class="col-12 col-md-4">
                                <label for="atividade" class="form-label">
                                    <?= ($lingua == 1)  ? "Atividade:" :" Activity:" ?>
                                </label>
                            </div>
                            <div class="col-12 col-md-8">
                                <input class="form-control" type="text" required id="atividade" name="atividade" placeholder="Ex: 1234 ; 1.234e3" />
                                <?php if (isset($erros_validacao['atividade'])) : ?>
                                    <span class="erro">
                                        <?php echo $erros_validacao['atividade']; ?>
                                    </span>
                                <?php endif; ?>
                            </div>
                        </div>
            
                        <div class="row py-2">
                            <!--Unidade da atividade-->
                            <div class="col-12 col-md-4">
                                <span class="form-label">
                                    <?= ($lingua == 1) ? "Unidade da atividade:" :"Activity unit:" ?>
                                </span>
                            </div>
                            <div class="col-12 col-md-8">
                                <div class="btn-group w-100">
                                    <?php if ($opcao == 1) : ?>
                                        <!--Líquido e gasoso-->
                    
                                        <input type="radio" class="btn-check" required id="op1" name="unidade" value="1" />
                                        <label class="btn btn-outline-primary" for="op1">
                                            Bq/m<sup>3</sup>
                                        </label>
                                        
                                        <input type="radio" class="btn-check" required id="op2" name="unidade" value="2" />
                                        <label class="btn btn-outline-primary" for="op2">
                                            Ci/m<sup>3</sup>
                                        </label>
                                        
                                        <input type="radio" class="btn-check" required id="op3" name="unidade" value="3" />
                                        <label class="btn btn-outline-primary" for="op3">
                                            mCi/m<sup>3</sup>
                                        </label>
                                        
                                        <input type="radio" class="btn-check" required id="op4" name="unidade" value="4" />
                                        <label class="btn btn-outline-primary" for="op4">
                                            uCi/m<sup>3</sup>
                                        </label>
                                    <?php elseif ($opcao == 2) : ?>
                                        <!--Sólido-->
                                        <input type="radio" class="btn-check" required id="op1" name="unidade" value="1" />
                                        <label class="btn btn-outline-primary" for="op1">
                                        kBq/kg
                                        </label>
                                        
                                        <input type="radio" class="btn-check" required id="op2" name="unidade" value="2" />
                                        <label class="btn btn-outline-primary" for="op2">
                                            kCi/kg
                                        </label>
                                        
                                        <input type="radio" class="btn-check" required id="op3" name="unidade" value="3" />
                                        <label class="btn btn-outline-primary" for="op3">
                                            Ci/kg
                                        </label>
                                        
                                        <input type="radio" class="btn-check" required id="op4" name="unidade" value="4" />
                                        <label class="btn btn-outline-primary" for="op4">
                                            mCi/kg
                                        </label>
                                    <?php endif; ?>
                                </div>
                            </div>
                            <?php if (isset($erros_validacao['unidade'])) : ?>
                                <span class="erro">
                                    <?php echo $erros_validacao['unidade']; ?>
                                </span>
                            <?php endif; ?>
                        </div>
            
                        <div class="row py-2">
                            <!--Data da medida-->
                            <div class="col-12 col-md-4">
                                <label for="data" class="form-label">
                                    <?= ($lingua == 1) ? "Data da medida:"  : "Measurement date:" ?>
                                </label>
                            </div>
                            
                            <div class="col-12 col-md-8">
                                <input class="form-control" type="date" required id="data" name="data" />
                                <?php if (isset($erros_validacao['data'])) : ?>
                                    <span class="erro">
                                        <?php echo $erros_validacao['data']; ?>
                                    </span>
                                <?php endif; ?>
                            </div>
            
                        </div>
                        <div class="d-grid">
                            <button type="submit" class="btn btn-success btn-lg mt-3 mt-md-auto">
                                <?= ($lingua == 1) ? "Calcular"  : "Calculate" ?>
                            </button>
                        </div>
                    </form>
                    <div class="alert alert-warning small">
                        (<?= 
                            $lingua == 1 ? 
                            "Segundo a publica&ccedil;&atilde;o: " :
                            "According to publication: "
                        ?>
                        <a class='letra' target='_blank' href=http://appasp.cnen.gov.br/seguranca/normas/pdf/Nrm801.pdf>CNEN-8.01 Ger&ecirc;ncia de rejeitos de baixo e m&eacute;dio n&iacute;veis de radia&ccedil;&atilde;o</a>)
                    </div>
                </div>
                <?php if (isset($data_exibicao)) : ?>
                    <div class="col-12 col-md-6 order-first order-md-last">
                        <!--Data do descarte e a atividade nessa data-->
                        <div class="border border-secondary rounded p-3 my-2">
                            <h3 class="text-primary">
                                <?= ($lingua == 1) ? "Resultado" : "Result" ?>
                            </h3>
                            <table class="table table-bordered table-striped">
                                <th>
                                    <?= ($lingua == 1) ? "Radionucl&iacute;deo" :  "Radionuclide" ?>
                                </th>
                                <td>
                                    <?php echo $radio['nome']; ?>
                                </td>
                            </tr>
                            <tr>
                                <th>
                                    <?= ($lingua == 1) ? "Estado" :  "State" ?>
                                </th>
                                <td>
                                    <?php echo $estado2; ?>
                                </td>
                            </tr>
                            <tr>
                                <th>
                                    <?= ($lingua == 1) ? "Atividade medida" :  "Measured activity" ?>
                                    
                                    <?php if ($opcao == 1) : ?>
                                        <!--Unidade para líquidos e gasosos-->
                                        (Bq/m<sup>3</sup>)
                                    <?php endif; ?>
                                    <?php if ($opcao == 2) : ?>
                                        <!--Unidade para sólidos-->
                                        (kBq/kg)
                                    <?php endif; ?>
                                </th>
                                <td>
                                    <?php echo $ainicial2; ?>
                                </td>
                            </tr>
                            <tr>
                                <th>
                                    <?= ($lingua == 1) ? "Data da medida" :  "Measurement date" ?>
                                </th>
                                <td>
                                    <?php echo $data_exibicao; ?>
                                </td>
                            </tr>
                            <tr>
                                <th>
                                    <?= ($lingua == 1) ? "Atividade para descarte" :  "Disposal activity" ?>
                                    
                                    <?php if ($opcao == 1) : ?>
                                        <!--Unidade para líquidos e gasosos-->
                                        (Bq/m<sup>3</sup>)
                                    <?php elseif ($opcao == 2) : ?>
                                        <!--Unidade para sólidos-->
                                        (kBq/kg)
                                    <?php endif; ?>
                                </th>
                                <td>
                                    <?php echo $adescarte; ?>
                                </td>
                            </tr>
                            <tr>
                                <th>
                                    <?= ($lingua == 1) ? "Meia-vida utilizada* (dias)" :  "Half-life utilized* (days)" ?>
                                </th>
                                <td>
                                    <?php echo $hl; ?>
                                </td>
                            </tr>
                            <tr>
                                <th>
                                    <?= ($lingua == 1) ? "N&uacute;mero de dias  para o descarte" :  "Numbers of days for disposal" ?>
                                </th>
                                <td>
                                    <?php echo $t; ?>
                                </td>
                            </tr>
                            <tr>
                                <th>
                                    <?= ($lingua == 1) ? "Data para descarte" :  "Disposal date" ?>
                                </th>
                                <td>
                                    <?php echo $data_descarte; ?>
                                </td>
                            </table>
                            <div class="text-center small">
                                <?= 
                                    $lingua == 1 ? 
                                    "* As meias-vidas foram obtidas do seguinte site da IAEA (Ag&ecirc;ncia Internacional de Energia At&ocirc;mica): " : 
                                    "* The half-lifes were obtained from IAEA (International Atomic Energy Agency):"
                                ?>
                                <a target="_blank" href="https://www-nds.iaea.org/relnsd/vcharthtml/VChartHTML.html">
                                    https://www-nds.iaea.org/relnsd/vcharthtml/VChartHTML.html
                                </a>
                            </div>
                        </div>
                    </div>
                <? endif ?>
            </div>

        </main>
        <!-- 
            A margem superior automática (mt-auto) serve para manter o rodapé 
            no fim da tela, desde que a tag pai ocupe toda a tela.
        -->
        <footer class="bg-primary py-3 mt-auto">
            <?php require_once 'partials/footer.php'; ?>
        </footer>
    </body>
</html>
