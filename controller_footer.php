<?php

function footer()
{
    $lingua=$_GET['lingua'];
    if($lingua==1)
    {
        echo "<p align=center>* As meias-vidas foram obtidas do seguinte site da IAEA (Agência Internacional de Energia Atômica): <a target='_blank' href = https://www-nds.iaea.org/relnsd/vcharthtml/VChartHTML.html>https://www-nds.iaea.org/relnsd/vcharthtml/VChartHTML.html/<a></P>";
        
    }
    else
    {
        echo "<p align=center>* The half-lifes were obtained from IAEA (International Atomic Energy Agency):<a target='_blank' href = https://www-nds.iaea.org/relnsd/vcharthtml/VChartHTML.html>https://www-nds.iaea.org/relnsd/vcharthtml/VChartHTML.html/<a></P>";
        
    }
} 

function footerAutor()
{
    $lingua=$_GET['lingua'];
    if($lingua==1)
    {
        echo "<p align=center>Originalmente desenvolvido por: Ary de Araújo Rodrigues Júnior; emails: aryarj@ig.com.br ou aryarjyy@yahoo.com.br</P>";
        
    }
    else
    {
        echo "<p align=center>Originally developed by: Ary de Araujo Rodrigues Junior; emails: aryarj@ig.com.br or aryarjyy@yahoo.com.br</P>";
    }
} 




    