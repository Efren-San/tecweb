<?php namespace Backend\MyApi\Read;

use Backend\MyApi\DataBase as DataBase;

class Read extends DataBase {
    public function __construct($db) {
        $this->data = array();
        parent::__construct($db, 'root', '12345678a');
    }

    // Obtener lista de productos no eliminados
    public function list() {
        $sql = "SELECT * FROM productos WHERE eliminado = 0";
        $result = $this->conexion->query($sql);

        if ($result) {
            $rows = $result->fetch_all(MYSQLI_ASSOC);
            $this->data = $rows;
            $result->free();
        } else {
            $this->data = [
                'status'  => 'error',
                'message' => 'Error en la consulta: ' . mysqli_error($this->conexion)
            ];
        }
        $this->conexion->close();
    }

    // Buscar productos por texto
    public function search($search) {
        if (isset($search)) {
            $sql = "SELECT * FROM productos WHERE (id = '{$search}' OR nombre LIKE '%{$search}%' OR marca LIKE '%{$search}%' OR detalles LIKE '%{$search}%') AND eliminado = 0";
            $result = $this->conexion->query($sql);

            if ($result) {
                $rows = $result->fetch_all(MYSQLI_ASSOC);
                $this->data = $rows;
                $result->free();
            } else {
                $this->data = [
                    'status'  => 'error',
                    'message' => 'Error en la consulta: ' . mysqli_error($this->conexion)
                ];
            }
            $this->conexion->close();
        }
    }

    // Obtener un solo producto por ID
    public function single($id) {
        if (isset($id)) {
            $sql = "SELECT * FROM productos WHERE id = {$id}";
            $result = $this->conexion->query($sql);

            if ($result) {
                $row = $result->fetch_assoc();
                if ($row) {
                    $this->data = $row;
                } else {
                    $this->data = [
                        'status'  => 'error',
                        'message' => 'Producto no encontrado'
                    ];
                }
                $result->free();
            } else {
                $this->data = [
                    'status'  => 'error',
                    'message' => 'Error en la consulta: ' . mysqli_error($this->conexion)
                ];
            }
            $this->conexion->close();
        }
    }
}
