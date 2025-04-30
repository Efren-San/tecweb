<?php namespace Backend\MyApi\Delete;

use Backend\MyApi\DataBase as DataBase;

class Delete extends DataBase {
    public function __construct($db) {
        parent::__construct($db, 'root', '12345678a');
    }

    // Método para eliminar un producto
    public function delete($id) {
        // Respuesta inicial con mensaje de error
        $this->data = [
            'status'  => 'error',
            'message' => 'La consulta falló'
        ];

        // Verificamos que el ID del producto esté presente
        if (isset($id)) {
            // Marcamos el producto como eliminado en la base de datos
            $sql = "UPDATE productos SET eliminado = 1 WHERE id = {$id}";

            if ($this->conexion->query($sql)) {
                // Si la consulta es exitosa
                $this->data['status'] = "success";
                $this->data['message'] = "Producto eliminado correctamente";
            } else {
                // Si ocurre un error al ejecutar el SQL
                $this->data['message'] = "ERROR: No se ejecutó la consulta. " . mysqli_error($this->conexion);
            }

            // Cerramos la conexión
            $this->conexion->close();
        } else {
            // Si no se proporciona un ID
            $this->data['message'] = "ERROR: Se requiere el ID del producto";
        }
    }
}
