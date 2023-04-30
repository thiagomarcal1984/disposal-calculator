<?php
    // Se língua for igual a 1, temos português;
    // Se língua for igual a 2, temos inglês.
    if (isset($_GET['lingua'])) {
        $lingua = $_GET['lingua'] == 1 ? 1 : 2;
    } else {
        $lingua = 1;
    }
?>
<h3 class="text-center text-bg-primary py-3 my-0">
    <?= 
        ($lingua == 1) ? 
        "Calculadora de Data para Descarte de Material Radioativo" :
        "Disposal Date Calculator for Radioactive Material"
    ?>
</h3>
<header class="my-0 sticky-top">
    <hr class="border my-0 border-primary">
    <nav class="navbar navbar-expand-lg bg-light">
        <div class="container">
            <a class="navbar-brand nav-link" href="index.php">
                <i class="bi bi-translate"></i>
                <?= $lingua == 1 ? "Início/Idioma" : "Home/Language" ?>
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#comandos" aria-controls="comandos" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="comandos">
                <ul class="navbar-nav">        
                    <li class="nav-item">
                        <a class="nav-link" href="controller_entrada.php?opcao=1&lingua=<?= $lingua?>">
                            <i class="ms-4 ms-md-0 bi bi-moisture"></i>
                            <?= $lingua == 1 ? "Rejeito líquido e gasoso" : "Liquid and gaseous wastes" ?>
                        </a>
                    </li>
                
                    <li class="nav-item">
                        <a class="nav-link" href="controller_entrada.php?opcao=2&lingua=<?= $lingua?>">
                            <i class="ms-4 ms-md-0 bi bi-bricks"></i>
                            <?= $lingua == 1 ? "Rejeito sólido" : "Solid waste" ?>
                        </a>
                    </li>
                
                    <li class="nav-item">
                        <a class="nav-link" href="controller_entrada.php?opcao=3&lingua=<?= $lingua?>">
                            <i class="ms-4 ms-md-0 bi bi-calculator"></i>
                            <?= $lingua == 1 ? "Ir para Parâmetros a sua escolha" : "Go to Parameters of your choice" ?>
                        </a>
                    </li>
                
                    <?php /*
                        <li class="nav-item">
                            <a class="nav-link" href="index2.php?lingua=<?= $lingua?>">
                                <?= $lingua == 1 ? "Voltar" : "Back" ?>
                            </a>
                        </li>>    
                    */ ?>
                </ul>
            </div>
        </div>
    </nav>
    <hr class="border my-0 border-primary">
</header>
