<?php
class Models_Calculo
{
    //Atributos
    private $atividade;
    private $meiaVida;
    // private $atividadeReferencia;
    private $atividadeDescarte;

    //Métodos
    function calcularDias()
    {
        return round((-$this->getMeiaVida()/log(2))*(log($this->getAtividadeDescarte()/$this->getAtividade())));
    }
    
    //Getters
    function getAtividade()
    {
        return $this->atividade;
    }
    function getMeiaVida()
    {
        return $this->meiaVida;
    }
    function getAtividadeDescarte()
    {
        return $this->atividadeDescarte;
    }
    
    //Setters
    function setAtividade($atividade)
    {
        $this->atividade=$atividade;
    }
    function setMeiaVida($meiaVida)
    {
        $this->meiaVida=$meiaVida;
    }
    function setAtividadeDescarte($atividadeDescarte)
    {
        $this->atividadeDescarte=$atividadeDescarte;
    }
    
}