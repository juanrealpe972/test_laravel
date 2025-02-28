<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Laravel</title>
        <script src="https://cdn.tailwindcss.com"></script>
    </head>
    <body class="bg-gray-100 flex justify-center items-center min-h-screen p-4">
        <div class="w-full max-w-lg bg-white shadow-lg rounded-lg p-6">
            @if ($errors -> any())
            <!-- Crea un foreach -->
                @foreach ($errors->all() as $error)
                    <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-4" role="alert">
                        <strong class="font-bold">¡Ups!</strong>
                        <span class="block">{{ $error }}</span>
                    </div>
                @endforeach
            @endif

            <h2 class="text-2xl text-center font-bold text-gray-700 mb-4">Agregar Etiqueta</h2>
            <form action="tags" method="POST" class="mb-6">
                @csrf
                <div class="flex gap-2">
                    <input type="text" name="name" placeholder="Nombre de la etiqueta"
                        class="flex-1 p-2 border rounded-lg focus:ring-2 focus:ring-blue-400 outline-none">
                    <button type="submit"
                        class="bg-blue-500 text-white px-4 py-2 rounded-lg hover:bg-blue-600 transition">
                        Agregar
                    </button>
                </div>
            </form>

            <h4 class="text-xl font-semibold text-gray-700 mb-3">Listado de etiquetas</h4>
                <div class="overflow-y-auto max-h-64">
                    <table class="w-full border-collapse border border-gray-300 rounded-lg">
                        <thead>
                            <tr class="bg-gray-200 text-gray-700">
                                <th class="py-2 px-4 border">ID</th>
                                <th class="py-2 px-4 border">Nombre</th>
                                <th class="py-2 px-4 border">Slug</th>
                                <th class="py-2 px-4 border">Fecha creación</th>
                                <th class="py-2 px-4 border">Acción</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($tags as $tag)
                                <tr class="text-gray-700 even:bg-gray-100">
                                    <td class="py-2 px-4 border">{{ $tag->id }}</td>
                                    <td class="py-2 px-4 border">{{ $tag->name }}</td>
                                    <td class="py-2 px-4 border">{{ $tag->slug }}</td>
                                    <td class="py-2 px-4 border">{{ $tag->created_at }}</td>
                                    <td class="py-2 px-4 border text-center">
                                        <form action="tags/{{ $tag->id }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit"
                                                class="bg-red-500 text-white px-3 py-1 rounded-lg hover:bg-red-600 transition">
                                                Eliminar
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="5" class="text-center py-3 text-gray-500">No hay etiquetas</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
        </div>
    </body>
</html>
