<?php namespace Backend\MyApi\Create;

use Backend\MyApi\DataBase as DataBase;

class Create extends DataBase {
    public function __construct($db) {
        parent::__construct($db, 'root', '12345678a');
    }

    // Método para agregar un nuevo producto
    public function add($Object) {
        // Respuesta inicial con mensaje de error
        $this->data = [
            'status'  => 'error',
            'message' => 'Ya existe un producto con ese nombre'
        ];

        // Verificamos que el nombre del producto esté presente
        if (isset($Object->nombre)) {
            // Verificamos si el producto ya existe en la base de datos
            $sql = "SELECT * FROM productos WHERE nombre = '{$Object->nombre}' AND eliminado = 0";
            $result = $this->conexion->query($sql);
            
            if ($result->num_rows == 0) {
                // Si no existe, procedemos a insertar el nuevo producto
                $this->conexion->set_charset("utf8");
                $sql = "INSERT INTO productos (nombre, marca, modelo, precio, detalles, unidades, imagen, eliminado)
                        VALUES ('{$Object->nombre}', '{$Object->marca}', '{$Object->modelo}', {$Object->precio}, '{$Object->detalles}', {$Object->unidades}, '{$Object->imagen}', 0)";
                
                if ($this->conexion->query($sql)) {
                    // Si la inserción es exitosa, enviamos un mensaje de éxito
                    $this->data['status'] = "success";
                    $this->data['message'] = "Producto agregado correctamente";
                } else {
                    // Si ocurre un error en la ejecución del SQL
                    $this->data['message'] = "ERROR: No se ejecutó la consulta. " . mysqli_error($this->conexion);
                }
            } else {
                // Si el producto ya existe
                $this->data['message'] = "ERROR: Ya existe un producto con ese nombre";
            }

            // Liberamos el resultado y cerramos la conexión
            $result->free();
            $this->conexion->close();
        } else {
            // Si no se proporciona un nombre de producto
            $this->data['message'] = "ERROR: El nombre del producto es obligatorio";
        }
    }
}
