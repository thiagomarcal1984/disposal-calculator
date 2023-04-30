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
    <?php require 'partials/header.php' ?>

    <main class="container container-md-fluid pt-3">
        <div class="row align-items-start">
            <div class="col-12 col-md-6 order-md-first order-last my-2">
                <form class="border border-secondary rounded p-3" method="POST">
                    <h3 class="text-primary">
                        <?= $lingua == 1 ? "Parâmetros a sua escolha" : "Parameters of your choice" ?>
                    </h3>
                    <div class="row py-2">
                        <!--Atividade-->
                        <label for="atividade" class="col-form-label col-12 col-md-5">
                            <?= ($lingua == 1)  ? "Atividade:" : " Activity:" ?>
                        </label>
                        <div class="col-12 col-md-7">
                            <input class="form-control" type="text" required id="atividade" name="atividade" placeholder="Ex: 1234 ; 1.234e3" />
                            <?php if (isset($erros_validacao['atividade'])) : ?>
                                <span class="erro">
                                    <?php echo $erros_validacao['atividade']; ?>
                                </span>
                            <?php endif; ?>
                        </div>
                    </div>

                    <div class="row py-2">
                        <!--Atividade de descarte-->
                        <label for="atividadeDescarte" class="col-form-label col-12 col-md-5">
                            <?= ($lingua == 1) ?
                                "Atividade de descarte (COM A MESMA UNIDADE DA ATIVIDADE):" :
                                "Disposal activity (USE THE SAME UNIT OF ACTIVITY):"
                            ?>
                        </label>
                        <div class="col-12 col-md-7">
                            <input class="form-control" type="text" required id="atividadeDescarte" name="atividadeDescarte" placeholder="Ex: 1234 ; 1.234e3" />
                            <?php if (isset($erros_validacao['atividadeDescarte'])) : ?>
                                <span class="erro">
                                    <?php echo $erros_validacao['atividadeDescarte']; ?>
                                </span>
                            <?php endif; ?>
                        </div>
                    </div>

                    <div class="row py-2">
                        <!--Meia-Vida-->
                        <label for="hl" class="col-form-label col-12 col-md-5">
                            <?= ($lingua == 1) ? "Meia-Vida (EM DIAS):" : "Half-life (IN DAYS):" ?>
                        </label>
                        <div class="col-12 col-md-7">
                            <input class="form-control" type="text" required id="hl" name="hl" placeholder="Ex: 1234 ; 1.234e3" />
                            <?php if (isset($erros_validacao['hl'])) : ?>
                                <span class="erro">
                                    <?php echo $erros_validacao['hl']; ?>
                                </span>
                            <?php endif; ?>
                        </div>
                    </div>

                    <div class="row py-2">
                        <!--Data da medida-->
                        <label for="data" class="col-form-label col-12 col-md-5">
                            <?= ($lingua == 1) ? "Data da medida:"  : "Measurement date:" ?>
                        </label>
                        <div class="col-12 col-md-7">
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
            </div>
            <?php if (isset($data_exibicao)) : ?>
                <!--Data do descarte e a atividade nessa data-->
                <div class="col-12 col-md-6 order-first order-md-last my-2">
                    <div class="border border-secondary rounded p-3">
                        <h3 class="text-primary">
                            <?= ($lingua == 1) ? "Resultado" : "Result" ?>
                        </h3>
                        <table class="table table-bordered table-striped">
                            <tr>
                                <th>
                                    <?= ($lingua == 1) ? "Atividade medida" : "Measured activity" ?>:
                                </th>
                                <td>
                                    <?php echo $radio['atividade']; ?>
                                </td>
                            </tr>
                            <tr>
                                <th>
                                    <?= ($lingua == 1) ? "Data da medida" : "Measurement date" ?>:
                                </th>
                                <td>
                                    <?php echo $data_exibicao; ?>
                                </td>
                            </tr>
                            <tr>
                                <th>
                                    <?= ($lingua == 1) ? "Atividade para descarte" : "Disposal activity" ?>:
                                </th>
                                <td>
                                    <?php echo $atividadeDescarte; ?>
                                </td>
                            </tr>
                            <tr>
                                <th>
                                    <?= ($lingua == 1) ? "Meia-vida utilizada (dias)" : "Half-life utilized (days) " ?>:
                                </th>
                                <td>
                                    <?php echo $hl; ?>
                                </td>
                            </tr>
                            <tr>
                                <th>
                                    <?= ($lingua == 1) ? "Número de dias para o descarte" : "Numbers of days for disposal" ?>:
                                </th>
                                <td>
                                    <?php echo $t; ?>
                                </td>
                            </tr>
                            <tr>
                                <th>
                                    <?= ($lingua == 1) ? "Data para descarte" : "Disposal date" ?>:
                                </th>
                                <td>
                                    <?php echo $data_descarte; ?>
                                </td>
                            </tr>
                            <tr>
                            </tr>
                        </table>
                    </div>
                </div>
            <?php endif ?>
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
