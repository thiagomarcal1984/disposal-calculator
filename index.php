<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Calculadora de Data para Descarte de Material Radioativo</title>
    <link rel="stylesheet" href="node_modules/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="node_modules/bootstrap-icons/font/bootstrap-icons.css">

    <script src="node_modules/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
</head>
<!-- 
    Aplicação das classes para que o corpo ocupe toda a altura da tela.
    Isso é necessário para manter o rodapé no fim da página, mesmo que 
    haja pouco conteúdo na tag main.
 -->
<body class="min-vh-100 d-flex flex-column">
    <?php require 'partials/header.php' ?>
    <main class="container container-md-fluid py-3">

        <h3>Disposal Date Calculator for Radioactive Material</h3>
        <p>(Seguindo a publicação/According to publication:
            <a class="letra" target="_blank" href=http://appasp.cnen.gov.br/seguranca/normas/pdf/Nrm801.pdf>
                CNEN-8.01 Gerência de rejeitos de baixo e médio níveis de radiação
            </a>)
        </p>

        <hr />

        <h3>Escolha o idioma e o tipo de calculadora: </h3>
        <div class="row p-0 p-md-3">
            <div class="col-6">
                <div class="list-group">
                    <a class="list-group-item list-group-item-action list-group-item-success active">Português</a>
                    <a href="controller_entrada.php?opcao=1&lingua=1" class="list-group-item list-group-item-action">Líquido/gasoso</a>
                    <a href="controller_entrada.php?opcao=2&lingua=1" class="list-group-item list-group-item-action">Sólido</a>
                    <a href="controller_entrada.php?opcao=3&lingua=1" class="list-group-item list-group-item-action">Parâmetros a sua escolha</a>
                </div>
            </div>
            <div class="col-6">
                <div class="list-group">
                    <a class="list-group-item list-group-item-action list-group-item-success active">English</a>
                    <a href="controller_entrada.php?opcao=1&lingua=2" class="list-group-item list-group-item-action">Liquid/gaseous</a>
                    <a href="controller_entrada.php?opcao=2&lingua=2" class="list-group-item list-group-item-action">Solid</a>
                    <a href="controller_entrada.php?opcao=3&lingua=2" class="list-group-item list-group-item-action">Parameters of your choice</a>
                </div>
            </div>
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
