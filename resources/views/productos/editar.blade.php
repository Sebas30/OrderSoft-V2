<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Editar Productos') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7x1 mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm-rounded-lg">

                <div class="flex justify-between m-6">
                    <div class="flex flex-col h-full max-w-lg mx-auto rounded-lg">
                        <div class="py-2 px-4">
                            <h1
                                class="text-xl font-medium leading-6  text-center font-bold tracking-wide text-black-300 hover:text-blue-500 cursor-pointer">
                                Edición de productos
                            </h1>
                        </div><br>
                        <div class="px-4 space-y-2">
                            <form action="{{ route('productos.update', $producto->id) }}" method="POST"
                                enctype="multipart/form-data" class="w-full max-w-lg">
                                @csrf
                                @method('PUT')
                                <div class="flex flex-wrap center">
                                    <div class="w-13 px-2">
                                        <label
                                            class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
                                            for="grid-first-name">
                                            Nombre
                                        </label>
                                        <input class="appearance-none block border-none w-full bg-gray-200 text-gray-700  rounded py-3 px-4 mb-3 
                                        leading-tight focus:outline-none focus:bg-white" id="grid-first-name"
                                            name="nombre" type="text" placeholder="Pizza doble queso"
                                            value="{{ $producto->nombre }}">
                                    </div>
                                    <div class="">
                                        <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-first-name">
                                            Categoria
                                        </label>
                                        <select name="categoria" class="appearance-none border-none block w-full bg-gray-200 text-gray-700  rounded py-3 px-12 mb-3 leading-tight focus:outline-none focus:bg-white" id="grid-first-name">
                                                <option value="{{ $producto->categoria }}">--- Selecciona ---</option>
                                                <option value="Desayunos">Desayunos</option>
                                                <option value="Almuerzos">Almuerzos</option>
                                                <option value="Snack's">Snack's</option>
                                                <option value="Cenas">Cenas</option>
                                                <option value="Bebidas">Bebidas</option>
                                        </select>
                                    </div>

                                </div>
                                <div class="">
                                    <label
                                        class="block uppercase border-none tracking-wide text-gray-700 text-xs font-bold mb-2"
                                        for="grid-first-name">
                                        Precio
                                    </label>
                                    <input class="appearance-none border-none block w-full bg-gray-200 text-gray-700  rounded py-3 px-4 mb-3 
                                    leading-tight focus:outline-none focus:bg-white" id="grid-first-name" name="precio"
                                        type="number" placeholder="$.000" value="{{ $producto->precio }}">
                                </div>
                                <label
                                    class="block uppercase border-none tracking-wide text-gray-700 text-xs font-bold mb-2"
                                    for="grid-first-name">
                                    Descripcion
                                </label>
                                <input class="appearance-none border-none block w-full bg-gray-200 text-gray-700  rounded py-3 px-4 mb-3 
                                    leading-tight focus:outline-none focus:bg-white" id="grid-first-name"
                                    name="descripcion" type="text" placeholder="Pizza doble queso, mixta o de un solo sabor"
                                    value="{{ $producto->descripcion }}">
                        </div>
                        <center>
                            <div class="grid grid-cols-1 mt-5 mx-7">
                                <img src="/images/{{ $producto->imagen }}" width="200px" id="imagenSeleccionada">
                            </div>
                        </center>
                        <div class="grid grid-cols-1 mt-5 mx-7">
                            <label
                                class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold mb-1">Subir
                                Imagen</label>
                            <div class="flex items-center justify-center w-full">
                                <label
                                    class="flex flex-col border-4 border-dashed w-full h-32 hover:bg-gray-100 hover:border-purple-300 group">
                                    <div class="flex flex-col items-center justify-center pt-7">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="50" height="50" viewBox="0 0 24 24" style="fill: rgb(72, 85, 194);transform: ;msFilter:;"><path d="m9 13 3-4 3 4.5V12h4V5c0-1.103-.897-2-2-2H4c-1.103 0-2 .897-2 2v12c0 1.103.897 2 2 2h8v-4H5l3-4 1 2z"></path><path d="M19 14h-2v3h-3v2h3v3h2v-3h3v-2h-3z"></path></svg>
                                        <p class="text-sm text-gray-400 group-hover:text-purple-600 pt-1 tracking-wider">
                                            Seleccione la imagen
                                        </p>
                                    </div>
                                    <input name="imagen" id="imagen" type="file" class="hidden">
                                </label>
                            </div>
                        </div><br>
                        <div>
                            <center>
                                <button type="submit"
                                    class="bg-blue-500 shadow-2xl hover:bg-blue-700 text-white font-bold py-3 px-10 rounded-full">
                                    Actualizar producto
                                </button>
                                <a href="{{ route('productos.index') }}" class="bg-red-500 shadow-2xl hover:bg-red-700 
                                        text-white font-bold py-3 px-10 rounded-full">
                                    Cancelar
                                </a>
                            </center>
                            </form>
                        </div>
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
