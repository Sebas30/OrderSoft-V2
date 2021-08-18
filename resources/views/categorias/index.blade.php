<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Categorias') }}
        </h2>
    </x-slot><br>
    <a type="button" href="{{ route('categorias.create') }}" 
    class=" mx-4 bg-indigo-500 px-12 py-2 rounded text-gray-200
    font-semibold hover:bg-indigo-800 transition duration-200 each-in-out">
    <i class='bx bx-plus-medical'></i> Nueva categoria
    </a>
    <!-- component -->
    <div class="mx-4 p-2 grid grid-cols-3 gap-4 col-span-2 md:col-span-6">
        @foreach($categorias as $categoria)
        <div class="">
            <div class=" bg-gray-100">
                <div class="p-6 bg-white rounded-full shadow-inner  flex rounded-lg shadow-md hover:scale-105 transition transform duration-500 cursor-pointer">
                    <div>
                        <img src="/images/{{$categoria->imagen}}" class="rounded-full bg-indigo-300" alt="ImgCategorias">
                    </div>
                    <div>
                        <h1 class="p-2 text-xl font-bold text-gray-700 mb-2">{{$categoria->NombreCategoria}}</h1>
                        <p class="text-gray-600 w-80 text-sm"></p>

                        <div class="flex items-center justify-between">
                            <a  href="{{ route('categorias.edit',$categoria->id) }}"
                                class="p-2 inline-block align-baseline font-bold text-sm text-indigo-500 hover:text-indigo-800">
                                <i class='bx bxs-pencil' ></i> Editar
                            </a>
                            <!-- Botón eliminar  -->
                            <form action="{{ route('categorias.destroy',$categoria->id) }}" method="POST" class="formEliminar">
                                @csrf <!-- Generación del token -->
                                @method('DELETE')
                                <button type="submit" class="bg-red-600 hover:bg-red-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                                    <i class='bx bxs-trash' ></i> Borrar
                                </button>
                            </form>
                          </div>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
    <div>
        {!! $categorias->links()  !!} <!-- Paginación de productos -->
    </div>
</x-app-layout>
<script>
    (function () {
  'use strict'
  //debemos crear la clase formEliminar dentro del form del boton borrar
  //recordar que cada registro a eliminar esta contenido en un form  
  var forms = document.querySelectorAll('.formEliminar')
  Array.prototype.slice.call(forms)
    .forEach(function (form) {
      form.addEventListener('submit', function (event) {        
          event.preventDefault()
          event.stopPropagation()        
          Swal.fire({
                title: '¿Deseas eliminar este registro?',        
                icon: 'info',
                showCancelButton: true,
                confirmButtonColor: '#9FE41C',
                cancelButtonColor: '#E42E1C',
                confirmButtonText: 'Confirmar'
            }).then((result) => {
                if (result.isConfirmed) {
                    this.submit();
                    Swal.fire('¡Eliminado!', 'El registro ha sido eliminado exitosamente.','success');
                }
            })                      
      }, false)
    })
})()
</script>