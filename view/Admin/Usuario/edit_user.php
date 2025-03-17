<script>
function openModal(usuario) {
    document.getElementById('editId').value = usuario.id;
    document.getElementById('ID').value = usuario.id;
    document.getElementById('editNombre').value = usuario.nombre;
    document.getElementById('editRol').value = usuario.rol_id;

    document.getElementById('modal').classList.remove('hidden');
}

function closeModal() {
    document.getElementById('modal').classList.add('hidden');
}

document.getElementById('editForm').addEventListener('submit', function(event) {
    event.preventDefault();

    let id = document.getElementById('editId').value;
    let nombre = document.getElementById('editNombre').value;
    let rol_id = document.getElementById('editRol').value;

    fetch('../../../controller/actualizar_usuario.php', {
        method: 'POST',
        headers: { 'Content-Type': 'application/json' },
        body: JSON.stringify({ id, nombre, apellido, rol_id })
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            alert("Usuario actualizado correctamente");
            location.reload(); // Recargar la página para ver los cambios
        } else {
            alert("Error al actualizar usuario");
        }
    })
    .catch(error => console.error('Error:', error));

    closeModal();
});
</script>

<!-- Modal -->
<div id="modal" class="fixed inset-0 hidden flex items-center justify-center bg-gray-900 bg-opacity-50">
    <div class="bg-white dark:bg-gray-800 p-6 rounded-lg shadow-lg w-96">
        <h2 class="text-xl font-bold text-gray-900 dark:text-white mb-4">Editar Usuario</h2>
        <form id="editForm">
            <input type="hidden" id="editId">
            
            <label class="block text-sm font-medium text-gray-700 dark:text-gray-300">Usuario</label>
            <input type="text" id="ID" class="w-full p-2 border rounded-md dark:bg-gray-700 dark:text-white">
            
            <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mt-2">Nombre</label>
            <input type="text" id="editNombre" class="w-full p-2 border rounded-md dark:bg-gray-700 dark:text-white">
            
            <select id="editRol" class="my-5 w-full p-2 border rounded-md dark:bg-gray-700 dark:text-white">
                <option value="1">Administrador</option>
                <option value="2">Monitor</option>
                <option value="3">Operador</option>
            </select>
            
            <div class="flex justify-end mt-4">
                <button type="button" onclick="closeModal()" class="mr-2 px-4 py-2 bg-gray-400 text-white rounded-md">Cancelar</button>
                <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded-md">Guardar</button>
            </div>
        </form>
    </div>
</div>

