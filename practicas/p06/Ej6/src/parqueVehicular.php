<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="es">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
        <title>Parque vehicular de una ciudad</title>
    </head>
    <body>
        <?php
        $arregloParqueV=array(
                'DCK0001' => array(
                    'Auto' => array('Marca' => 'Mutley Motors', 'Modelo (año)' => '1968', 'Tipo' => 'Super Ferrari'),
                    'Propietario' => array('Nombre' => 'Pierre Nodoyuna', 'Ciudad' => 'Tramposópolis', 'Dirección' => 'Calle de los Atajos #666')
                ),
                'PNK1969' => array(
                    'Auto' => array('Marca' => 'Rosita Turbo', 'Modelo (año)' => '1969', 'Tipo' => 'Convertible'),
                    'Propietario' => array('Nombre' => 'Penélope Glamour', 'Ciudad' => 'Glamourville', 'Dirección' => 'Avenida Fashion #10')
                ),
                'RCK4040' => array(
                    'Auto' => array('Marca' => 'Rocamóvil Inc.', 'Modelo (año)' => 'Prehistórico', 'Tipo' => 'Carro de Piedra'),
                    'Propietario' => array('Nombre' => 'Los Hermanos Macana', 'Ciudad' => 'Cueva del Terror', 'Dirección' => 'Piedra Redonda #5')
                ),
                'INV7777' => array(
                    'Auto' => array('Marca' => 'Inventomóvil Labs', 'Modelo (año)' => 'Futurista', 'Tipo' => 'Converticoche'),
                    'Propietario' => array('Nombre' => 'Profesor Locovitch', 'Ciudad' => 'Ciudad Ciencia', 'Dirección' => 'Calle Inventos #42')
                ),
                'LZY9999' => array(
                    'Auto' => array('Marca' => 'Granjeros Unidos', 'Modelo (año)' => '1899', 'Tipo' => 'Carreta Motorizada'),
                    'Propietario' => array('Nombre' => 'Luke y Blubber', 'Ciudad' => 'Rancho Vago', 'Dirección' => 'Camino al Despiste #3')
                ),
                'RED0001' => array(
                    'Auto' => array('Marca' => 'Von Fritz Motors', 'Modelo (año)' => '1917', 'Tipo' => 'Acorazado con alas'),
                    'Propietario' => array('Nombre' => 'Barón Hans Fritz', 'Ciudad' => 'Aeropuerto Loco', 'Dirección' => 'Hangar 13')
                ),
                'TRK0010' => array(
                    'Auto' => array('Marca' => 'Madera Fina S.A.', 'Modelo (año)' => '1970', 'Tipo' => 'Troncomóvil'),
                    'Propietario' => array('Nombre' => 'Rufus Rufus & Piedro', 'Ciudad' => 'Bosque Loco', 'Dirección' => 'Tronco Mayor #0')
                ),
                'TAN2020' => array(
                    'Auto' => array('Marca' => 'Ejército Express', 'Modelo (año)' => '1950', 'Tipo' => 'Tanque sobre ruedas'),
                    'Propietario' => array('Nombre' => 'Sargento Blast y Soldado Meekly', 'Ciudad' => 'Base Secreta', 'Dirección' => 'Bunker #7')
                ),
                'OUT1899' => array(
                    'Auto' => array('Marca' => 'Dutch Gang', 'Modelo (año)' => '1899', 'Tipo' => 'Caballo azabache'),
                    'Propietario' => array('Nombre' => 'Arthur Morgan', 'Ciudad' => 'Blackwater', 'Dirección' => 'Cabaña en Horseshoe Overlook')
                ),
                'DCH1900' => array(
                    'Auto' => array('Marca' => 'Dutch Gang', 'Modelo (año)' => '1900', 'Tipo' => 'Carruaje blindado'),
                    'Propietario' => array('Nombre' => 'Dutch van der Linde', 'Ciudad' => 'Saint Denis', 'Dirección' => 'Campamento de forajidos #1')
                ),
                'LUK1977' => array(
                    'Auto' => array('Marca' => 'Tatooine Speeders', 'Modelo (año)' => '1977', 'Tipo' => ' XWING '),
                    'Propietario' => array('Nombre' => 'Luke Skywalker', 'Ciudad' => 'Tatooine', 'Dirección' => 'Granja Lars')
                ),
                'VDR0001' => array(
                    'Auto' => array('Marca' => 'Imperial Motors', 'Modelo (año)' => '1977', 'Tipo' => 'Estrella de la muerte'),
                    'Propietario' => array('Nombre' => 'Darth Vader', 'Ciudad' => 'Naboo', 'Dirección' => 'Casa de los tios')
                ),
                'UBN6339' => array(
                    'Auto' => array('Marca' => 'MAZDA', 'Modelo (año)' => '2019', 'Tipo' => 'Sedan'),
                    'Propietario' => array('Nombre' => 'Ma. del Consuelo de Molina', 'Ciudad' => 'Puebla, Pue.', 'Dirección' => '97 oriente')
                )           
            );


        if(isset($_POST["matricula"])) {
            $matricula=$_POST["matricula"];

            print_r($arregloParqueV[$matricula]);
        }

        if(isset($_POST["verTodos"])) {
            print_r($arregloParqueV);
        }

        echo '<br><br>';
        echo '<a href="../consulta.html">Regresar a formulario</a>';

        ?>
        
    </body>
</html>