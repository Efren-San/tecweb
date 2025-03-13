<?php
class Tabla{
    private $matriz = array();
    private $numFilas;
    private $numColumnas;
    private $estilo;

    public function __construct($rows, $cols, $style){
        this->$numFilas     =rows;
        this->$numColumnas  =cols;
        this->$estilo       =style;
    
    }
}

?>