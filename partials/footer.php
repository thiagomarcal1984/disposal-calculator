<?php
    // Se língua for igual a 1, temos português;
    // Se língua for igual a 2, temos inglês.
    if (isset($_GET['lingua'])) {
        $lingua = $_GET['lingua'] == 1 ? 1 : 2;
    } else {
        $lingua = 1;
    }
?>
<div class="text-bg-primary text-center small">
    <p>
        <?= 
            $lingua == 1 ? 
            "Originalmente desenvolvido por: " : 
            "Originally developed by: "
        ?>
        Ary de Araújo Rodrigues Júnior (emails: <a class="link-light" href="mailto:aryarj@ig.com.br">aryarj@ig.com.br</a> ou <a class="link-light" href="mailto:aryarjyy@yahoo.com.br">aryarjyy@yahoo.com.br</a>).
    </p>
    <p>
        <?= 
            $lingua == 1 ? 
            "Código adaptado por: " : 
            "Code adapated by: "
        ?>
        Thiago Mar&ccedil;al Anuncia&ccedil;&atilde;o (<a class="link-light" href="mailto:tma@cdtn.br">tma@cdtn.br</a>).
    </p>
</div>
