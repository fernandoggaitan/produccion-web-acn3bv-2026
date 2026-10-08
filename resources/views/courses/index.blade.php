<x-layouts.app :title="$title">

    @if (session('status'))
        <div class="p-4 mb-4 text-sm text-green-800 rounded-lg bg-green-50 dark:bg-gray-800 dark:text-green-400" role="alert">
            {{ session('status') }}
        </div>
    @endif

    <x-enlace href="{{ route('courses.create') }}"> Agregar curso nuevo </x-enlace>
    
    <div class="overflow-x-auto shadow-md rounded-lg border border-gray-200 my-4">
        <table class="w-full text-sm text-left text-gray-600">
            <thead class="text-xs text-gray-700 uppercase bg-gray-100 border-b border-gray-200">
                <tr>
                    <th scope="col" class="px-6 py-3">ID</th>
                    <th scope="col" class="px-6 py-3">Título</th>
                    <th scope="col" class="px-6 py-3">Precio</th>
                    <th scope="col" class="px-6 py-3" colspan="2">Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach($courses as $c)
                    <tr class="bg-white border-b border-gray-200 hover:bg-gray-50">
                        <td class="px-6 py-4 font-medium text-gray-900"> {{ $c->id }} </td>
                        <td class="px-6 py-4"> {{ $c->title }} </td>
                        <td class="px-6 py-4">${{ $c->price_format() }}</td>                        
                        <td class="px-6 py-4">
                            <x-enlace href="{{ route('courses.edit', $c) }}"> Editar </x-enlace>
                        </td>
                        <td class="px-6 py-4">
                            <x-btn-delete> Eliminar </x-btn-delete>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        {{ $courses->links() }}

    </div>

</x-layouts.app>