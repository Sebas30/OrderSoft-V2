<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Crear Productos') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <!-- component -->
                <div class="flex justify-between m-6">
                    <div class="flex flex-col h-full max-w-lg mx-auto rounded-lg">
                        <!--<img class="rounded-lg rounded-b-none" src="{{ asset('img/form-create-products.jpg') }}"
                            alt="form" loading="lazy" />-->
                        <div class="py-2 px-4">
                            <h1
                                class="text-xl font-medium leading-6  text-center font-bold tracking-wide text-black-300 hover:text-blue-500 cursor-pointer">
                                Registro de productos
                            </h1>
                        </div><br>

                        <div class="px-4 space-y-2">
                            <form action="{{ route('productos.store') }}" method="POST" enctype="multipart/form-data"
                                class="w-full max-w-lg">
                                @csrf
                                <div class="flex flex-wrap center">
                                    <div class="w-13 px-2">
                                        <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-first-name">
                                            Nombre
                                        </label>
                                        <input class="appearance-none block border-none w-full bg-gray-200 text-gray-700  rounded py-3 px-4 mb-3 
                                            leading-tight focus:outline-none focus:bg-white" id="grid-first-name"
                                            name="nombre" type="text" placeholder="Pizza doble queso">
                                    </div>

                                    <div class="">
                                        <label class="block uppercase border-none tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-first-name">
                                            Categoria
                                        </label>
                                        <input class="appearance-none border-none block w-full bg-gray-200 text-gray-700  rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white" id="grid-first-name"
                                            name="categoria" type="text"
                                            placeholder="Snacks, almuerzos, bebidas, etc...">
                                    </div>
                                </div>

                                <div class="">
                                    <label class="block uppercase border-none tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-first-name">
                                        Precio
                                    </label>
                                    <input class="appearance-none border-none block w-full bg-gray-200 text-gray-700  rounded py-3 px-4 mb-3  leading-tight focus:outline-none focus:bg-white" id="grid-first-name"
                                        name="precio" type="number" placeholder="$.000">
                                </div>
                                <label
                                    class="block uppercase border-none tracking-wide text-gray-700 text-xs font-bold mb-2"
                                    for="grid-first-name">
                                    Descripcion
                                </label>
                                <input class="appearance-none border-none block w-full bg-gray-200 text-gray-700  rounded py-3 px-4 mb-3  leading-tight focus:outline-none focus:bg-white" id="grid-first-name"
                                    name="descripcion" type="text" 
                                    placeholder="Bebidas, Snacks, cenas, almuerzos">
                        </div>

                        <center>
                            <div class="grid grid-cols-1 mt-5 mx-7">
                                <img id="imagenSeleccionada" style="max-height: 300px;">
                            </div>
                        </center>

                        <div class="grid grid-cols-1 mt-5 mx-7">
                            <label class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold mb-1">Subir
                                Imagen
                            </label>

                            <div class="flex items-center justify-center w-full">
                                <label class="flex flex-col border-4 border-dashed w-full h-32 hover:bg-gray-100 hover:border-purple-300 group">
                                    <div class="flex flex-col items-center justify-center pt-7">
                                        <p class="text-sm text-gray-400 group-hover:text-purple-600 pt-1 tracking-wider">
                                            Seleccione la imagen
                                        </p>
                                    </div>
                                    <input name="imagen" id="imagen" type="file" class="hidden">
                                </label>
                            </div>
                        </div><br>

                        <center>
                            <button type="submit" class="bg-blue-500 shadow-2xl hover:bg-blue-700 text-white font-bold py-3 px-10 rounded-full">
                                Registrar producto
                            </button>

                            <a href="{{ route('productos.index') }}" class="bg-red-500 shadow-2xl hover:bg-red-700  text-white font-bold py-3 px-10 rounded-full">
                                Cancelar
                            </a>
                        </center><br>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>

</x-app-layout>



<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script>
    $(document).ready(function(e) {
        $('#imagen').change(function() { //Por cada cambio en la imagen
            let reader = new FileReader();
            reader.onload = (e) => {
                $('#imagenSeleccionada').attr('src', e.target.result); //Se va a mostrar la imagen
            }
            reader.readAsDataURL(this.files[0]);
        });
    });
</script>
