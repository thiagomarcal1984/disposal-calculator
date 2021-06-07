<?php
    require_once 'Models_Calculo.php';
    
    //Quando o usuário escolhe os parâmetros
    
    $atividade=$radio['atividade'];//aguardando o valor da atividade inicial do radionuclídeo
                        
    //Atividade de descarte e se há essa informação
    if (isset($_POST['atividadeDescarte']) && ($_POST['atividadeDescarte'])!='' && is_numeric($_POST['atividadeDescarte']))
    {
        $atividadeDescarte = $radio['atividadeDescarte'];
    }
    else
    {
        if($lingua==1)
        {
            $atividadeDescarte ='Sem atividade de descarte';
        }
        else
        {
            $atividadeDescarte ='without disposal activity';
        }
        
    }
    //Meia-vida e se há essa informação
    if (isset($_POST['hl']) && ($_POST['hl'])!='' && is_numeric($_POST['hl']))
    {
        $hl = $radio['hl'];
    }
    else
    {
        if($lingua==1)
        {
            $hl ='sem meia-vida';
        }
        else
        {
            $hl ='without half-life';
        }
        
    }
             
    //Verificando se há data digitada e se há atividade valida (numérica, não é string e vazia)
	if (isset($_POST['atividade']) && $_POST['atividade'] != '' && is_numeric($_POST['atividade']))
	{
		if(isset($_POST['data']) && $_POST['data']!='')
		{
        //Passando a data ano-mês-dia para uma string de exibição dia/mes/ano
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
	}
	
    

         
     // verficando se há dados numéricos em todas as variáveis para efetuar o cálculo
     if(isset($atividade) && is_numeric($atividade) && $atividade>0 && isset($atividadeDescarte) && $atividadeDescarte>=0 && isset($hl) && is_numeric($hl) && $hl>0 && isset($radio['data']))
    {
         //Verificação se a atividade do material já é menor do que a de descarte,
         //antes de realizar o cálculo de dias para o descarte
         if($atividade<=$atividadeDescarte){
            if($lingua==1)
            {
                $t='Descarte imediato';
                $data_descarte='Descarte imediato';
            }
            else
            {
                $t='Immediate disposal';
                $data_descarte='Immediate disposal';
            }
            
         }
         else
         {
            $dias=new Models_Calculo;
            $dias->setMeiaVida($hl);
            $dias->setAtividadeDescarte($atividadeDescarte);
            $dias->setAtividade($atividade);
            
            $t=$dias->calcularDias();
            
            $data_descarte=date("d/m/Y", mktime(0, 0, 0, $data_explodida[1], $data_explodida[2]+$t, $data_explodida[0]));
             
         }
     }
     else
     {
        if($lingua==1)
        {
            $t='sem parâmetros';
            $data_descarte='sem parâmetros';
        }
        else
        {
            $t='without parameters';
            $data_descarte='without parameters';
        }
     }
         
    require_once "views_templateParam.php";
                                
 