<?php
    require_once 'Models_Calculo.php';

    //Para líquidos, gasosos e sólidos
    $nome=$radio['nome'];//aguardando o nome do radionuclídeo
    
    if($opcao==1)//líquidos e gasosos: selecionando os dados do banco pelo nome do radionuclídeo 
    {
        if($lingua==1)
        {
            $teste = mysqli_query($conexao, "SELECT * FROM radio where radionuclideo = '$nome'");
        }
        else
        {
            $teste = mysqli_query($conexao, "SELECT * FROM radio where radionuclide = '$nome'");
        }
        
    }
    if($opcao==2)//sólidos: selecionando os dados do banco pelo nome do radionuclídeo
    {
        if($lingua==1)
        {
            $teste = mysqli_query($conexao, "SELECT * FROM radio where (radionuclideo = '$nome' and sol!=0)");
        }
        else
        {
            $teste = mysqli_query($conexao, "SELECT * FROM radio where (radionuclide = '$nome' and sol!=0)");
        }
        
    }
     while($teste2 = $teste->fetch_array())// Passando os dados do radionuclídeo selecionado para a forma de vetor e
     {                                     // os transferindo para outra variável
        if($opcao==1) // Para líquidos e gasosos
        {
            //$estado=$radio['estado'];
         if (isset($_POST['estado']) && ($_POST['estado'])!= 3)
         {
             $estado = $radio['estado'];
             if($estado == 1)
             {
                 $adescarte = $teste2['liquid'];
                 if($lingua==1)
                 {
                    $estado2='Liquido';
                 }
                 else
                 {
                    $estado2='Liquid';
                 }
                 
                 
             }
             else
             {
                 $adescarte = $teste2['gas'];
                 if($lingua==1)
                 {
                    $estado2='Gasoso';
                 }
                 else
                 {
                    $estado2='Gaseous';
                 }
                 
                 
             }
         }
         else
         {
            if($lingua==1)
            {
                $adescarte ='Especifique o estado';
                $estado2 = "Sem informa&ccedil;&atilde;o";
            }
            else
            {
                $adescarte ='Specify the condition';
                $estado2 = "without information";
            }
            
         }
        }
        elseif($opcao==2)// Para sólidos
        {
            $adescarte = $teste2['sol'];
            $estado='qualquer';
            if($lingua==1)
            {
                $estado2='S&oacute;lido';
            }
            else
            {
                $estado2='Solid';
            }
            
        }
         
         //Atividade inicial e se há essa informação
         if (isset($_POST['atividade']) && ($_POST['atividade'])!='' && is_numeric($_POST['atividade']))
         {
             $ainicial = $radio['atividade'];
         }
         else
         {
            if($lingua==1)
            {
                $ainicial ='Sem atividade inicial';
            }
            else
            {
                $ainicial ='without initial activity';
            }
            
         }
         
         //Unidade da atividade: Bq ou Ci ou sem essa informação
         if(isset($_POST['unidade']) && $_POST['unidade']!=100 && is_numeric($_POST['atividade']))
         {
                                                              
             $unidade = $radio['unidade'];
             if($unidade == 1)
             {
                 $ainicial2 = $ainicial;
             }
             if($unidade == 2)
             {
                 $ainicial2 = $ainicial*3.7E10;
             }
             if($unidade == 3)
             {
                 $ainicial2 = $ainicial*3.7E7;
             }
             if($unidade == 4)
             {
                 $ainicial2 = $ainicial*3.7E4;
             }
         }
         else
         {
            if($lingua==1)
            {
                $ainicial2 = 'sem unidade';
            }
            else
            {
                $ainicial2 = 'without unit';
            }
            
         }
         //Verificando se há data digitada
         if(isset($_POST['data']) && $_POST['data']!=''){
             /*Passando a data ano-mês-dia para uma string de exibição dia/mes/ano */
             $data_medida=$radio['data'];
             $data_explodida = explode("-", $data_medida);
             
             $data_exibicao="{$data_explodida[2]}/{$data_explodida[1]}/{$data_explodida[0]}";
            
             
         }
         else
         {
            if($lingua==1)
            {
                $data_exibicao='digite uma data';
            }
            else
            {
                $data_exibicao='enter a date';
            }
            
         }
         /*Capturando a meia vida do radionuclideo*/
         $hl=$teste2['hl'];


         // verficando se há dados numéricos em todas as variáveis para efetuar o cálculo
         if((isset($estado)) && isset($adescarte) && $adescarte>=0 && isset($ainicial2) && is_numeric($ainicial2) && $ainicial2>0 && isset($radio['data']))
        {
             /*Verificação se a atividade do material já é menor do que a de descarte,
             antes de realizar o cálculo de dias para o descarte*/
             if($ainicial2<=$adescarte){
                if($lingua==1)
                {
                    $t='Descarte imediato';
                    $data_descarte='Descarte imediato';
                }
                else
                {
                    $t='Immediate disposal ';
                    $data_descarte='Immediate disposal';
                }
                
             }
             else
             {
                $dias=new Models_Calculo;
                $dias->setMeiaVida($teste2['hl']);
                $dias->setAtividadeDescarte($adescarte);
                $dias->setAtividade($ainicial2);
                
                $t=$dias->calcularDias();
                
                $data_descarte=date("d/m/Y", mktime(0, 0, 0, $data_explodida[1], $data_explodida[2]+$t, $data_explodida[0]));
             }
         }
         else
         {
            if($lingua==1)
            {
                $t='sem par&acirc;metros';
                $data_descarte='sem par&acirc;metros';
            }
            else
            {
                $t='without parameters';
                $data_descarte='without parameters';
            }
            
         }
         
         
     }
     
     
       require_once "views_template.php";
                                
 