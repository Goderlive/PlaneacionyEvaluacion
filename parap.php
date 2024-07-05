<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.css" rel="stylesheet" />

</head>
<body class="bg-gray-100 p-6">

<?php if($_POST): ?>
<?php print '<pre>';
var_dump($_POST);
die(); ?>
<?php endif ?>
    <form id="dynamic-form" action="" method="POST">
        <div id="form-container">
            <div class="field-group mb-4">
                <label for="localidades" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Seleccione múltiples opciones <b title="Usa el botón Ctrl en tu teclado más Click del mouse">Ayuda </b></label> 
                <select multiple required name="localidades[]" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" onchange="calcularSumatoria()">
                    <option value="1" data-valor="10">Localidad 1</option>
                    <option value="2" data-valor="20">Localidad 2</option>
                    <!-- Agrega más opciones aquí -->
                </select>
                
                <label for="beneficiarios" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Beneficiarios Directos</label>
                <input type="number" required name="beneficiarios[]" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
            </div>
        </div>

        <button id="add-field-btn" type="button" class="mt-4 bg-blue-500 text-white p-2 rounded">Agregar Nuevo Campo</button>
        <button type="submit" class="mt-4 bg-green-500 text-white p-2 rounded">Enviar</button>
    </form>

    <script>
        document.getElementById('add-field-btn').addEventListener('click', addNewField);

        function addNewField() {
            const formContainer = document.getElementById('form-container');
            const fieldGroup = document.createElement('div');
            fieldGroup.className = 'field-group mb-4';

            const selectLabel = document.createElement('label');
            selectLabel.className = 'block mb-2 text-sm font-medium text-gray-900 dark:text-white';
            selectLabel.innerHTML = 'Seleccione múltiples opciones <b title="Usa el botón Ctrl en tu teclado más Click del mouse">Ayuda </b>';
            fieldGroup.appendChild(selectLabel);

            const select = document.createElement('select');
            select.multiple = true;
            select.required = true;
            select.name = 'localidades[]';
            select.className = 'bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500';
            select.innerHTML = document.querySelector('[name="localidades[]"]').innerHTML; // Copia las opciones del primer select
            fieldGroup.appendChild(select);

            const inputLabel = document.createElement('label');
            inputLabel.className = 'block mb-2 text-sm font-medium text-gray-900 dark:text-white';
            inputLabel.innerHTML = 'Beneficiarios Directos';
            fieldGroup.appendChild(inputLabel);

            const input = document.createElement('input');
            input.type = 'number';
            input.required = true;
            input.name = 'beneficiarios[]';
            input.className = 'bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500';
            fieldGroup.appendChild(input);

            const removeButton = document.createElement('button');
            removeButton.type = 'button';
            removeButton.className = 'mt-2 bg-red-500 text-white p-2 rounded';
            removeButton.innerText = 'Eliminar';
            removeButton.onclick = () => {
                formContainer.removeChild(fieldGroup);
            };
            fieldGroup.appendChild(removeButton);

            formContainer.appendChild(fieldGroup);
        }
    </script>




    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.js"></script>
</body>

</html>