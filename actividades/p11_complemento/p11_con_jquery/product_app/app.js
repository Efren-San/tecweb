$(document).ready(function () {
    let edit = false;
    let nombreRepetido = true;
    let mensajesErrores = [];

    function reiniciarValores() { 
        $('#name').val('');
        $('#price').val('0.0'); 
        $('#quantity').val(0);
        $('#model').val('XX-000');
        $('#description').val('NA');
        $('#image').val('img/default.png');
        $('#brand').val('NA');
    }

    $('#product-result').hide();
    reiniciarValores();
    listarProductos();

    function listarProductos() {
        $.ajax({
            url: './backend/product-list.php',
            type: 'GET',
            success: function (response) {
                // SE OBTIENE EL OBJETO DE DATOS A PARTIR DE UN STRING JSON
                const productos1 = JSON.parse(response);

                // SE VERIFICA SI EL OBJETO JSON TIENE DATOS
                if (Object.keys(productos1).length > 0) {
                    // SE CREA UNA PLANTILLA PARA CREAR LAS FILAS A INSERTAR EN EL DOCUMENTO HTML
                    let template = '';

                    productos1.forEach(producto => {
                        // SE CREA UNA LISTA HTML CON LA DESCRIPCIÓN DEL PRODUCTO
                        let descripcion = '';
                        descripcion += '<li>precio: ' + producto.precio + '</li>';
                        descripcion += '<li>unidades: ' + producto.unidades + '</li>';
                        descripcion += '<li>modelo: ' + producto.modelo + '</li>';
                        descripcion += '<li>marca: ' + producto.marca + '</li>';
                        descripcion += '<li>detalles: ' + producto.detalles + '</li>';

                        template += `
                            <tr productId="${producto.id}">
                                <td>${producto.id}</td>
                                <td><a href="#" class="product-item">${producto.nombre}</a></td>
                                <td><ul>${descripcion}</ul></td>
                                <td>
                                    <button class="product-delete btn btn-danger">
                                        Eliminar
                                    </button>
                                </td>
                            </tr>
                        `;
                    });
                    // SE INSERTA LA PLANTILLA EN EL ELEMENTO CON ID "productos"
                    $('#products').html(template);
                }
            }
        });
    }

    $('#search').keyup(function () {
        if ($('#search').val()) {
            let search = $('#search').val();
            $.ajax({
                url: './backend/product-search.php?search=' + $('#search').val(),
                data: { search },
                type: 'GET',
                success: function (response) {
                    if (!response.error) {
                        // SE OBTIENE EL OBJETO DE DATOS A PARTIR DE UN STRING JSON
                        const productos1 = JSON.parse(response);

                        // SE VERIFICA SI EL OBJETO JSON TIENE DATOS
                        if (Object.keys(productos1).length > 0) {
                            // SE CREA UNA PLANTILLA PARA CREAR LAS FILAS A INSERTAR EN EL DOCUMENTO HTML
                            let template = '';
                            let template_bar = '';

                            productos1.forEach(producto => {
                                // SE CREA UNA LISTA HTML CON LA DESCRIPCIÓN DEL PRODUCTO
                                let descripcion = '';
                                descripcion += '<li>precio: ' + producto.precio + '</li>';
                                descripcion += '<li>unidades: ' + producto.unidades + '</li>';
                                descripcion += '<li>modelo: ' + producto.modelo + '</li>';
                                descripcion += '<li>marca: ' + producto.marca + '</li>';
                                descripcion += '<li>detalles: ' + producto.detalles + '</li>';

                                template += `
                                    <tr productId="${producto.id}">
                                        <td>${producto.id}</td>
                                        <td><a href="#" class="product-item">${producto.nombre}</a></td>
                                        <td><ul>${descripcion}</ul></td>
                                        <td>
                                            <button class="product-delete btn btn-danger">
                                                Eliminar
                                            </button>
                                        </td>
                                    </tr>
                                `;

                                template_bar += `
                                    <li>${producto.nombre}</il>
                                `;
                            });
                            // SE HACE VISIBLE LA BARRA DE ESTADO
                            $('#product-result').show();
                            // SE INSERTA LA PLANTILLA PARA LA BARRA DE ESTADO
                            $('#container').html(template_bar);
                            // SE INSERTA LA PLANTILLA EN EL ELEMENTO CON ID "productos"
                            $('#products').html(template);
                        }
                    }
                }
            });
        }
        else {
            $('#product-result').hide();
        }
    });

    $('#name').keyup(function () {
        let name = $('#name').val().trim();
        let template_bar = '';
        $.ajax({
            url: './backend/product-validateName.php',
            type: 'POST',
            data: { name },
            success: function (response) {
                let respuesta = JSON.parse(response);
                if (respuesta.status === "success") { 
                    nombreRepetido = false; // condición para VALIDAR el nombre.
                }
                else {
                    nombreRepetido = true;
                }

                template_bar += `
                                <li style="list-style: none;">status: ${respuesta.status}</li>
                                <li style="list-style: none;">message: ${respuesta.message}</li>
                            `;

                $('#product-result').show();
                $('#container').html(template_bar);
            }
        });
    });

    function validarNombre() {
        let valor = $('#name').val().trim();
        let mensaje = '';
        if (valor === "" || nombreRepetido || valor.length > 100) {
            mensaje='Nombre del producto no es válido, supera el límite de caracteres o ya está en uso.';
            mostrarError(mensaje); 
            mensajesErrores.push(mensaje); // Inserta el mensaje de error a un arreglo 
        }
        else {
            $('#product-result').hide();
        }
    }
    $('#name').blur(validarNombre); // Cada vez que se abandona el campo del producto, llama a la función de validación 

    function validarPrecio() {
        let valor = $('#price').val();
        let mensaje = '';
        if (!valor || isNaN(valor) || !/^\d+(\.\d{1,2})?$/.test(valor) || parseFloat(valor) <= 99.99) {
            mensaje='Precio es vacío, no supera los 99.99 en valor o tiene más de dos decimales.';
            mostrarError(mensaje);
            mensajesErrores.push(mensaje);
        }
        else {
            mostrarExito(valor+'] cumple con el precio');
        }
    }
    $('#price').blur(validarPrecio);

    function validarCantidad() {
        let valor = $('#quantity').val();
        let mensaje = '';
        if (!valor || isNaN(valor) || Number(valor) < 0) {
            mensaje='Cantidad es vacía o es menor a 0.';
            mostrarError(mensaje);
            mensajesErrores.push(mensaje);
        }
        else {
            mostrarExito(valor+'] cumple con la cantidad');
        }
    }
    $('#quantity').blur(validarCantidad);

    function validarModelo() {
        let valor = $('#model').val().trim();
        let mensaje = '';
        if (valor === "XX-000" || valor.length > 25 || !/^(?=.*[a-zA-Z])(?=.*[0-9])[a-zA-Z0-9\sáéíóúÁÉÍÓÚüÜñÑ-]+$/.test(valor)) {
            mensaje='Modelo supera el límite de caracteres, es vacío o no es un texto alfanumérico.';
            mostrarError(mensaje);
            mensajesErrores.push(mensaje);
        }
        else {
            mostrarExito(valor+'] cumple con el modelo');
        }
    }
    $('#model').blur(validarModelo);

    function validarMarca() {
        let valor = $('#brand option:selected').text();
        let mensaje = '';
        if (valor === "NA") {
            mensaje='Marca no fue seleccionada.';
            mostrarError(mensaje);
            mensajesErrores.push(mensaje);
        }
        else {
            mostrarExito(valor+'] cumple con la marca');
        }
    }
    $('#brand').blur(validarMarca);

    function validarDetalles() {
        let valor = $('#description').val().trim();
        let mensaje = '';
        if (valor.length > 250) {
            mensaje='Los detalles superan el límite permitido de caracteres.';
            mostrarError(mensaje);
            mensajesErrores.push(mensaje);
        }
        else {
            mostrarExito(valor+'] cumple con la descripción');
        }
    }
    $('#description').blur(validarDetalles);

    function validarImagen() {
        let valor = $('#image').val().trim();
        if (valor === "") {
            $('#image').val("img/default.png");
        }
        mostrarExito(valor+'] cumple con la imagen');
    }
    $('#image').blur(validarImagen);

    function mostrarError(mensaje) {
        let template_bar = '';
        template_bar += `
                <li style="list-style: none;">
                    <span style="color: #B1A293; font-weight: bold;">Error:</span> ${mensaje}
                </li>
            `; 
        $('#product-result').show();
        $('#container').html(template_bar);
    }

    function mostrarExito(mensaje) {
        let template_bar = '';
        template_bar += `
                <li style="list-style: none;">
                    El valor insertado [${mensaje}
                </li>
            `; 
        $('#product-result').show();
        $('#container').html(template_bar);
    }

    $('#product-form').submit(e => { // equivalente al form.addEventListener
        e.preventDefault();

        mensajesErrores = []; // Declaración global para que las funciones puedan hacer push.

        validarNombre(); 
        validarPrecio();
        validarCantidad();
        validarModelo();
        validarMarca();
        validarDetalles();

        if (mensajesErrores.length > 0) { 
            let template_bar = '';
            for (let i = 0; i < mensajesErrores.length; i++) {
                template_bar += `
                    <li style="list-style: none;">
                        <span style="color: #B1A293; font-weight: bold;">Error:</span> ${mensajesErrores[i]}
                    </li>
                    `;
            }
            $('#product-result').show();
            $('#container').html(template_bar);
            return;
        }
        /**/

        const postData = { // Onjeto con información
            nombre: $('#name').val().trim(),
            id: $('#productId').val(),
            precio: $('#price').val(),
            unidades: $('#quantity').val(),
            modelo: $('#model').val().trim(),
            marca: $('#brand option:selected').text(),
            detalles: $('#description').val().trim(),
            imagen: $('#image').val().trim()
        };

        $('button.btn-primary').text("Agregar Producto");
        nombreRepetido = true;
        const url = edit === false ? './backend/product-add.php' : './backend/product-edit.php';

        $.post(url, postData, (response) => {
            //console.log(response);
            // SE OBTIENE EL OBJETO DE DATOS A PARTIR DE UN STRING JSON
            let respuesta = JSON.parse(response);
            // SE CREA UNA PLANTILLA PARA CREAR INFORMACIÓN DE LA BARRA DE ESTADO
            let template_bar = '';
            template_bar += `
                            <li style="list-style: none;">status: ${respuesta.status}</li>
                            <li style="list-style: none;">message: ${respuesta.message}</li>
                        `;
            // SE REINICIA EL FORMULARIO
            reiniciarValores();
            // SE HACE VISIBLE LA BARRA DE ESTADO
            $('#product-result').show();
            // SE INSERTA LA PLANTILLA PARA LA BARRA DE ESTADO
            $('#container').html(template_bar);
            // SE LISTAN TODOS LOS PRODUCTOS
            listarProductos();
            // SE REGRESA LA BANDERA DE EDICIÓN A false
            edit = false;
        });
    });

    $(document).on('click', '.product-delete', (e) => {
        if (confirm('¿Realmente deseas eliminar el producto?')) {
            const element = $(this)[0].activeElement.parentElement.parentElement;
            const id = $(element).attr('productId');
            $.post('./backend/product-delete.php', { id }, (response) => {
                $('#product-result').hide();
                listarProductos();
            });
        }
    });

    $(document).on('click', '.product-item', (e) => {
        const element = $(this)[0].activeElement.parentElement.parentElement;
        const id = $(element).attr('productId');
        $.post('./backend/product-single.php', { id }, (response) => {
            // SE CONVIERTE A OBJETO EL JSON OBTENIDO
            let product = JSON.parse(response); //Solo aquí se usa JSON
            // SE INSERTAN LOS DATOS ESPECIALES EN LOS CAMPOS CORRESPONDIENTES
            $('#name').val(product.nombre);
            $('#price').val(product.precio);
            $('#quantity').val(product.unidades);
            $('#model').val(product.modelo);

            let marca = product.marca; 
            if (marca == 'Sombreros 2 hermanos')
                marca = '2hermanos';
            else if (marca == 'El rancho negro')
                marca = 'Elranchonegro';
            else if (marca == 'Sombreros NL') // No pasa ciertos caracteres especiales
                marca = 'SombrerosNL';
            else if (marca == 'El vaquero azul')
                marca = 'Elvaqueroazul';
            else
                marca = 'Arthur Morgan importados';

            $('#brand').val(marca);
            $('#description').val(product.detalles);
            $('#image').val(product.imagen);
            // EL ID SE INSERTA EN UN CAMPO OCULTO PARA USARLO DESPUÉS PARA LA ACTUALIZACIÓN
            $('#productId').val(product.id);
            edit = true;
        });
        e.preventDefault();
        $('button.btn-primary').text("Modificar Producto");
    });
});