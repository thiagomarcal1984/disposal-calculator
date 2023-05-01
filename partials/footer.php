<?php
    // Se língua for igual a 1, temos portugu&ecirc;s;
    // Se língua for igual a 2, temos ingl&ecirc;s.
    if (isset($_GET['lingua'])) {
        $lingua = $_GET['lingua'] == 1 ? 1 : 2;
    } else {
        $lingua = 1;
    }
?>
<div class="text-bg-primary text-center small container">
    <p>
        <?= 
            $lingua == 1 ? 
            "Originalmente desenvolvido por: " : 
            "Originally developed by: "
        ?>
        Ary de Ara&uacute;jo Rodrigues J&uacute;nior (emails: <a class="link-light" href="mailto:aryarj@ig.com.br">aryarj@ig.com.br</a> ou <a class="link-light" href="mailto:aryarjyy@yahoo.com.br">aryarjyy@yahoo.com.br</a>).
    </p>
    <p>
        <?= 
            $lingua == 1 ? 
            "C&oacute;digo adaptado por: " : 
            "Code adapted by: "
        ?>
        Thiago Mar&ccedil;al Anuncia&ccedil;&atilde;o (<a class="link-light" href="mailto:tma@cdtn.br">tma@cdtn.br</a>).
    </p>
</div>
