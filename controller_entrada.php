<?php
require_once "conexao.php";
//colocondo os valores 'opcao' e 'lingua' em variáveis
$opcao=$_GET['opcao'];
//echo $opcao;
$lingua=$_GET['lingua'];
//echo $lingua;

// Deixando a primeira entrada (nome do radionuclídeo e demais)
//com uma informação qualquer, para não gerar erro
    if($opcao==1)
    {
        $radio=array('nome'=>'qualquer',
                        'estado'=>3,
                        'atividade'=>'',
                        'unidade'=>100,
                        'data'=>''
                        );
    }
    elseif($opcao==2)
    {
        $radio=array('nome'=>'qualquer',
                        'atividade'=>'',
                        'unidade'=>100,
                        'data'=>''
                        );
    }
    elseif($opcao==3)
    {
        $radio=array('atividade'=>'',
                        'atividadeDescarte'=>'',
                        'hl'=>'',
                        'data'=>''
                        );
    }
            
    // vetor para os erros    
    $erros_validacao=array();
            
    // retenção dos dados com método 'POST'
    // quando há escolha de radionuclideo 
    if($opcao!=3)//Para liquidos, gasosos e sólidos
    {
        if (isset($_POST['nome']) && $_POST['nome'] != '')
        {
            $radio = array();
            
            // nome do radionuclídeo
            $radio['nome']=$_POST['nome'];
                        
            //Estado do radionuclídeo
            if($opcao==1)//Para liquidos e gasosos
            {
                if (isset($_POST['estado']) && ($_POST['estado'])!= 3){
                    $radio['estado']=$_POST['estado'];
                }
                else
                {
                    if($lingua==1)
                    {
                        $erros_validacao['estado']='O estado do radionuclídeo é obrigatório!';
                    }
                    else
                    {
                        $erros_validacao['estado']='The radionuclide condition is obligatory!';
                    }
                    
                }
            }
            elseif ($opcao==2)//Sólidos
            {
                // É pre-establelecido
            }          
            

            // Atividade inicial
            if (isset($_POST['atividade']) && ($_POST['atividade'])!='' && is_numeric($_POST['atividade'])){
                $radio['atividade']=$_POST['atividade'];
            }
            else
            {
                if($lingua==1)
                {
                    $erros_validacao['atividade']='A atividade inicial é obrigatória!';
                }
                else
                {
                    $erros_validacao['atividade']='The initial activity is obligatory!';
                }
                
            }

            // Unidade    
            if (isset($_POST['unidade']) && ($_POST['unidade'])!= 100)
            {
                $radio['unidade']=$_POST['unidade'];
            }
            else
            {
                if($lingua==1)
                {
                    $erros_validacao['unidade']='A unidade é obrigatória!';
                }
                else
                {
                    $erros_validacao['unidade']='The unit is obligatory!';
                }
                
            }
            
            // Data da medida
            if (isset($_POST['data']) && ($_POST['data'])!=''){
            $radio['data']=$_POST['data'];
            }
            else
            {
                if($lingua==1)
                {
                    $erros_validacao['data']='A data da medida é obrigatória!';
                }
                else
                {
                    $erros_validacao['data']='The date of the measure is obligatory!';
                }
                
            }

            $SESSION[]=$radio;
            
        }
    }
    //Quando o usuário escolhe os parâmetros
    else
    {
        
        if (isset($_POST['atividade']) && $_POST['atividade'] != '' && is_numeric($_POST['atividade']))
        {
            
			
			$radio['atividade']=$_POST['atividade'];
            
            
            // Atividade de descarte
            if (isset($_POST['atividadeDescarte']) && ($_POST['atividadeDescarte'])!='' && is_numeric($_POST['atividadeDescarte'])){
                $radio['atividadeDescarte']=$_POST['atividadeDescarte'];
            }
            else
            {
                if($lingua==1)
                {
                    $erros_validacao['atividadeDescarte']='A atividade de descarte é obrigatória!';
                }
                else
                {
                    $erros_validacao['atividadeDescarte']='The disposal activity is obligatory!';
                }
                
                
            }

            // meia-vida
            if (isset($_POST['hl']) && ($_POST['hl'])!='' && is_numeric($_POST['hl'])){
                $radio['hl']=$_POST['hl'];
            }
            else
            {
                if($lingua==1)
                {
                    $erros_validacao['hl']='A meia-vida é obrigatória!';
                }
                else
                {
                    $erros_validacao['hl']='The half-life is obligatory!';
                }
                
                
            }
                            
            // Data da medida
            if (isset($_POST['data']) && ($_POST['data'])!=''){
            $radio['data']=$_POST['data'];
            }
            else
            {
                if($lingua==1)
                {
                    $erros_validacao['data']='A data da medida é obrigatória!';
                }
                else
                {
                    $erros_validacao['data']='The date of the measure is obligatory!';
            }
                }
                

            $SESSION[]=$radio;
            
        }
		elseif(isset($_POST['atividade']) && $_POST['atividade']!='' && is_string($_POST['atividade']) )
        {
			if($lingua==1)
                {
                    $erros_validacao['atividade']='A atividade inicial é obrigatória!';
                }
                else
                {
                    $erros_validacao['atividade']='The initial activity is obligatory!';
                }
		}
    }
    
        $lista_radio[] = array();
        
        if(isset($SESSION)){
            $lista_radio = $SESSION;
        }else{
            $lista_radio=array();
        }
        
        if($opcao==1 || $opcao==2)
        {
            require_once "controller_calculo.php";
        }
        else
        {
            require_once "controller_calculoParam.php";
        }      
        
       