<?php

function menuIndexIngl()
{
    echo "<a href='index2.php?lingua=1'>Português</a><br><br>";
    echo "<a href='index2.php?lingua=2'>English</a><br><br>";
}

function menuIndex()
{
    $lingua=$_GET['lingua'];
    if($lingua==1)
    {
        echo "<a href='index.php'>Idioma</a><br><br>";
        echo "<a href='controller_entrada.php?opcao=1&lingua=1'>Líquido ou gasoso</a><br><br>";
        echo "<a href='controller_entrada.php?opcao=2&lingua=1'>Sólido</a><br><br>";
        echo "<a href='controller_entrada.php?opcao=3&lingua=1'>Parâmetros a sua escolha</a>";
    }
    else
    {
        echo "<a href='index.php'>Language</a><br><br>";
        echo "<a href='controller_entrada.php?opcao=1&lingua=2'>Liquid or gaseous</a><br><br>";
        echo "<a href='controller_entrada.php?opcao=2&lingua=2'>Solid</a><br><br>";
        echo "<a href='controller_entrada.php?opcao=3&lingua=2'>Parameters of your choice</a>";
    }
    
    
}

function menuLiqGas()
{
    $lingua=$_GET['lingua'];
    if($lingua==1)
    {
        echo "<a href='controller_entrada.php?opcao=1&lingua=1' style='text-decoration:none; font-weight:bold;'><font size='5'>&nbsp;&nbsp;Ir para rejeito líquido e gasoso&nbsp;</font></a>";
        echo "&nbsp;&nbsp;";
    }
    else
    {
        echo "<a href='controller_entrada.php?opcao=1&lingua=2' style='text-decoration:none; font-weight:bold;'><font size='5'>&nbsp;&nbsp;Go to liquid and gaseous wastes&nbsp;</font></a>";
        echo "&nbsp;&nbsp;";
    }
    
}

function menuSolido()
{
    $lingua=$_GET['lingua'];
    if($lingua==1)
    {
        echo "<a href='controller_entrada.php?opcao=2&lingua=1' style='text-decoration:none; font-weight:bold;'><font size='5'>&nbsp;&nbsp;Ir para rejeito sólido&nbsp;</font></a>";
        echo "&nbsp;&nbsp;";
    }
    else
    {
        echo "<a href='controller_entrada.php?opcao=2&lingua=2' style='text-decoration:none; font-weight:bold;'><font size='5'>&nbsp;&nbsp;Go to solid waste&nbsp;</font></a>";
        echo "&nbsp;&nbsp;";
    }
    
    
}

function menuParametros()
{
    $lingua=$_GET['lingua'];
    if($lingua==1)
    {
        echo "<a href='controller_entrada.php?opcao=3&lingua=1' style='text-decoration:none; font-weight:bold;'><font size='5'>&nbsp;&nbsp;Ir para Parâmetros a sua escolha&nbsp;</font></a>";
        echo "&nbsp;&nbsp;";
    }
    else
    {
        echo "<a href='controller_entrada.php?opcao=3&lingua=2' style='text-decoration:none; font-weight:bold;'><font size='5'>&nbsp;&nbsp;Go to Parameters of your choice&nbsp;</font></a>";
        echo "&nbsp;&nbsp;";
    }
    
}

function menuInicio()
{
    $lingua=$_GET['lingua'];
    if($lingua==1)
    {
        echo "<a href='index.php' style='text-decoration:none; font-weight:bold;'><font size='5'>&nbsp;&nbsp;Idioma&nbsp;</font></a>";
        echo "&nbsp;&nbsp;";
    }
    else
    {
        echo "<a href='index.php' style='text-decoration:none; font-weight:bold;'><font size='5'>&nbsp;&nbsp;Language&nbsp;</font></a>";
        echo "&nbsp;&nbsp;";
    }
    
}

function menuVoltar()
{
    $lingua=$_GET['lingua'];
    if($lingua==1)
    {
        echo "<a href='index2.php?lingua=1' style='text-decoration:none; font-weight:bold;'><font size='5'>&nbsp;&nbsp;Voltar&nbsp;</font></a>";
        echo "&nbsp;&nbsp;";
    }
    else
    {
        echo "<a href='index2.php?lingua=2' style='text-decoration:none; font-weight:bold;'><font size='5'>&nbsp;&nbsp;Back&nbsp;</font></a>";
        echo "&nbsp;&nbsp;";
    }
    
}
