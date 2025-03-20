<script>
function openModal(usuario) {
    document.getElementById('editId').value = usuario.id;
    document.getElementById('ID').value = usuario.id;
    document.getElementById('editNombre').value = usuario.nombre;
    document.getElementById('editRol').value = usuario.rol;
    document.getElementById('editPassword').value = usuario.password;

    document.getElementById('modal').classList.remove('hidden');
}

function closeModal() {
    document.getElementById('modal').classList.add('hidden');
}

</script>

<!-- Modal -->
<div id="modal" class="fixed inset-0 hidden flex items-center justify-center bg-gray-900 bg-opacity-50">
    <div class="bg-white dark:bg-gray-800 p-6 rounded-lg shadow-lg w-96">
        <h2 class="text-xl font-bold text-gray-900 dark:text-white mb-4">Editar Usuario</h2>
        <form method='POST' action='/proyect_ts2/controler/Admin/updateUser.php' id="editForm">
            <input type="hidden" name='editId' id="editId">
            
            <label class="block text-sm font-medium text-gray-700 dark:text-gray-300">Usuario</label>
            <input type="text" id="ID" class="w-full p-2 border rounded-md dark:bg-gray-700 dark:text-white">
            
            <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mt-2">Nombre</label>
            <input type="text" name='editNombre' id="editNombre" class="w-full p-2 border rounded-md dark:bg-gray-700 dark:text-white">
            
            <select id="editRol" name='editRol' class="my-5 w-full p-2 border rounded-md dark:bg-gray-700 dark:text-white">
                <option value="1">Administrador</option>
                <option value="2">Operador</option>
                <option value="3">Monitor</option>
            </select>
            <!-- Password -->
            <div class="mb-4">
                <label for="password" class="block text-sm font-medium text-gray-700">Contraseña</label>
                <input type="password" name="editPassword" id="editPassword" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" required>
            </div>
            
            <div class="flex justify-end mt-4">
                <button type="button" onclick="closeModal()" class="mr-2 px-4 py-2 bg-gray-400 text-white rounded-md">Cancelar</button>
                <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded-md">Guardar</button>
            </div>
        </form>
    </div>
</div>

