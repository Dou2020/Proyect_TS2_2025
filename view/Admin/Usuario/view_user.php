<div class="my-5 relative overflow-x-auto shadow-md sm:rounded-lg">
    <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
            <tr>
                <th scope="col" class="px-6 py-3">
                    ID
                </th>
                <th scope="col" class="px-6 py-3">
                    Nombre
                </th>
                <th scope="col" class="px-6 py-3">
                    Rol
                </th>
                <th scope="col" class="px-6 py-3">
                    <span class="sr-only">Editar</span>
                </th>
                <th scope="col" class="px-6 py-3">
                    <span class="sr-only">Eliminar</span>
                </th>
            </tr>
        </thead>
        <tbody>
            <?php
            // Crear conexión
            include "../../../db/index.php";
            // Obtener usuarios
            include "../../../model/Admin/usuario.php";

            $usuarios = obtenerUsuarios();
            foreach ($usuarios as $usuario) {
            ?>
            <tr class="bg-white dark:bg-gray-800 hover:bg-gray-50 dark:hover:bg-gray-600">
                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                    <?php echo $usuario['id']; ?>
                </th>
                <td class="px-6 py-4">
                    <?php echo $usuario['nombre']; ?>
                </td>
                <td class="px-6 py-4">
                    <?php echo $usuario['rol_id']; ?>
                </td>
                <td class="px-6 py-4 text-right">
                    <button onclick="openModal(<?php echo htmlspecialchars(json_encode($usuario)); ?>)" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Editar</button>
                </td>
                <td class="px-6 py-4 text-right">
                    <form method="POST" action="../../../controler/Admin/deleteUser.php" onsubmit="return confirm('¿Estás seguro de que deseas eliminar este usuario?');">
                        <input type="hidden" name="id" value="<?php echo $usuario['id']; ?>">
                        <button type="submit" name="eliminar" class="font-medium text-red-600 dark:text-red-500 hover:underline">Eliminar</button>
                    </form>
                </td>
            </tr>
            <?php
            include "edit_user.php";
            }
            ?>

        </tbody>
    </table>
</div>

