<?php namespace Backend\MyApi;

abstract class DataBase {
    protected $conexion;
    protected $data = NULL;

    public function __construct($db, $user, $pass) {
        // Establece la conexión a la base de datos
        $this->conexion = @mysqli_connect('localhost', $user, $pass, $db);

        if (!$this->conexion) {
            // Si la conexión falla, lanza una excepción
            throw new Exception('¡Base de datos NO conectada! Error: ' . mysqli_connect_error());
        }
    }

    // Devuelve los datos como JSON
    public function getData() {
        if ($this->data === NULL) {
            return json_encode([], JSON_PRETTY_PRINT);  // Retorna un array vacío si no hay datos
        }
        return json_encode($this->data, JSON_PRETTY_PRINT);
    }

    // Cierra la conexión de base de datos
    public function closeConnection() {
        if ($this->conexion) {
            mysqli_close($this->conexion);
        }
    }
}
?>
