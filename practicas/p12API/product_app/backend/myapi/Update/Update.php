<?php namespace Backend\MyApi\Update;

use Backend\MyApi\DataBase as DataBase;

class Update extends DataBase {
    public function __construct($db) {
        parent::__construct($db, 'root', '12345678a');
    }

    // Método para editar un producto
    public function edit($Object) {
        // Iniciar la respuesta con un mensaje de error
        $this->data = [
            'status'  => 'error',
            'message' => 'La consulta falló'
        ];

        // Verificamos que el objeto tenga un ID
        if (isset($Object->id)) {
            // Creamos la consulta SQL para actualizar el producto
            $sql = "UPDATE productos SET 
                        nombre = '{$Object->nombre}',
                        marca = '{$Object->marca}',
                        modelo = '{$Object->modelo}',
                        precio = {$Object->precio},
                        detalles = '{$Object->detalles}',
                        unidades = {$Object->unidades},
                        imagen = '{$Object->imagen}'
                    WHERE id = {$Object->id}";

            // Establecer la codificación a UTF-8
            $this->conexion->set_charset("utf8");

            // Ejecutar la consulta
            if ($this->conexion->query($sql)) {
                // Si la consulta es exitosa, actualizamos el mensaje
                $this->data['status'] = "success";
                $this->data['message'] = "Producto actualizado correctamente";
            } else {
                // Si la consulta falla, mostramos el error
                $this->data['message'] = "ERROR: No se ejecutó $sql. " . mysqli_error($this->conexion);
            }

            // Cerrar la conexión a la base de datos
            $this->conexion->close();
        }
    }
}
