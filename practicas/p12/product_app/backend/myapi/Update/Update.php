<?php
    //namespace TECWEB\MYAPI\UPDATE;
    //use TECWEB\MYAPI\DataBase as DataBase;
    require_once __DIR__.'/../DataBase.php';

    Class Update extends DataBase {
        public function __construct($db) {
            $this->data = array();
            parent::__construct($db, 'root', '12345678a');
        }

        public function edit($Object) {
            $this->data = array(
                'status'  => 'error',
                'message' => 'La consulta falló'
            );
            if( isset($Object->id) ) {
                $sql =  "UPDATE productos SET nombre='{$Object->nombre}', marca='{$Object->marca}',";
                $sql .= "modelo='{$Object->modelo}', precio={$Object->precio}, detalles='{$Object->detalles}',"; 
                $sql .= "unidades={$Object->unidades}, imagen='{$Object->imagen}' WHERE id={$Object->id}";
                $this->conexion->set_charset("utf8");
                if ( $this->conexion->query($sql) ) {
                    $this->data['status'] =  "success";
                    $this->data['message'] =  "Producto actualizado";
                } else {
                    $this->data['message'] = "ERROR: No se ejecuto $sql. " . mysqli_error($this->conexion);
                }
                $this->conexion->close();
            }
        }
    }
?>