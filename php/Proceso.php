<?php

class Proceso{

    public $nombre;
    public $tEntrada;
    public $rafagas;
    public $tEspera = 0;
    public $tFinal = 0;
    public $tRetorno = 0;
    public $estado;

    function __construct($nombre,$tEntrada,$rafagas)
    {
        $this->nombre = $nombre;
        $this->tEntrada = $tEntrada;
        $this->rafagas = $rafagas;
    }

    public function setNombre($nombre){
        $this->nombre = $nombre;
    }
    public function getNombre(){
        return $this->nombre;
    }
    public function settEntrada($tEntrada){
        $this->tEntrada = $tEntrada;
    }
    public function gettEntrada(){
        return $this->tEntrada;
    }
    public function setrafaga($rafaga){
        $this->rafagas = $rafaga;
    }
    public function getrafaga(){
        return $this->rafagas;
    }
    public function settEspera($tEspera){
        $this->tEspera = $tEspera;
    }
    public function gettEspera(){
        return $this->tEspera;
    }
    public function settFinal($tFinal){
        $this->tFinal = $tFinal;
    }
    public function gettFinal(){
        return $this->tFinal;
    }
    public function settRetorno($tRetorno){
        $this->tRetorno = $tRetorno;
    }
    public function gettRetorno(){
        return $this->tRetorno;
    }
    public function setestado($estado){
        $this->estado = $estado;
    }
    public function getestado(){
        return $this->estado;
    }

    public function plusTE(){
        $this->tEspera++;
    }
    public function plusTF(){
        $this->tFinal++;
    }
    public function plusTR(){
        $this->tRetorno++;
    }
}