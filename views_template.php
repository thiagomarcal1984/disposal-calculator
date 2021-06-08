<?php require_once 'controller_menu.php';?>
<html align="center"><font size="4">

    <head>
        <meta charset="utf-8" />
        <title>Calculadora de data para descarte de Material Radioativo</title>
        <link rel="stylesheet" href="index.css" type="text/css" />
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
            if($opcao==1)
            {
                menuInicio();
                menuSolido();
                menuParametros();
                menuVoltar();
            }
            elseif($opcao==2)
            {
                menuInicio();
                menuLiqGas();
                menuParametros();
                menuVoltar();
            }
                    
         ?>
            
            <hr/>
                <?php
                    require_once 'controller_cabecalho.php';
                    subCabecalho();
                ?>
            </hr>
            <table align="center">
                <th align=center></th>
                
                <th align=center>

            <form method='POST'>
            
                <fieldset id="contorno1" style="width:700px;height:300px; margin:auto"><font size="4">
                    <!--Identificação do radionuclídeo-->
                    <?php if($lingua==1):?>
                    <label>Radionuclídeo:</label>
                    <select type="text" required name="nome">
                    <option value="">Escolha</option>
                    <?php else:?>
                    <label>Radionuclide:</label>
                    <select type="text" required name="nome">
                    <option value="">Select</option>
                    <?php endif;?>
                   <!--<input type="text" name="nome" placeholder="Nome do radionucídeo"/>-->
                   <?php
                        if($opcao==1)//Para líquidos e gasosos
                        {
                            $dados = mysqli_query($conexao, "SELECT * FROM radio ORDER BY radionuclideo ASC");
                        }
                        elseif($opcao==2)// Para sólidos
                        {
                            $dados = mysqli_query($conexao, "SELECT * FROM radio where sol!=0 ORDER BY radionuclideo ASC");
                        }
                        while($dados2 = $dados->fetch_array())// Passando os dados do radionuclídeo selecionado para a forma de vetor e
                            {                                 // os transferindo para outra variável
                                if($lingua==1)
                                {
                                    echo '<option>'.$dados2['radionuclideo'].'</option>';
                                }
                                else
                                {
                                    echo '<option>'.$dados2['radionuclide'].'</option>';
                                }
                                
                            }
                                                      
                    ?>
                    </select>
                    
                    </label><br><br>
                                          
                   <!--Estado do radionuclídeo-->
                   <!--Líquido e gadosos-->
                   <?php if($opcao==1):?>
                <?php if($lingua==1):?>
                    <label>
                    Estado:
                        <input type="radio" required name="estado" value="1"/>
                         Liquido
                        
                        <input type="radio" required name="estado" value="2"/>
                         Gasoso
                         <?php if(isset($erros_validacao['estado'])):?>
                            <span class="erro" >
                         <?php echo $erros_validacao['estado'];?>
                            </span>
                            <?php endif;?>
                    </label><br><br>
                <?php else:?>
                        <label>
                        State:
                        <input required type="radio" name="estado" value="1"/>
                         Liquid
                        
                        <input required type="radio" name="estado" value="2"/>
                         Gaseous
                         <?php if(isset($erros_validacao['estado'])):?>
                            <span class="erro" >
                         <?php echo $erros_validacao['estado'];?>
                            </span>
                <?php endif;?>
                    </label><br><br>
                    <?php endif;?>
                    <!--Sólido-->
                    <?php elseif($opcao==2):?>
                <?php if($lingua==1):?>
                    <label>
                    Estado: Sólido (< = 1000 kg)
                      
                    </label><br><br>
                <?php else:?>
                    <label>
                    State: Solid (< = 1000 kg)
                        
                    </label><br><br>
                    <?php endif; ?>
                    <?php else:?>
                    <?php endif;?>


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
                    <!--Unidade da atividade-->
                    <!--Líquido e gadosos-->
                    <?php if($lingua==1):?>
                        <label>Unidade da atividade:
                    <?php else:?>
                        <label>Activity unit:
                    <?php endif;?>

                    <?php if($opcao==1):?>
                    
                        <input type="radio" required name="unidade" value="1"/>
                         Bq/m<sup>3</sup>

                        <input type="radio" required name="unidade" value="2"/>
                         Ci/m<sup>3</sup>

                         <input type="radio" required name="unidade" value="3"/>
                         mCi/m<sup>3</sup>

                         <input type="radio" required name="unidade" value="4"/>
                         uCi/m<sup>3</sup>
                    <!--Sólido-->
                    <?php elseif($opcao==2):?>
                    <!--<label>Unidade da atividade:-->
                        <input type="radio" required name="unidade" value="1"/>
                         kBq/kg

                        <input type="radio" required name="unidade" value="2"/>
                         kCi/kg

                         <input type="radio" required name="unidade" value="3"/>
                         mCi/kg

                         <input type="radio" required name="unidade" value="4"/>
                         uCi/kg
                    <?php else:?>
                    <?php endif;?>
                <?php if(isset($erros_validacao['unidade'])):?>
                            <span class="erro" >
                <?php echo $erros_validacao['unidade'];?>
                            </span>
                <?php endif;?>
                    </label><br><br>

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
                <?php endif;?>

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
                            <th>Radionuclídeo</th>
                            <th>Estado</th>
                            <?php if($opcao==1): ?><!--Unidade para líquidos e gasosos-->
                            <th>Atividade medida<br>(Bq/m<sup>3</sup>)</th>
                            <?php endif; ?>
                            <?php if($opcao==2): ?><!--Unidade para sólidos-->
                            <th>Atividade medida<br>(kBq/kg)</th>
                            <?php endif; ?>
                            <th>Data da<br>medida</th>
                            <?php if($opcao==1): ?><!--Unidade para líquidos e gasosos-->
                            <th>Atividade<br>para descarte<br>(Bq/m<sup>3</sup>)</th>
                            <?php endif; ?>
                            <?php if($opcao==2): ?><!--Unidade para sólidos-->
                            <th>Atividade<br>para descarte<br>(kBq/kg)</th>
                            <?php endif; ?>
                            <th>Meia-vida<br>utilizada*<br>(dias)</th>
                            <th>Número de dias <br>para o descarte</th>
                            <th>Data para<br>descarte</th>
                        <?php else:?>
                            <th>Radionuclide</th>
                            <th>State</th>
                            <?php if($opcao==1): ?><!--Unidade para líquidos e gasosos-->
                            <th>Measured activity<br>(Bq/m<sup>3</sup>)</th>
                            <?php endif; ?>
                            <?php if($opcao==2): ?><!--Unidade para sólidos-->
                            <th>Measured activity<br>(kBq/kg)</th>
                            <?php endif; ?>
                            <th>Measurement<br>date</th>
                            <?php if($opcao==1): ?><!--Unidade para líquidos e gasosos-->
                            <th>Disposal<br>activity<br>(Bq/m<sup>3</sup>)</th>
                            <?php endif; ?>
                            <?php if($opcao==2): ?><!--Unidade para sólidos-->
                            <th>Disposal<br>activity<br>(kBq/kg)</th>
                            <?php endif; ?>
                            <th>Half-life<br>utilized*<br>(days)</th>
                            <th>Numbers of days<br>for disposal</th>
                            <th>Disposal<br> date</th>
                        <?php endif;?>
                        </tr>
                    
                        <tr align=center> 
                        <?php foreach ($lista_radio as $radio) : ?>
                            <td><?php echo $radio['nome']; ?></td>
                            <td><?php echo $estado2; ?></td>                            
                            <td><?php echo $ainicial2; ?></td>
                            <td><?php echo $data_exibicao; ?></td>
                            <td><?php echo $adescarte; ?></td>
                            <td><?php echo $hl;?></td>
                            <td><?php echo $t;?></td>
                            <td><?php echo $data_descarte;?></td>
                        </tr>
                        <?php endforeach;?>
                    </table><br><br>
                                
                </fieldset>
               
<?php
    require_once 'controller_footer.php';
    footer();
    footerAutor();
?>


                
                    
                    
        </body>

</html>
