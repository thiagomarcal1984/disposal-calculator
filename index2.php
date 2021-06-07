<?php require_once 'controller_menu.php';?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8"/>
    <link rel="stylesheet" href="estilo.css">
</head>
<body>
<div>
    <?php
    require_once 'controller_cabecalho.php';
    cabecalho();
    subCabecalho();
    ?>
</div>
<hr/>
<?php
    subEscolha();
    ?>
</div>
<hr/>
<table>
    <tr>
        <td>
            <?php
            menuIndex();
            ?>
        </td>
    </tr>

</table>
<br/>


<hr/>

</body>
</html>
