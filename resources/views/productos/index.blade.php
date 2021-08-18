<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Productos') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <a type="button" href="{{ route('productos.create') }}" 
                class="bg-indigo-500 px-12 py-2 rounded text-gray-200
                font-semibold hover:bg-indigo-800 transition duration-200 each-in-out">
                    <i class='bx bx-plus-medical'></i> Nuevo producto
                </a>

                <table class="w-full sm:w-1/2 md:w-1/3 lg:w-1/4 xl:w-1/6">
                    <thead>
                        <tr class="bg-gray-800 text-white">
                            <th class="border px-4 py-2">ID</th>
                            <th class="border px-4 py-2">NOMBRE</th>
                            <th class="border px-10 py-2">DESCRIPCIÓN</th>
                            <th class="border px-4 py-2">CATEGORIA</th>
                            <th class="border px-10 py-2">PRECIO</th>
                            <th class="border px-4 py-2">IMAGEN</th>
                            <th class="border px-4 py-2">ACCIONES</th>
                        </tr>
                    </thead>
                    <tbody>
                        <!-- Llamado a los campos que necesitamos listar -->
                        @foreach($productos as $producto)
                        <tr class="text-center">
                            <td>{{$producto->id}}</td>
                            <td>{{$producto->nombre}}</td>
                            <td>{{$producto->descripcion}}</td>
                            <td>{{$producto->categoria}}</td>
                            <td>$ {{$producto->precio}} COP</td>
                            <td>
                                <center>
                                    <img src="/images/{{$producto->imagen}}" class="" width="60%" alt="">
                                </center>
                            </td>
                            <td class="border px-4 py-2">
                                <div class="flex justify-center rounded-lg text-lg" role="group">
                                    <!-- Botón editar -->
                                    <a  href="{{ route('productos.edit',$producto->id) }}"
                                        class="rounded bg-indigo-500 hover:bg-indigo-600 text-white font-bold
                                        py-2 px-4">
                                        <i class='bx bxs-pencil' ></i> Editar
                                    </a>

                                    <!-- Botón eliminar  -->
                                    <form action="{{ route('productos.destroy',$producto->id) }}" method="POST" class="formEliminar">
                                        @csrf <!-- Generación del token -->
                                        @method('DELETE')
                                        <button style="margin-left: 10px;" type="submit" class="rounded bg-red-400 hover:bg-red-500 text-white font-bold py-2 px-4">
                                            <i class='bx bxs-trash' ></i> Borrar
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    </tbody>
                    @endforeach <!-- Cierre del foreach -->
                </table>
                    <div>
                        {!! $productos->links()  !!} <!-- Paginación de productos -->
                    </div>
            </div>
        </div>
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