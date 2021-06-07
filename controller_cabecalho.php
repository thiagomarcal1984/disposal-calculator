<?php

function cabecalho()
{
    $lingua=$_GET['lingua'];
    if($lingua==1)
    {
        echo "<h1>Calculadora de Data para Descarte de Material Radioativo</h1>";
        
    }
    else
    {
        echo "<h1>Disposal Date Calculator for Radioactive Material</h1>";
        
    }
} 

function subCabecalho()
{
    $lingua=$_GET['lingua'];
    if($lingua==1)
    {
        echo "<h3>(Seguindo a publicação: <a class='letra' target='_blank' href=http://appasp.cnen.gov.br/seguranca/normas/pdf/Nrm801.pdf><font size='4'>CNEN-8.01 Gerência de rejeitos de baixo e médio níveis de radiação)</font></a></h3>";
    }
    else
    {
        echo "<h3>(According to publication:&nbsp;<a class='letra' target='_blank' href=http://appasp.cnen.gov.br/seguranca/normas/pdf/Nrm801.pdf><font size='4'>CNEN-8.01 Gerência de rejeitos de baixo e médio níveis de radiação)</font></a></h3>";
    }
} 

function subEscolha()
{
    $lingua=$_GET['lingua'];
    if($lingua==1)
    {
        echo "<h2>Selecione o estado físico do radonuclídeo (líquido, gasoso ou sólido) ou defina você mesmo os parâmetros</h2>";
    }
    else
    {
        echo "<h2>Select the radionuclide state (liquid, gasous or solid) or define yourself the parameters</h2>";
    }
} 
    