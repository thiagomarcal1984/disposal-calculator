<?php require_once 'controller_menu.php';?>
<html align="center"><font size="4">

    <head>
        <meta charset="utf-8" />
        <title>Calculadora de data para descarte de Material Radioativo</title>
        <link rel="stylesheet" href="index.css" type="text/css" />
        <link rel="stylesheet" href="estilo.css">
        <style>
        .erro{
			color: red;
			font-size: 20px}
        </style>
    </head>
        <body>
            <?php
                require_once 'controller_cabecalho.php';
                cabecalho();
            ?>
        <hr/>
        <?php
            menuInicio();
            menuLiqGas();
            menuSolido();
            menuVoltar();
                                
         ?>
            
            <hr/>
            <br>
            <table align="center">
                <th align=center></th>
                
                <th align=center>

            <form method='POST'>
            
                <fieldset id="contorno1" style="width:740px;height:300px; margin:auto"><font size="4">
                <br> 
                <!--Atividade-->
                <label>
                <?php if($lingua==1):?>
                    Atividade:
                <?php else:?>
                    Activity:
                <?php endif; ?>
                    <input type="text" required name="atividade" placeholder="Ex: 1234 ; 1.234e3"/>
                </label>
                <?php if(isset($erros_validacao['atividade'])):?>
                            <span class="erro" >
                <?php echo $erros_validacao['atividade'];?>
                            </span>
                <?php endif;?><br><br>

                <?php if($lingua==1):?>
                <label align=left>Atividade de descarte (COM A MESMA UNIDADE DA ATIVIDADE):</label>
                <?php else:?>
                <label align=left>
                    Disposal activity (USE THE SAME UNIT OF ACTIVITY):</label>
                <?php endif; ?>
                    <input type="text" required name="atividadeDescarte" placeholder="Ex: 1234 ; 1.234e3"/>
                
                <?php if(isset($erros_validacao['atividadeDescarte'])):?>
                            <span class="erro" >
                <?php echo $erros_validacao['atividadeDescarte'];?>
                            </span>
                <?php endif;?><br><br>

                <label>
                <?php if($lingua==1):?>
                    Meia-Vida (EM DIAS):
                <?php else:?>
                    Half-life (IN DAYS):
                <?php endif; ?>
                    <input type="text" required name="hl" placeholder="Ex: 1234 ; 1.234e3"/>
                </label>
                <?php if(isset($erros_validacao['hl'])):?>
                            <span class="erro" >
                <?php echo $erros_validacao['hl'];?>
                            </span>
                <?php endif;?><br><br>

                <!--Data da medida-->
                <label>
                <?php if($lingua==1):?>
                    Data da medida:
                <?php else:?>
                    Measurement date:
                <?php endif; ?>
                    <input type="date" required name="data"/>
                  <?php if(isset($erros_validacao['data'])):?>
                            <span class="erro" >
                  <?php echo $erros_validacao['data'];?>
                            </span>
                  <?php endif;?>
                 </label>
                 &nbsp; &nbsp;
                 <?php if($lingua==1):?>
                    <input type="submit" value="Calcular"/><br><br>
                <?php else:?>
                    <input type="submit" value="Calculate"/><br><br>
                <?php endif; ?>
                </fieldset>
                </form>
                <br>
                </th>
                
                <th align=center></th>
            </table>


                <fieldset id="contorno1" style="width:1200px;height:100px; margin: auto">
                
                    <!--Data do descarte e a atividade nessa data-->
                    <table align=center border="1" width="1000px">
                        <tr align=center>
                        <?php if($lingua==1):?>
                            <th>Atividade medida</th>
                            <th>Data da<br>medida</th>
                            <th>Atividade<br>para descarte</th>
                            <th>Meia-vida<br>utilizada<br>(dias)</th>
                            <th>Número de dias <br> para o descarte</th>
                            <th>Data para<br>descarte</th>
                        <?php else:?>
                            <th>Measured activity</th>
                            <th>Measurement<br>date</th>
                            <th>Disposal<br>activity</th>
                            <th>Half-life<br>utilized<br>(days)</th>
                            <th>Numbers of days<br>for disposal</th>
                            <th>Disposal<br>date</th>
                        <?php endif;?>
                        </tr>
                    
                        <tr align=center> 
                        <?php foreach ($lista_radio as $radio) : ?>
                            <td><?php echo $radio['atividade']; ?></td>
                            <td><?php echo $data_exibicao; ?></td>
                            <td><?php echo $atividadeDescarte; ?></td>
                            <td><?php echo $hl;?></td>
                            <td><?php echo $t;?></td>
                            <td><?php echo $data_descarte;?></td>
                        </tr>
                        <?php endforeach;?>
                    </table><br><br>
                                
                </fieldset>

                <?php
                    require_once 'controller_footer.php';
                    footerAutor();
                    //echo 'PHP current version: ' . phpversion();
                ?>  
                

        </body>

</html>